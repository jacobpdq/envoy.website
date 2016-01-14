<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Core\Configure;
use Cake\Routing\Router;
use Cake\Event\Event;
use Cake\Network\Http\Client;




class MainController extends AppController {

  public $name = 'Main';
  public $uses = array('Agent', 'Admin', 'Supplier');

  //public $components = array('Recaptcha');
  //public $helpers = array('ImageResize');
  public function initialize()
  {
    parent::initialize();

    
  }
  public function beforeFilter(Event $event) {
    parent::beforeFilter($event);
    $this->Auth->allow(array('contact', 'index','login','logout', 'forgot', 'send'));
    $this->Auth->allowedActions = (array('contact', 'index','login','logout', 'forgot', 'send','sso_login'));
  }

  public function sso_login() {

    $parts = explode( "/", $_SERVER['REQUEST_URI'] );
    $http = new Client();
    $session_id = $parts[count($parts)-1];

     //call out to sso parent to verify login
    $response = $http->post(
        'http://' . SSO_PARENT . '/wp-admin/admin-ajax.php',
        [
            'action'=>'user_session',
            'session'=> $session_id
        ]
    );
    $user_info = $response->body();
	
    if($response->statusCode() != 200 || !$user_info ){ 
        if ($this->Auth->user()) {
          //user was successfully logged in without passport
          //assume they are non SSO user; remove sso session record and carry on as usual

          
          $ssoSession = $this->SsoSessions->find('all',[
            'conditions' => [
              'user_id' => $this->Auth->user('id'),
              'user_type' => $this->Auth->user('role')
            ]
          ])->first();
          if ($ssoSession) {
            $this->SsoSessions->delete($ssoSession);
          }

          return $this->redirect($this->Auth->redirectUrl());
        } else {
          // couldn't log user in via normal means or SSO
		  
		  
		  
		if( isset( $this->request->query['sso_failed'] ) ){
			
			if( $this->request->query['sso_failed'] == 'sso701' ){
				
				$error_string = 'Your username/email or password was incorrect. If you are having issues logging in using your username then please use your email.<br/><br/>If you have forgotten your password, please <a href="/agent/password/forgot">click here</a> to reset.<br/><br/>If you are having multiple issues accessing the website then <a href="http://' . SSO_PARENT . '/sso-support/">click here to submit a support request</a>.';
			
			}elseif( $this->request->query['sso_failed'] == 'sso702' ){
				
				$error_string = 'Your IP has been blocked due to multiple invalid login attempts. Please contact support for assistance in removing this block.<br/><br/><a href="http://' . SSO_PARENT . '/sso-support/">Click here to submit a support request.</a>';
			
			}elseif( $this->request->query['sso_failed'] == 'sso703' ){
				
				$error_string = 'Please make sure you enter a valid username/email and a valid password.';
			
			}elseif( $this->request->query['sso_failed'] == 'sso704' ){
				
				$error_string = 'Please confim that you are human by entering the correct value in the field below.';
		
			}else{
				
				$error_string = 'An unknown error occured.';
				
			}
			
			$this->Flash->error( __( $error_string ) );
			
			return $this->redirect(array('controller'=>'main','action'=>'index', 'prefix' => false));
		
		} 

          $this->layout = 'default';

          $this->Flash->error(__('Invalid username or password. Please try again.'));
          $this->redirect(array('controller'=>'main','action'=>'index', 'prefix' => false));
        }

    } else {
        
        //'user_login'=>$user_parts[1]
        //'user_email'=>$user_parts[0]
        //'first_name'=> $user_parts[2] 
        //'last_name' => $user_parts[3]
        //'display_name'=>$user_parts[2] . ' ' . $user_parts[3])

        $user_parts = explode("|",$user_info);
                        //call out to sso parent to verify login

                        $broker_url = Router::url('/', true);

        if (substr($broker_url,0,7) == 'http://') {
            $broker_url = substr($broker_url,7);
        } else if (substr($broker_url,0,8) == 'https://') {
            $broker_url = substr($broker_url,8);
        }

        if (substr($broker_url,-1) == '/') {
            $broker_url = substr($broker_url,0,strlen($broker_url)-1);
        }

        if (substr($broker_url,0,3) != 'www') {
          $broker_url = 'www.' . $broker_url;
        }

        $params = [
                'action'=>'user_profile',
                'broker_url' => $broker_url,
                'broker_key' => Configure::read('hippo.sso_broker_key'),
                'email' => $user_parts[0]
            
            ] ;
        $response = $http->post(
            'http://' . SSO_PARENT . '/wp-admin/admin-ajax.php',
            $params

        );
        $user_info = get_object_vars(json_decode($response->body()));

        $this->loadModel('SsoSessions');
        
        if ($user_id = $this->Auth->user('id')) {
          //user was successfully logged in before sso

          //retrieve sso session based on user id
          $ssoSession = $this->SsoSessions->find('all',[
            'conditions' => [
              'user_id' => $user_id
            ]
          ])->first();
        } else {
          //user was not be logged in locally before sso

          //grab sso session by login key which was saved as a cookie
          $ssoSession = $this->SsoSessions->find('all',[
            'conditions' => [
              'login_key' => $this->Cookie->read('sso_login_key')
            ]
          ])->first();
        }



        //load appropriate user model based on login attempt
        // if the SSO session existed on this site then attempt to use it to 
        // determin if this is an agent or suppulier

        //DEFAULT to agent

        if ($ssoSession && $ssoSession->user_type == 'supplier') {

            $this->loadModel('Suppliers');
            $userModel = $this->Suppliers;
            $userType = 'supplier';
        } else {

            $this->loadModel('Agents');
            $userModel = $this->Agents;              
            $userType = 'agent';
        }
        
        //attempt to locate existing user
        if ($user_id) {
          $user =  $userModel->findById($user_id);
        } else {
          $user =  $userModel->findByEmail($user_parts[0]);
        }

        $provinceAbbreviations = [
          'alberta'=>'AB',
          'british columbia' => 'BC',
          'manitoba' => 'MB', 
          'new brunswick' => 'NB',
          'newfoundland' => 'NL',
          'north west territories' => 'NT',
          'nova scotia' => 'NS', 
          'nunavut' => 'NU', 
          'ontario' => 'ON', 
          'prince edward island' => 'PE', 
          'quebec' => 'QC',
          'saskatchewan' => 'SK',
          'yukon territory' => 'YT',
          'northwest_territories' => 'NW',
		  'alabama' => 'AL',
		  'alaska' => 'AK',
		  'arizona'=>'AZ',
		  'arkansas'=>'AR',
		  'california'=>'CA',
		  'colorado'=>'CO',
		  'connecticut'=>'CT',
		  'delaware'=>'DE',
		  'district of columbia'=>'DC',
		  'florida'=>'FL',
		  'georgia'=>'GA',
		  'hawaii'=>'HI',
		  'idaho'=>'ID',
		  'illinois'=>'IL',
		  'indiana'=>'IN',
		  'iowa'=>'IA',
		  'kansas'=>'KS',
		  'kentucky'=>'KY',
		  'louisiana'=>'LA',
		  'maine'=>'ME',
		  'maryland'=>'MD',
		  'massachusetts'=>'MA',
		  'michigan'=>'MI',
		  'minnesota'=>'MN',
		  'mississippi'=>'MS',
		  'missouri'=>'MO',
		  'montana'=>'MT',
		  'nebraska'=>'NE',
		  'nevada'=>'NV',
		  'new hampshire'=>'NH',
		  'new jersey'=>'NJ',
		  'new mexico'=>'NM',
		  'new york'=>'NY',
		  'north carolina'=>'NC',
		  'north dakota'=>'ND',
		  'ohio'=>'OH',
		  'oklahoma'=>'OK',
		  'oregon'=>'OR',
		  'pennsylvania'=>'PA',
		  'rhode island'=>'RI','south carolina'=>'SC',
		  'south dakota'=>'SD',
		  'tennessee'=>'TN',
		  'texas'=>'TX',
		  'utah'=>'UT',
		  'vermont'=>'VT',
		  'virginia'=>'VA',
		  'washington'=>'WA',
		  'west virginia'=>'WV',
		  'wisconsin'=>'WI',
		  'wyoming'=>'WY'
        ];

        //provide empty string for required values missing from passport profile

        if (!isset($user_info['city'])) {
          $user_info['city'] = '';
        }
        if (!isset($user_info['company'])) {
          $user_info['company'] = '';
        }
        if (!isset($user_info['postal_code'])) {
          $user_info['postal_code'] = '';
        }
        if (!isset($user_info['phone_no'])) {
          $user_info['phone_no'] = '';
        }


        if (!isset($user_info['province'])) {
          $user_info['province'] = '';
          $user_prov = '';
        } elseif (strlen($user_info['province']) > 4) {
          $user_prov = $provinceAbbreviations[strtolower($user_info['province'])];
        } else {
          $user_prov = $user_info['province'];
        }

        if ($user->count() > 0) {
            
            //user was found
            $user = $user->first();

            //update profile information to sync with sso parent
            if ($userType == 'supplier') {
              $user->username = $user_parts[1];
              $user->email = $user_parts[0];
              $user->contact_firstname = $user_parts[2];
              $user->contact_lastname = $user_parts[3];
              if ($ssoSession) {
                $user->password = $ssoSession->password;
              }
            } else {
              $user->username = $user_parts[1];
              $user->email = $user_parts[0];
              $user->firstname = $user_parts[2];
              $user->lastname = $user_parts[3];
              if ($ssoSession) {
                $user->password = $ssoSession->password;
              }
              $user->company = $user_info['company'];
              $user->phonenumber = $user_info['phone_no'];
              $user->province = $user_prov;
              $user->postalcode = $user_info['postal_code'];
              $user->city = $user_info['city'];
              $user->address = $user_info['street'] . ' ' . $user_info['streetName'];
              $user->address2 = $user_info['unitApt'] . ' ' . $user_info['unitType'];
            }

            
        } else {

            //user not found
            if ($userType == 'supplier') {
              $user = [
                  'username'=>$user_parts[1],
                  'email'=>$user_parts[0],
                  'contact_firstname'=> $user_parts[2],
                  'contact_lastname' => $user_parts[3],
                  'status' => 1,
                  'allow_modify_orders' => 1,
                  'allow_modify_brochures' => 1,
                  'display_on_agent_site' => 1,
                  'restrict_brochure_access' => 0,
                  'restrict_report_access' => 0,
                  'restrict_order_access' => 0,
                  'phonenumber' => '',
                  'city' => '',
                  'province' => '',
                  'country' => '',
                  'address' => '',
                  'address2' => ''
              ];
            } else {
              $user = [
                  'username'=>$user_parts[1],
                  'email'=>$user_parts[0],
                  'firstname'=> $user_parts[2],
                  'lastname' => $user_parts[3],
                  'status' => 1,
                  'travelcuts' => 0,
                  'phonenumber' => $user_info['phone_no'],
                  'postalcode' => $user_info['postal_code'],
                  'city' => $user_info['city'],
                  'province' => $user_prov,
                  'country' => 'CA',
                  'address' => $user_info['street'] . ' ' . $user_info['streetName'],
                  'address2' => $user_info['unitApt'] . ' ' . $user_info['unitType'],
                  'company' => $user_info['company']
              ];
            }

            if ($ssoSession) {
              $user['password'] = $ssoSession->password;
              $this->request->data['username'] = $ssoSession->email;
              $this->request->data['password'] = $ssoSession->password;
            }

            //create user
            $newUser = $userModel->newEntity($user);
            $newUser = $userModel->save($newUser);


            if ($newUser == false){ // user not created
                $browser = '';
                if( isset( $_SERVER['HTTP_USER_AGENT'] ) ){ $browser = $_SERVER['HTTP_USER_AGENT']; }

                $tempUsername = $user_parts[1] . date('ymdHis');
                //email antonio
                //sso_mail_error( site_url(), 'Create User Error: ' . $user_parts[1] . ' ' . $user_parts[0] . " (" . $tempUsername . " created instead)\n\nWebsite: " . site_url() . "\n\nBrowser: " . $browser . "\n\nPage Line: /src/Controller/SsoController.php sso_login_authenticate line 179 " );


                //create user with temportary name in $username
                $user['username'] = $tempUsername;
                $newUser = $userModel->newEntity($user);
            }
            $user = $newUser;
        }

        //save user and convert profile to array
        $user = $userModel -> save($user)->toArray();

        //set flag to indicate that this is a certain type of user
        $user['role'] = $userType;



        $this->Auth->identify();

        //store user profile in session
        $this->Auth->setUser($user);
        

        if ($ssoSession) {
          //save sso session and user id for futrue refernce
          $ssoSession->session_id = $session_id;
          $ssoSession->user_id = $user['id'];

          //remove login info
          $ssoSession->u='';
          $ssoSession->p='';
          $ssoSession->r='';
          $ssoSession->password='';
          $ssoSession->login_key='';

          $ssoSession = $this->SsoSessions->save($ssoSession);
        }

        $this->redirect($this->Auth->redirectUrl());
    }
  }

