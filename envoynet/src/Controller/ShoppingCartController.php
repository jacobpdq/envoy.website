<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Core\Configure;
use Cake\Error\Debugger;

class ShoppingCartController extends AppController {

  public $name = 'ShoppingCart';
  public $uses = 'Order';
  public $helpers = array('Form');

  public function initialize() {
    parent::initialize();

    
  }
  
  function _notifyAgent($order=null) {
    $from = Configure::read('hippo.system_email');
    $subject = __('Thank you for your order with ENVOY');
    //$message = Configure::read('hippo.msg_agent_reg');
    
    $agent = $this->Auth->user();

    $items = $order['order_items'];

    if (!empty($agent['email'])) {
      if (!empty($order['order_items'])) {

        $message = "<html>
        <head>
        </head>
         <h3>Shipping Address:</h3>
        <b>Date:</b> " . $order['created'] . " <br>
        <b>" . __('Company') . ":</b> " . $order['shipping_company'] . " <br>
        <b>" . __('First Name') . ":</b> " . $order['shipping_firstname'] . " <br>
        <b>" . __('Last Name') . ":</b> " . $order['shipping_lastname'] . " <br>
        <b>" . __('Address1') . ":</b> " . $order['shipping_address1'] . " <br>
        <b>" . __('Address2') . ":</b> " . $order['shipping_address2'] . " <br>
        <b>" . __('City') . ":</b> " . $order['shipping_city'] . " <br>
        <b>Province:</b> " . $order['shipping_province'] . " <br>
        <b>" . __('Postal Code') . ":</b> " . $order['shipping_postalcode'] . " <br>
        <b>" . __('Tel') . ":</b> " . $order['shipping_phonenumber'] . " <br>
        <b>" . __('Email') . ":</b> " . $order['shipping_email'] . " <br>
        <b>" . __('Order Comments') . ":</b> " . $order['order_comments'] . " <br>
        <br>
        <b>" . __('Order Items') . ":</b> 
        <ol>";
        $messageEnd = "</ol>
        </body>
        </html>";

        foreach ($order['order_items'] as $item) {
          $message .= "<li>" . $item['qty_ordered'] . " x " . $item['Brochure']['name'] . "</li>";
        }

        $message .= $messageEnd;

      // removed by glen  $this->_sendEmail($agent['Agent']['email'], $from, $subject, $message);
        $this->_sendEmail($order['shipping_email'], $from, $subject, $message);  //added by glen
      }
    }
  }
  
  function _updateInventory($order=null) {

    $brochuresToUpdate = array();

    foreach ($order['order_items'] as $orderItem) {
      $bTemp = $orderItem;
      $bTemp['Brochure']['inv_balance'] = $bTemp['Brochure']['inv_balance'] - $bTemp['qty_ordered'];
      if ($bTemp['Brochure']['inv_balance'] <= $bTemp['Brochure']['inv_notif_threshold']) {
        $this->_lowInvNotif();
      }
      $br['Brochure'] = $bTemp['Brochure'];
      array_push($brochuresToUpdate, $br);
    }

    if (!empty($brochuresToUpdate)) {
      $this->Orders->OrderItem->Brochures->saveAll($brochuresToUpdate);
    }
  }

  function _lowInvNotif($brochure=null) {
    if (!empty($brochure)) {
      $this->loadModel('Suppliers');

      $recipient = $this->Suppliers->findById($brochure['supplier_id'])->first();
      $from = Configure::read('hippo.system_email');
      $subject = "Low inventory notification";
      $message = "<html>
        <head>
        </head>
        <body>
        <p>Brochure " . $brochure['name'] . " inventory balance: " . $brochure['inv_balance'] . " is below min inventory threshold value " . $brochure['inv_notif_threshold'] . "</p>
        </body>
        </html>";

      if (!empty($recipient['email'])) {
        $this->_sendEmail($recipient['email'], $from, $subject, $message);
      }
    }
  }

