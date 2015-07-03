<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Core\Configure;

class OrderItemsController extends AppController {

  public $name = 'OrderItems';
  public $helpers = array('ImageResize');

 

  function _notifyOrderOwner($order=null) {

    $from = Configure::read('hippo.system_email');
    $subject = "Order shipped";
    //$message = Configure::read('hippo.msg_agent_reg');
    //$agent = $this->Auth->user();
    $email = "";

    if ($order['Order']['owner_type'] == '0') {
      $this->loadModel('Agent');
      $agent = $this->Agents->get($order['Order']['owner_id']);
      $email = $agent['Agent']['email'];
    } else if ($order['Order']['owner_type'] == '1') {
      $this->loadModel('Supplier');
      $agent = $this->Suppliers->get($order['Order']['owner_id']);
      $email = $agent['Supplier']['email'];
    }

    $message = "";
    if (!empty($order['OrderItem'])) {

      $message = "<html>
        <head>
        </head>
        <body>
        <p>Your order containing the following brochures, has been shipped.</p>
        <ol>";
      $messageEnd = "</ol>
        </body>
        </html>";

      foreach ($order['OrderItem'] as $item) {
        $message .= "<li>" . $item['qty_ordered'] . " x " . $item['Brochure']['name'] . "</li>";
      }

      $message .= $messageEnd;
    }

    if (!empty($email)) {
      $this->_sendEmail($email, $from, $subject, $message);
    }
  }
}
?>