  protected function _sso_logout () {
    $http = new Client();
    $response = $http->post(
        'http://' . SSO_PARENT . '/wp-admin/admin-ajax.php',
        [
            'action'=>'broker_logout',
            'broker_key'=> Configure::read('hippo.sso_broker_key'),
            'email' => $this->Auth->user('email')
        ]
    );
  }

  public function logout() {
    //call out to passport server to verify login
       

    $this->_sso_logout();
    $this->Cookie->delete('CAKEPHP');
    $this->redirect($this->Auth->logout());

  }


 
  public function index() {

        if ($this->Auth->user('id')){
		if ($this->Auth->user('role') == 'supplier') {
		       $link = '/supplier/main';
		} else {
		       $link = '/agent/brochures';
		}
		$this->redirect($link);
	}      

  }

  public function language() {
    /*switch($language) {
      case "en":
      I18n::locale('en_CA');
      break;
      case "fr":
      I18n::locale('fr_CA');
      break;
      default:
      I18n::locale('en_CA'); 
      break;   
    }

    */
    echo 'test';
  }

  function contact() {
    $this->layout = "infobox";
    if (!empty($this->request->data)) {
      $message = "<html>
      <head>
      </head>
      <body>
      <h1>Contact details</h1>
      <p>
        Name: ".$this->request->data['Contact']['firstname']." ".$this->request->data['Contact']['lastname'].
      "</p>
       <p>
        Email: ".$this->request->data['Contact']['email'].
      "</p>
       <p>
        Phonenumber: ".$this->request->data['Contact']['phonenumber'].
       "</p>
        <p>
        Comments:
        <br/>"
        .$this->request->data['Contact']['comments'].
        "</p>
        </body>
      </html>";


      $from = Configure::read('hippo.system_email');
      $subject = "Contact form";
      $this->_sendEmail(Configure::read('hippo.warehouse_email'), $from, $subject, $message);
      $this->redirect($this->referer());
    }
  }

}

?>
