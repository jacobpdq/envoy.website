<?php

namespace App\Controller\Agent;

use App\Controller\AppController;

class PasswordController extends AppController
{
    public function forgot()
	    {

			$this->layout = 'default';
			echo 'test';

	    }

	public function beforeFilter(Event $event) {
    parent::beforeFilter($event);
    $this->Auth->allowedActions = array('forgot');
	 }

}

?>