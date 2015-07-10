<?php

namespace App\Controller\Agent;

use App\Controller\AppController;

class PasswordController extends AppController
{

    public function initialize()
    {

		$this->layout = 'default';

    }

    public function beforeFilter(Event $event) {
    	
    	$this->Auth->allowedActions = array('forgot');
	  
	}

    public function forgotAgentPassword()
	    {

			$this->layout = 'default';

	    }

}

?>