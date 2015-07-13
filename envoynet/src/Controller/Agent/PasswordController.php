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
		            $length = 13;

		            $randomString = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);

		            //call out to sso parent to verify login
		            $params = [
		                    'action'=>'user_profile',
		                    'broker_url' => $broker_url,
		                    'broker_key' => 'b88342f43fc7133b672cd3e5f41a06f77236f34e',//Configure::read('hippo.sso_broker_key'),
		                    'email' => $this->request->data['email']
                    
		                ] ;
		            $response = $http->post(
		                'http://' . SSO_PARENT . '/wp-admin/admin-ajax.php',
		                $params

		            );
		            $user_info = $response->body();

		            if ($user_info) {
		                $params['action'] = 'user_pwd';
		                $http->post(
		                'http://' . SSO_PARENT . '/wp-admin/admin-ajax.php',
		                $params

		                );

		                $success = true;
		                $message = "<html>
		                  <head>
		                  </head>
		                  <body>
		                    <h1>" . __('Your Passport Profile Password Has Been Reset') . "</h1>
		                    <p>
		                        " . __('Hello') . ', <br><br>' . __(' 

		                        The password for your passport account associated with this address has been reset to the following') . ":<br />" . 
		                    $randomString . 
		                  "</p><br>
		                      <p>
		                        " . __('Please be sure to change this the next time you log in!') . "
		                      </p>
		                    </body>
		                  </html>";


		              $from = Configure::read('hippo.system_email');
		              $subject = "Passport Password Reset";
		              $this->log("password reset to " . $randomString . ' for ' . $this->request->data['email']);
		              $this->_sendEmail($this->request->data['email'], $from, $subject, $message);      
		            }
		        }

		        $this->set(compact('success'));
			

	    }
}

?>