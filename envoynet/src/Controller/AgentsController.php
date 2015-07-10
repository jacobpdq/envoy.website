<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Core\Configure;
use Cake\Event\Event;

class AgentsController extends AppController {

  public $name = 'Agents';

  function beforeFilter(Event $event) {
    parent::beforeFilter($event);
    $this->Auth->allow(array('contact', 'index','login','logout', 'forgot', 'send', 'login'));
    $this->Auth->allowActions = (array('contact', 'index','login','logout', 'forgot', 'send'));
	}

}

?>