  function _checkForPoaBrochures($order=null) {
 
    $poaItems = array();

    $this -> loadModel('Brochures');

    foreach ($order->order_items as $orderItem) {

      $orderItem['Brochure'] = $this->Brochures->findById($orderItem->brochure_id)->first();

      if ($orderItem['Brochure']['poa'] == '1') {

        $supplierId = $orderItem['Brochure']['supplier_id'];

        if (empty($poaItems[$supplierId])) {
          $poaItems[$supplierId] = array();
        }
        array_push($poaItems[$supplierId], $orderItem);
      }
    }

    if (!empty($poaItems)) {

      $messageBegin = "<html>
        <head>
        </head>
        <body>
        <h3>The following order has been received and requires approval:</h3>
        <b>Date:</b> " . $order['created'] . " <br>
        <b>Company:</b> " . $order['shipping_company'] . " <br>
        <b>" . __('First Name') . ":</b> " . $order['shipping_firstname'] . " <br>
        <b>Last Name:</b> " . $order['shipping_lastname'] . " <br>
        <b>Address1:</b> " . $order['shipping_address1'] . " <br>
        <b>Address2:</b> " . $order['shipping_address2'] . " <br>
        <b>City:</b> " . $order['shipping_city'] . " <br>
        <b>Province:</b> " . $order['shipping_province'] . " <br>
        <b>Postal Code:</b> " . $order['shipping_postalcode'] . " <br>
        <b>Phone:</b> " . $order['shipping_phonenumber'] . " <br>
        <b>Email:</b> " . $order['shipping_email'] . " <br>
        <b>Comments:</b> " . $order['order_comments'] . " <br>
        <br>
        <b>Order Items:</b>
        <ol>";
      $messageEnd = "</ol>
      <br>
To approve or change this order, please go to http://envoynetworks.ca/supplier and click on the Orders tab (you will need your username and password)
      </body>
      </html>";

      $msg = array();
      foreach ($poaItems as $key => $oItem) {
        $message = $messageBegin;
        foreach ($oItem as $item) {
          $message .= "<li>" . $item['qty_ordered'] . " x " . $item['Brochure']['name'] . "</li>";
        }

        $message .= $messageEnd;
        $msg[$key] = $message;
      }
      //email body
      //send email test@merittravelcutsbrochures.com

      $this->loadModel('Suppliers');
      $from = Configure::read('hippo.system_email');
      $subject = "Brochure order approval";
      foreach ($msg as $key => $email) {

        $recipient = $this->Suppliers->findById($key)->first();

        if (!empty($recipient['email'])) {
          $this->_sendEmail($recipient['email'], $from, $subject, $email);
        }
      }


      $this->request->session()->write('TestResults.poaMessage', $msg);
    }
  }
  
