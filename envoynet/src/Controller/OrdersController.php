<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Core\Configure;
use Cake\Form\Form;

class OrdersController extends AppController {

  public $name = __('Orders');
  public $paginate = [];  

  
  public $helpers = array('Form');

  public function initialize() {
    parent::initialize();
    $this->loadComponent('Paginator');

  }
  
  function _updateInventory($orderId=null) {
    $this->Orders->contain('OrderItem.Brochure');
    $order = $this->Orders->get($orderId);

    $brochuresToUpdate = array();

    foreach ($order['order_items'] as $orderItem) {
      $bTemp = $orderItem;

      $bTemp['Brochure']['inv_balance'] = $bTemp['Brochure']['inv_balance'] - $bTemp['qty_ordered'];
      if ($bTemp['Brochure']['inv_balance'] <= $bTemp['Brochure']['inv_notif_threshold']) {
        $this->_lowInvNotif($bTemp['Brochure']);
      }
      $br['Brochure'] = $bTemp['Brochure'];
      array_push($brochuresToUpdate, $br);
    }

    if (!empty($brochuresToUpdate)) {
      $this->Orders->OrderItem->Brochures->saveAll($brochuresToUpdate);
    }
  }

 
  function _checkForPoaBrochures($orderId=null) {
    $this->Orders->contain('OrderItem.Brochure');
    $order = $this->Orders->get($orderId);

    $poaItems = array();
    foreach ($order['OrderItem'] as $orderItem) {

      if ($orderItem['Brochure']['poa'] == '1') {
        if (empty($poaItems[$orderItem['Brochure']['supplier_id']]['Items'])) {
          $poaItems[$orderItem['Brochure']['supplier_id']]['Items'] = array();
        }
        array_push($poaItems[$orderItem['Brochure']['supplier_id']]['Items'], $orderItem);
      }
    }

    if (!empty($poaItems)) {

      $messageBegin = "<html>
        <head>
        </head>
        <body>
        <p>An order has been received containing the following brochures that require approval</p>       
        <ol>";
        
      $messageEnd = "</ol>
      </body>
      </html>";

      $msg = array();
      foreach ($poaItems as $key => $oItem) {
        $message = $messageBegin;

        foreach ($oItem['Items'] as $item) {
          $message .= "<li>" . $item['qty_ordered'] . " x " . $item['Brochure']['name'] . "</li>";
        }

        $message .= $messageEnd;
        $msg[$key] = $message;
      }
      //email body
      //send email test@merittravelcutsbrochures.com

      $this->loadModel('Supplier');
      $from = Configure::read('hippo.system_email');
      $subject = "Brochure order approval";  //wording changed by Glen
      foreach ($msg as $key => $email) {
        $this->Suppliers->recursive = -1;
        $recipient = $this->Suppliers->get($key);

        if (!empty($recipient['Supplier']['email'])) {
          $this->_sendEmail($recipient['Supplier']['email'], $from, $subject, $email);
        }
      }


      //$this->request->session()->write('TestResults.poaMessage', $msg);
    }
  }

  function _rushOrderNotif($orderId=null) {

    $this->Orders->contain('OrderItem.Brochure');
    $order = $this->Orders->get($orderId);

    $orderDetails = "<ul>";

    foreach ($order['Order'] as $key => $value) {
      $orderDetails .="<li>" . $key . ":  " . $value . "</li>";
    }
    $orderDetails .="</ul>";

    $messageBegin = "<html>
        <head>
        </head>
        <body>
        <h1>Rush Order details:</h1>
        $orderDetails
        <h2>Order items:</h2>
        <ol>";
    $messageEnd = "</ol>
      </body>
      </html>";

    $message = $messageBegin;

    foreach ($order['OrderItem'] as $item) {
      $message .= "<li>" . $item['qty_ordered'] . " x " . $item['Brochure']['name'] . "</li>";
    }

    $message .= $messageEnd;

     $from = Configure::read('hippo.system_email');
    $subject = "Rush order";
    $this->_sendEmail(Configure::read('hippo.warehouse_email'), $from, $subject, $message);
  }
  
  function _supplierOrderNotif($orderId=null) {
    $this->loadModel('Orders');
    $order = $this->Orders->findById($orderId,[
      'contain'=>'OrderItems.Brochures'
      ]
    );

    $orderDetails = "<ul>";

    foreach ($order as $key => $value) {
      $orderDetails .="<li>" . $key . ":  " . $value . "</li>";
    }
    $orderDetails .="</ul>";

    $messageBegin = "<html>
        <head>
        </head>
        <body>
        <h1>Supplier Order details:</h1>
        $orderDetails
        <h2>Order items:</h2>
        <ol>";
    $messageEnd = "</ol>
      </body>
      </html>";

    $message = $messageBegin;

    foreach ($order as $item) {
      $message .= "<li>" . $item['qty_ordered'] . " x " . $item['Brochure']['name'] . "</li>";
    }

    $message .= $messageEnd;

    $from = Configure::read('hippo.system_email');
    $subject = "Supplier order";
    $this->_sendEmail(Configure::read('hippo.warehouse_email'), $from, $subject, $message);
  }

  
   function _lowInvNotif($brochure=null) {
    if (!empty($brochure)) {
	   $this->loadModel('Suppliers');
     
 //    $recipient = $this->Suppliers->get($brochure['supplier_id']);
   $recipient = "gharwood@travelweek.ca";      
   $from = Configure::read('hippo.system_email');
      $subject = "Low inventory notification";
      $message = "<html>
        <head>
        </head>
        <body>
        <p>Brochure " . $brochure['name'] . "inventory balance: " . $brochure['inv_balance'] . " is below min inventory threshold value " . $brochure['inv_notif_threshold'] . "</p>
        </body>
        </html>";
$this->_sendEmail($recipient, $from, $subject, $message);
  //    if (!empty($recipient['Supplier']['email'])) {
  //      $this->_sendEmail($recipient['Supplier']['email'], $from, $subject, $message);
//		$this->Flash->set(__('email sent'));
	  
 //     }
    }
  }

  

}

?>