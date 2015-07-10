<?php

namespace App\Controller\Supplier;

use App\Controller\AppController;

class PasswordController extends AppController
{

	    public function forgot()
	    {

	    	$this->set->layout('default');

	    }

    	public function beforeFilter(Event $event) {
		    parent::beforeFilter($event);
		    $this->Auth->allowedActions = array('forgot');
		 }

}

?>