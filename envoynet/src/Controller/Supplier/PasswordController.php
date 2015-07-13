<?php

namespace App\Controller\Supplier;

use App\Controller\AppController;

class PasswordController extends AppController
{

    public function forgot()
	    {

			$this->layout = 'default';
			
			if ($this->request->data) {
			    $success = false;

		            $randomString = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);

		            $supplier = $this->Supplier->findByEmail($this->request->data['email']);


		            if ($supplier->count() > 0) {
		                
		                $supplier->password = MD5($randomString);0
		                $this->Supplier->save($supplier);

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