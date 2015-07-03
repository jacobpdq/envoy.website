<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Core\Configure;


class BrochuresController extends AppController {

  public $name = 'Brochures';
  public $helpers = array('ImageResize');

  public $paginate = [
    'limit' => 5,
    'order' => [
      'Brochures.created' => 'desc',
    ],
    'contain' => [
      'Images',
      'BrochureOrderAmts'
    ]
  ];

  public function initialize() {
    parent::initialize();
    $this->loadComponent('Paginator');

  }
  
  
   function _notifyWarehouse($broch) {
    $from = Configure::read('hippo.system_email');
    $to = Configure::read('hippo.warehouse_email2');
    $subject = "Brochure changed or added";
   
      if (!empty($broch)) {

        $message = "<html>
        <head>
        </head>
         <h3>Brochure details:</h3>
        <b>Name:</b> " . $broch['Brochure']['name'] . " <br>
         <b>Sku:</b> " . $broch['Brochure']['sku'] . " <br>
         <b>Supplier Id:</b> " . $broch['Brochure']['supplier_id'] . " <br>
         <b>Description:</b> " . $broch['Brochure']['description'] . " <br>
         <b>Image id:</b> " . $broch['Brochure']['image_id'] . " <br>
         <b>Max order:</b> " . $broch['Brochure']['max_order'] . " <br>
         <b>Qty per skid:</b> " . $broch['Brochure']['qty_skid'] . " <br>
         <b>Qty per box:</b> " . $broch['Brochure']['qty_box'] . " <br>
         <b>Weight:</b> " . $broch['Brochure']['weight'] . " <br>
         <b>ON inventory:</b> " . $broch['Brochure']['Ontario_inventory'] . " <br>
         <b>BC inventory:</b> " . $broch['Brochure']['BC_inventory'] . " <br>
         <b>Inventory balance:</b> " . $broch['Brochure']['inv_balance'] . " <br>
         <b>Low inventory notif:</b> " . $broch['Brochure']['inv_notif_threshold'] . " <br>
         <b>Display on agent page:</b> " . $broch['Brochure']['display_on_agent_page'] . " <br>
         <b>POA:</b> " . $broch['Brochure']['poa'] . " <br>
         <b>Status:</b> " . $broch['Brochure']['status'] . " <br>
         <b>ebrochure:</b> " . $broch['Brochure']['ebrochure'] . " <br>
        <ol>";
        $messageEnd = "</ol>
        </body>
        </html>";

        $message .= $messageEnd;

        $this->_sendEmail($from, $to, $subject, $message);  
      }
    
  }

}

?>