   function _checkForSupplierSelfFulfillment($order=null) {
 
    $poaItems = array();
    foreach ($order['order_items'] as $orderItem) {

      $orderItem['Brochure'] = $this->Brochures->findById($orderItem->brochure_id)->first();

      if ($orderItem['Brochure']['poa'] == '2') {
        if (empty($poaItems[$orderItem['Brochure']['supplier_id']])) {
          $poaItems[$orderItem['Brochure']['supplier_id']] = array();
        }
        array_push($poaItems[$orderItem['Brochure']['supplier_id']], $orderItem);
      }
    }

    if (!empty($poaItems)) {

      $messageBegin = "<html>
        <head>
        </head>
        <body>
        <h3>The following order has been received and is being forwarded to you for fulfillment:</h3>
        <b>Date:</b> " . $order['created'] . " <br>
        <b>Company:</b> " . $order['shipping_company'] . " <br>
        <b> " . __('First Name') . " :</b> " . $order['shipping_firstname'] . " <br>
        <b>Last Name:</b> " . $order['shipping_lastname'] . " <br>
        <b>Address1:</b> " . $order['shipping_address1'] . " <br>
        <b>Address2:</b> " . $order['shipping_address2'] . " <br>
        <b>City:</b> " . $order['shipping_city'] . " <br>
        <b>Province:</b> " . $order['shipping_province'] . " <br>
        <b>Postal Code:</b> " . $order['shipping_postalcode'] . " <br>
        <b>Phone:</b> " . $order['shipping_phonenumber'] . " <br>
        <b>Email:</b> " . $order['shipping_email'] . " <br>
        <b>Comments:</b> " . $order['order_comments'] . " <br>
        <br>
        <b>Order Items:</b>
        <ol>";
      $messageEnd = "</ol>
      <br>
Thank you for your business.
      </body>
      </html>";

      $msg = array();
      foreach ($poaItems as $key => $oItem) {
        $message = $messageBegin;
        foreach ($oItem as $item) {
          $message .= "<li>" . $item['qty_ordered'] . " x " . $item['Brochure']['name'] . "</li>";
        }

        $message .= $messageEnd;
        $msg[$key] = $message;
      }
      //email body
      //send email test@merittravelcutsbrochures.com

      $this->loadModel('Suppliers');
      $from = Configure::read('hippo.system_email');
      $subject = "Brochure order received";
      foreach ($msg as $key => $email) {

        $recipient = $this->Suppliers->findById($key)->first();

        if (!empty($recipient['email'])) {
          $this->_sendEmail($recipient['email'], $from, $subject, $email);
        }
      }


      $this->request->session()->write('TestResults.poaMessage', $msg);
    }
  }

  
   function _checkForSupplierNotification($order=null) {
 
    $poaItems = array();
    foreach ($order['order_items'] as $orderItem) {
      $orderItem['Brochure'] = $this->Brochures->findById($orderItem->brochure_id)->first();
      if ($orderItem['Brochure']['poa'] == '3') {
        if (empty($poaItems[$orderItem['Brochure']['supplier_id']])) {
          $poaItems[$orderItem['Brochure']['supplier_id']] = array();
        }
        array_push($poaItems[$orderItem['Brochure']['supplier_id']], $orderItem);
      }
    }

    if (!empty($poaItems)) {

      $messageBegin = "<html>
        <head>
        </head>
        <body>
        <h3>The following order has been received by ENVOY:</h3>
        <b>Date:</b> " . $order['created'] . " <br>
        <b>Company:</b> " . $order['shipping_company'] . " <br>
        <b>" . __('First Name') . ":</b> " . $order['shipping_firstname'] . " <br>
        <b>Last Name:</b> " . $order['shipping_lastname'] . " <br>
        <b>Address1:</b> " . $order['shipping_address1'] . " <br>
        <b>Address2:</b> " . $order['shipping_address2'] . " <br>
        <b>City:</b> " . $order['shipping_city'] . " <br>
        <b>Province:</b> " . $order['shipping_province'] . " <br>
        <b>Postal Code:</b> " . $order['shipping_postalcode'] . " <br>
        <b>Phone:</b> " . $order['shipping_phonenumber'] . " <br>
        <b>Email:</b> " . $order['shipping_email'] . " <br>
        <b>Comments:</b> " . $order['order_comments'] . " <br>
        <br>
        <b>Order Items:</b>
        <ol>";
      $messageEnd = "</ol>
      <br>
Thank you for your business.
      </body>
      </html>";

      $msg = array();
      foreach ($poaItems as $key => $oItem) {
        $message = $messageBegin;
        foreach ($oItem as $item) {
          $message .= "<li>" . $item['qty_ordered'] . " x " . $item['Brochure']['name'] . "</li>";
        }

        $message .= $messageEnd;
        $msg[$key] = $message;
      }
      //email body
      //send email test@merittravelcutsbrochures.com

      $this->loadModel('Suppliers');
      $from = Configure::read('hippo.system_email');
      $subject = "Brochure order received";
      foreach ($msg as $key => $email) {
        $recipient = $this->Suppliers->findById($key)->first();

        if (!empty($recipient['email'])) {
          $this->_sendEmail($recipient['email'], $from, $subject, $email);
        }
      }


      $this->request->session()->write('TestResults.poaMessage', $msg);
    }
  }



  function _rushOrderNotif($order=null) {

    $orderDetails = "<ul>";

    foreach ($order as $key => $value) {
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

    foreach ($order['order_items'] as $item) {
      $orderItem['Brochure'] = $this->Brochures->findById($orderItem->brochure_id)->first();
      $message .= "<li>" . $item['qty_ordered'] . " x " . $item['Brochure']['name'] . "</li>";
    }

    $message .= $messageEnd;

    $from = Configure::read('hippo.system_email');
    $subject = "Rush order";
    $this->_sendEmail(Configure::read('hippo.warehouse_email'), $from, $subject, $message);
  }

 
}

?>