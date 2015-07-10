<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Core\Configure;
use Cake\Event\Event;

class AgentsController extends AppController {

  public $name = 'Agents';

  function beforeFilter(Event $event) {
    parent::beforeFilter($event);
    $this->Auth->allowedActions = array('forgot','agent_register');
	}

 
}

?>