<?php

namespace App\Controller\Agent;

use App\Controller\AppController;
use Cake\Network\Http\Client;
use Cake\Routing\Router;
use Cake\Core\Configure;

class PasswordController extends AppController
{

    public function initialize()
    {
parent::initialize();
		$this->layout = 'default';

    }

    public function forgot()
	    {

			$this->layout = 'default';
			
			if ($this->request->data) {
			    $success = false;


		            $http = new Client();
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
					
					$broker_url =  Router::url('/', true);
					$broker_url =  str_replace("http://","",$broker_url);
					$broker_url =  str_replace("https://","",$broker_url);
					$broker_url =  str_replace("/","",$broker_url);
					
		            $length = 13;
					
		            $randomString = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);

		            //call out to sso parent to verify login
		            $params = [
		                    'action'=>'user_profile',
		                    'broker_url' => $broker_url,
		                    'broker_key' => Configure::read('hippo.sso_broker_key'),
		                    'email' => $this->request->data['email']
                    
		                ] ;
		            $response = $http->post(
		                'http://' . SSO_PARENT . '/wp-admin/admin-ajax.php',
		                $params

		            );
		            $user_info = $response->body();

		            if ($user_info) {
		                $params['action'] = 'user_pwd';
		                $params['session'] = MD5($randomString);
		                $http->post(
		                'http://' . SSO_PARENT . '/wp-admin/admin-ajax.php',
		                $params

		                );

		                $success = true;
		                $message = "<html>
		                  <head>
		                  </head>
		                  <body>
		                    <h1>" . __('Your ENVOY Password Has Been Reset') . "</h1>
		                    <p>
		                        " . __('Hello') . ', <br><br>' . __('The password associated with this email address has been reset to the following') . ":<br />" . 
		                    $randomString . 
		                  "</p><br>
		                      <p>
		                        " . __('For accuracy, it is recommended that you copy and paste the password information into the travel agent login area of the website.') .
								'<br><br>' . __('You can change your password in the My Profile section of the site once you have logged in.') . "
		                      </p>
		                    </body>
		                  </html>";


		              $from = Configure::read('hippo.system_email');
		              $subject = __('ENVOY Password Reset');
		              
		              $this->_sendEmail($this->request->data['email'], $from, $subject, $message);      

$this->loadModel('Agents');
		              $user = $this->Agents->findByEmail($this->request->data['email']);

		              if ($user->count()) {
   			      $user = $user->first();
		              	$user->password = MD5($randomString);

		              	$this->Agents->save($user);
		              }

		            }
		        }

		        $this->set(compact('success'));
			

	    }
}

?>