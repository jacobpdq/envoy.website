<?php

namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Core\Configure;
use Cake\Routing\Router;
use Cake\Event\Event;




class MainController extends \App\Controller\MainController {

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
    $this->Auth->deny(['index']);
  }

  function login() {
 
    $this->set('title_for_layout', __('Admin login'));
    $this->layout = 'default';

    if (!empty($this->request->data)) {

      $user = $this->Auth->identify();

      if ($user) {
        $user['role'] = 'admin';
        $this->Auth->setUser($user);
        return $this->redirect($this->Auth->redirectUrl());
      } else {
        $this->Flash->error('Invalid username or password. Please try again.');
        $this->redirect(array('controller'=>'main','action'=>'login', 'prefix' => 'admin'));
      }
    }
  }

  function logout() {
    $this->redirect($this->Auth->logout());
  }

  


  function index() {

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
