<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Core\Configure;
use Cake\Routing\Router;
use Cake\Event\Event;
use Cake\Network\Http\Client;
use Cake\I18n\I18n;




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
    $this->Auth->allow(array('contact', 'index','login','logout'));
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

          if( isset( $this->request->query['error'] ) ){
            if( $this->request->query['error'] == '201' || $this->request->query['error'] == '999' ){      

              if( $this->request->query['error'] == '201' ) { 
                $this->Flash->error(__('Your username/email or password was incorrect. If you are having issues logging in using your username then please use your email.<br/><br/>If you have forgotten your password, please <a href="http://' . SSO_PARENT . '/wp-login.php?action=lostpassword">click here</a> to reset.<br/><br/>If you are having multiple issues accessing the website then <a href="http://' . SSO_PARENT . '/sso-support/">click here to submit a support request</a>.'));
              } elseif ($this->request->query['error'] == '999' ) {
                $this->Flash->error(__('Your IP has been blocked due to multiple invalid login attempts. Please contact support for assistance in removing this block.<br/><br/><a href="http://' . SSO_PARENT . '/sso-support/">Click here to submit a support request.</a>'));
              }

              return $this->redirect(array('controller'=>'main','action'=>'index', 'prefix' => false));
            }
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
          $user =  $userModel->findByUsername($user_parts[1]);
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
                  'phonenumber' => '',
                  'postalcode' => '',
                  'city' => '',
                  'province' => '',
                  'country' => '',
                  'address' => '',
                  'address2' => '',
                  'company' => ''
              ];
            }

            if ($ssoSession) {
              $user['password'] = $ssoSession->password;
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

        return $this->redirect($this->Auth->redirectUrl());
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
    
    

  }



  public function language() {

    switch($language) {
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
    echo 'test';
    return $this->redirect($this->referer());


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
