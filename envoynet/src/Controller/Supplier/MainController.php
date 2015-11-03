<?php

namespace App\Controller\Supplier;

use App\Controller\AppController;
use Cake\Core\Configure;
use Cake\Routing\Router;
use Cake\Event\Event;
use Cake\Network\Http\Client;



class MainController extends \App\Controller\MainController {

  public $name = 'Main';
  public $uses = array('Suppliers');

  //public $components = array('Recaptcha');
  //public $helpers = array('ImageResize');
  public function initialize()
  {
    parent::initialize();
  }
  public function beforeFilter(Event $event) {
    parent::beforeFilter($event);
    $this->Auth->deny('index');
  }

  public function login() {

    $this->set('title_for_layout', __('Supplier login'));

    $this->loadModel('SsoSessions');
    $this->loadModel('Suppliers');

    if (!empty($this->request->data['username']) && !empty($this->request->data['password'])) {


      $ssoSupplier = false;
      //attempt to log user in
      if ($user = $this->Auth->user()) {
        //user exists 
        //initialize ssoSession to attempt sso login
        $ssoSupplier = $this->Suppliers->findById($user['id'])->contain(['SsoSessions'])->first();
      } elseif ($user = $this->Auth->identify()) {
        $user['role'] = 'supplier';
        $this->Auth->setUser($user);

        //initialize ssoSession to attempt sso login
        $ssoSupplier = $this->Suppliers->findById($user['id'])->contain(['SsoSessions'])->first();
      }


      if ($ssoSupplier) {
        if (is_null($ssoSupplier->sso_session)) {
          $ssoSession = $this->SsoSessions->newEntity();
          $ssoSession->user_type = 'supplier';  
        } else {
          $ssoSession = $ssoSupplier->sso_session;
        }
      } else {
        //user does not exist
        //either first log on or change of password
        //create sso session for reference later
        $ssoSession= $this->SsoSessions->newEntity();
        $ssoSession->user_type = 'supplier';
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


      if ($ssoSupplier) {
        $ssoSupplier->sso_session = $ssoSession;
        $ssoSupplier = $this->Suppliers->save($ssoSupplier);

      } else {
        $this->Cookie->write('sso_login_key',$ssoSession->login_key);
 //       $ssoSession = $this->SsoSessions->save($ssoSession);
      }

      //'http://' . SSO_PARENT . '/sso/' . $login_key . '/' . $broker_key . '/?referer=' . $referer 
      $this->redirect( 'http://' . SSO_PARENT . '/sso/' . $login_key . '/' . Configure::read('hippo.sso_broker_key') . '/?referer=' . $referer );
    } else {
      
      $this->sso_login();
    } 
  }

  public function index() {
    

    $this->set('title_for_layout', __('Home'));

    $mastersupplier = $this->Auth->user('master_supplier');

    if ($mastersupplier == 0) {
      $supplierId = $this->Auth->user('id'); 
    }
    else {
     $supplierId = $this->Auth->user('master_supplier');
    }


    if ($supplierId != null) {

      $this->loadModel('Brochures');

      $brochures = $this->Brochures->find(
        'all', array(
          'conditions' => array(
            'OR' => array(
                'Brochures.supplier_id' => $supplierId, 
                'Suppliers.master_supplier' => $supplierId
            ), 
            'Brochures.status' => '1'
          ), 
          'order' => 'Brochures.name', 
          'contain' => 'Suppliers', 
          'fields' => array(
            'id', 
            'sku', 
            'name', 
            'Ontario_inventory', 
            'BC_inventory', 
            'inv_balance'
          )
        )
      );

      $this->set(compact('brochures'));

      $this->loadModel('Orders');
      //    $this->Orders->recursive = 2;
      $orders = $this->Orders->find(
        'all', 
        array(
          'conditions' => array(
            'OR' => array(
              'Orders.id in (
                select distinct order_items.order_id from order_items where order_items.brochure_id in (
                  select brochures.id from brochures where brochures.supplier_id = ' . $supplierId . '
                )
              )', 
              'Orders.id in (
                select distinct order_items.order_id from order_items where order_items.brochure_id in (
                  select brochures.id from brochures where brochures.supplier_id in (
                    select suppliers.id from suppliers where suppliers.master_supplier = ' . $supplierId . '
                  )
                )
              )'
            )
          ),
          'contain' => array(
            'OrderItems.Brochures', 
            'OrderItems.Brochures.Suppliers'
          ),
          'order' => 'Orders.created DESC',
          'limit' => '8'
        )
      );

      $this->set(compact('orders'));
    }
  }

  public function contact() {
    $this->layout = "infobox";
    if (!empty($this->request->data)) {
      $message = "<html>
      <head>
      </head>
      <body>
      <h1>Contact details</h1>
      <p>
        Name: ".$this->request->data['firstname']." ".$this->request->data['lastname'].
      "</p>
       <p>
        Email: ".$this->request->data['email'].
      "</p>
       <p>
        Phonenumber: ".$this->request->data['phonenumber'].
       "</p>
        <p>
        Comments:
        <br/>"
        .$this->request->data['comments'].
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
