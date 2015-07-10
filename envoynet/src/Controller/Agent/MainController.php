<?php

namespace App\Controller\Agent;

use App\Controller\AppController;
use Cake\Core\Configure;
use Cake\Routing\Router;
use Cake\Event\Event;
use Cake\Network\Http\Client;



class MainController extends \App\Controller\MainController {

  public $name = 'Main';
  public $uses = array('Agents');

  //public $components = array('Recaptcha');
  //public $helpers = array('ImageResize');
  public function initialize()
  {
    parent::initialize();
  }
  public function beforeFilter(Event $event) {
    echo $this->request->params['action'];

    //parent::beforeFilter($event);
    //$this->Auth->deny('index');
  }

  public function login() {

    $this->set('title_for_layout', __('Agent login'));

    $this->loadModel('SsoSessions');
    $this->loadModel('Agents');

    if (!empty($this->request->data['username']) && !empty($this->request->data['password'])) {

      //$this->_sso_logout();
      $ssoAgent = false;
      //attempt to log user in
      if ($user = $this->Auth->user()) {
        //user exists 
        //initialize ssoSession to attempt sso login
        $ssoAgent = $this->Agents->findById($user['id'])->contain(['SsoSessions'])->first();
      } elseif ($user = $this->Auth->identify()) {
        $user['role'] = 'agent';
        $this->Auth->setUser($user);

        //initialize ssoSession to attempt sso login
        $ssoAgent = $this->Agents->findById($user['id'])->contain(['SsoSessions'])->first();
      }


      if ($ssoAgent) {
        if (is_null($ssoAgent->sso_session)) {
          $ssoSession = $this->SsoSessions->newEntity();
          $ssoSession->user_type = 'agent';  
        } else {
          $ssoSession = $ssoAgent->sso_session;
        }
      } else {
        //user does not exist
        //either first log on or change of password
        //create sso session for reference later
        $ssoSession= $this->SsoSessions->newEntity();
        $ssoSession->user_type = 'agent';
      }


      $username = $this->request->data['username'];
      $password = $this->request->data['password'];
    
      $login_key = hash('ripemd160', $username . date("YmdHis") );
      $referer = Router::url('/', true) . $this->request->url;

      //store sso info  for later verification
      $ssoSession->login_key = $login_key;
      $ssoSession->u = $username;
      $ssoSession->p = MD5( $password );
      $ssoSession->r = $referer;
      $ssoSession->password = $password;


      if ($ssoAgent) {
        $ssoAgent->sso_session = $ssoSession;
        $ssoAgent = $this->Agents->save($ssoAgent);

      } else {
        $this->Cookie->write('sso_login_key',$ssoSession->login_key);
        $ssoSession = $this->SsoSessions->save($ssoSession);
      }

      //'http://' . SSO_PARENT . '/sso/' . $login_key . '/' . $broker_key . '/?referer=' . $referer 
      $this->redirect( 'http://' . SSO_PARENT . '/sso/' . $login_key . '/' . Configure::read('hippo.sso_broker_key') . '/?referer=' . $referer );
    } else if (!empty($this->request->data['digits1'])) {

      $phonenumber = $this->request->data['digits1'] . "-" . $this->request->data['digits2'] . "-" . $this->request->data['digits3'];

      $this->request->data['phonenumber'] = $phonenumber;
      $this->request->data['password'] = 'test';
      $user = $this->Auth->identify();

      
      if ($user) {

        // set flag to indicate that this is an agent
        $user['role'] = 'agent';

        //store user profile in session
        $this->Auth->setUser($user);

        return $this->redirect($this->Auth->redirectUrl());
      } else {
        $this->Flash->error('Phone number cannot be found. Please try again or click here to <a href="' . Router::url(array('controller' => 'agents', 'action' => 'register')) . '">Register</a>');
        $this->redirect(array('controller'=>'main','action'=>'index', 'prefix' => false));
      }
    } else {
      
      $this->sso_login();
    } 
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
