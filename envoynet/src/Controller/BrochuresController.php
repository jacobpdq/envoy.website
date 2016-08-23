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
         <h3><?php echo __('Brochure details'); ?>:</h3>
         <b><?php echo __('Name'); ?>:</b> " . $broch['Brochure']['name'] . " <br>
         <b><?php echo __('Sku'); ?>:</b> " . $broch['Brochure']['sku'] . " <br>
         <b><?php echo __('Brochure Language'); ?>:</b> " . $broch['Brochure']['is_french'] . " <br>
         <b><?php echo __('Supplier Id'); ?>:</b> " . $broch['Brochure']['supplier_id'] . " <br>
         <b><?php echo __('Description'); ?>:</b> " . $broch['Brochure']['description'] . " <br>
         <b><?php echo __('Image id'); ?>:</b> " . $broch['Brochure']['image_id'] . " <br>
         <b><?php echo __('Max order'); ?>:</b> " . $broch['Brochure']['max_order'] . " <br>
         <b><?php echo __('Qty per skid'); ?>:</b> " . $broch['Brochure']['qty_skid'] . " <br>
         <b><?php echo __('Qty per box'); ?>:</b> " . $broch['Brochure']['qty_box'] . " <br>
         <b><?php echo __('Weight'); ?>:</b> " . $broch['Brochure']['weight'] . " <br>
         <b><?php echo __('ON inventory'); ?>:</b> " . $broch['Brochure']['Ontario_inventory'] . " <br>
         <b><?php echo __('BC inventory'); ?>:</b> " . $broch['Brochure']['BC_inventory'] . " <br>
         <b><?php echo __('Inventory balance'); ?>:</b> " . $broch['Brochure']['inv_balance'] . " <br>
         <b><?php echo __('Low inventory notif'); ?>:</b> " . $broch['Brochure']['inv_notif_threshold'] . " <br>
         <b><?php echo __('Display on agent page'); ?>:</b> " . $broch['Brochure']['display_on_agent_page'] . " <br>
         <b><?php echo __('POA'); ?>:</b> " . $broch['Brochure']['poa'] . " <br>
         <b><?php echo __('Status'); ?>:</b> " . $broch['Brochure']['status'] . " <br>
         <b><?php echo __('ebrochure'); ?>:</b> " . $broch['Brochure']['ebrochure'] . " <br>
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