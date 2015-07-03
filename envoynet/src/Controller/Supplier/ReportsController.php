<?php

namespace App\Controller\Supplier;

use App\Controller\AppController;
use Cake\Core\Configure;
use Cake\Event\Event;
use Cake\Network\Response;

class ReportsController extends \App\Controller\ReportsController {

   public function beforeFilter(Event $event) {
    parent::beforeFilter($event);
  }

  public function ordersExport() {
 
    ini_set('memory_limit', '256M');
   
    // Stop Cake from displaying action's execution time
    Configure::write('debug', 0);

    $user_statuses = array('0' => 'awaiting', '1' => 'active', '2' => 'disabled');
    $order_owners = array('0'=>'agent','1'=>'supplier');
    $order_priorities = array('0'=>'normal','1'=>'rush');
    $order_statuses = array('0'=>'pending','1'=>'approved','2'=>'packaged','3'=>'verified','4'=>'out for delivery');
    $supplierId = $this->Auth->user('id');

    if (!empty($this->request->data)) {

      $this->loadModel('Orders');

      $startDate = $this->request->data['start_date'];
      $endDate = $this->request->data['end_date'];
      // glen start
      $endDateRoundup = strtotime ( '+1 day' , strtotime ( $endDate ) ) ;
      $endDateRoundup = date ( 'Y-m-j' , $endDateRoundup );
      // glen end

      $rawData = $this->Orders->find('all', array(
        'conditions' => array(
          //     'Orders.owner_id' => $supplierId,
          //     'Orders.owner_type' => '1',
          'Orders.created >=' => $startDate,
          'Orders.created <=' => $endDateRoundup,
          array(
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
          )
        ),
        'contain' => ['OrderItems.Brochures.Suppliers']
      ));

      $data = array();


      foreach ($rawData as $d) {

        $obj['id'] = $d['id'];
        $obj['created'] = $d['created'];
        $obj['owner_type'] = $order_owners[$d['owner_type']];
        $obj['shipping_company'] = $d['shipping_company'];
        $obj['shipping_firstname'] = $d['shipping_firstname'];
        $obj['shipping_lastname'] = $d['shipping_lastname'];
        $obj['shipping_address1'] = $d['shipping_address1'];
        $obj['shipping_address2'] = $d['shipping_address2'];
        $obj['shipping_province'] = $d['shipping_province'];
        $obj['shipping_city'] = $d['shipping_city'];
        $obj['shipping_postalcode'] = $d['shipping_postalcode'];
        $obj['shipping_email'] = $d['shipping_email'];
        $obj['shipping_phonenumber'] = $d['shipping_phonenumber'];
        $obj['order_comments'] = $d['order_comments'];
        //   $obj['priority'] = $order_priorities[$d['priority']];
        //   $obj['arrival_due_date'] = $d['arrival_due_date'];
        //   $obj['status'] = $order_statuses[$d['status']];
        $obj['items']='';
        foreach($d['order_items'] as $item)
        {
          if(!empty ($item['brochure']['supplier'])) {
           $mastersupplier = $item['brochure']['supplier']['master_supplier'];
          }
          if (($item['brochure']['supplier_id']==$supplierId) OR ($mastersupplier==$supplierId)) {  // if added by glen
            $obj['items'] .= $item['qty_ordered'].":".$item['brochure']['name'].";";
          }
        }

        array_push($data, $obj);
      }

      // Define column headers for CSV file, in same array format as the data itself
      $headers = array(
        'id' => 'Order number',
        'created' => 'Date',
        'owner_type' => 'Source',
        'shipping_company' => 'Company',
        'shipping_firstname' => 'Firstname',
        'shipping_lastname' => 'Lastname',
        'shipping_address1' => 'Address1',
        'shipping_address2' => 'Address2',
        'shipping_province' => 'Province',
        'shipping_city' => 'City',
        'shipping_postalcode' => 'Postalcode',
        'shipping_email' => 'Email',
        'shipping_phonenumber' => 'Phonenumber',
        'order_comments' => 'Comments',
        //     'priority' => 'Priority',
        //     'arrival_due_date' => 'Must arrive before',
        //     'status' => 'Status',
        'items'=>'Items'
      );

      // Add headers to start of data array
      array_unshift($data, $headers);
      $this->layout = 'csv';

      $data = $this->str_putcsv($data);
      $this->response->body($data);
      $this->response->type('csv');

     //force file download
      $filename = "myorders_" . $startDate . "_" . $endDate;
      $this->response->download($filename . '.csv');

      // Return response object to prevent controller from trying to render
      // a view.
      return $this->response;

    }
  }
}




?>