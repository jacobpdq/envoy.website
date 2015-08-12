<?php

namespace App\Controller\Admin;

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
    $order_item_statuses = array('0' => 'pending', '1' => 'waiting for aproval', '2' => 'back ordered', '3'=> 'out for delivery', '4'=> 'cancelled', '5'=> 'supplier to ship');
   // $supplierId = $this->Auth->user('id');

    if (!empty($this->request->data)) {

      $this->loadModel('Orders');

      $startDate = $this->request->data['start_date'];
      $endDate = $this->request->data['end_date'];
      // glen start
      $endDateRoundup = strtotime ( '+1 day' , strtotime ( $endDate ) ) ;
      $endDateRoundup = date ( 'Y-m-j' , $endDateRoundup );
      // glen end
      //      $this->Orders->contain('OrderItem.Brochure'); // removed.name after .Brochure
      $rawData = $this->Orders->find('all', array(
                  'conditions' => array(
          'Orders.created >=' => $startDate,
          'Orders.created <=' => $endDateRoundup,
		  ),
				  'contain' => array('OrderItems'=> array('Brochures'=> array('fields' => array('id','name','sku')),'fields' => array('id','order_id','qty_ordered','brochure_id'))),
				  'fields' => array('id','created','owner_type','shipping_firstname','shipping_lastname','shipping_company','shipping_address1','shipping_address2','shipping_city','shipping_province','shipping_postalcode','shipping_phonenumber','shipping_email','order_comments')
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
    // if ($item['Brochure']['supplier_id']==$supplierId) {   // if added by glen
       //   $obj['items'] .= $item['qty_ordered'].":".$item['Brochure']['sku'].":".$item['Brochure']['name'].":".$order_item_statuses[$item['status']].";";
		   $obj['items'] .= $item['qty_ordered'].":".$item['brochure']['sku'].":".$item['brochure']['name'].";";
       //    }
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
  //glen end
  
  
   function waybillExportcanpar() {
      // Stop Cake from displaying action's execution time

      $user_statuses = array('0' => 'awaiting', '1' => 'active', '2' => 'disabled');
      $order_owners = array('0'=>'agent','1'=>'supplier');
      $order_priorities = array('0'=>'normal','1'=>'rush');
      $order_statuses = array('0'=>'pending','1'=>'approved','2'=>'packaged','3'=>'verified','4'=>'out for delivery');
      $order_item_statuses = array('0' => 'pending', '1' => 'waiting for aproval', '2' => 'back ordered', '3'=> 'out for delivery', '4'=> 'cancelled', '5'=> 'supplier to ship');
    
      if (!empty($this->request->data)) {
  	 
        $this->loadModel('Orders');

        $rawData = $this->Orders->find('all', array(
                    'conditions' => array(
                        'Orders.id' => $this->request->data['orderid'],
                                )
                ))->contain('OrderItems')->first()->toArray();

        
       $data = [];
             // Define column headers for CSV file, in same array format as the data itself
      $headers = array(
        'id' => 'Order number',
        'shipping_firstname' => 'First Name',
        'shipping_company' => 'Company',
        'shipping_address1' => 'Address1',
        'shipping_address2' => 'Address2',
        'shipping_city' => 'City',
        'shipping_province' => 'Province',
        'shipping_postalcode' => 'Postal Code',
        'shipping_phonenumber' => 'Phonenumber',
        'boxes' => 'Boxes',
        'weight' => 'Weight',
        'signature' => 'Signature'
      );

      // Add headers to start of data array
  //    array_unshift($data, $headers);
  	    $obj['id'] = 'Web'.'-'.$rawData['id'];
          $obj['shipping_firstname'] = $rawData['shipping_firstname'].' '.$rawData['shipping_lastname'];
          $obj['shipping_company'] = $rawData['shipping_company'];
          $obj['shipping_address1'] = $rawData['shipping_address1'];
          $obj['shipping_address2'] = $rawData['shipping_address2'];
  		$obj['shipping_city'] = $rawData['shipping_city']; 
          $obj['shipping_province'] = $rawData['shipping_province'];
  		$strippedpostal = str_replace(' ', '', $rawData['shipping_postalcode']);
  		$obj['shipping_postalcode'] = $strippedpostal;
          $obj['shipping_phonenumber'] = $rawData['shipping_phonenumber'];
      	$obj['boxes'] = $this->request->data['boxes'];
          $obj['weight'] = $this->request->data['weight'];
          $obj['signature'] = 1;
      
          array_push($data, $obj);
  	 
  	
   //     }

          // Make the data available to the view (and the resulting CSV file)
        $this->set(compact('data'));
  	


      $this->layout = 'csv';
      $data = $this->str_putcsv($data);
      $this->response->body($data);
      $this->response->type('csv');

     //force file download
      $filename = "Web-".$rawData['id'];
      $this->response->download($filename . '.csv');

      // Return response object to prevent controller from trying to render
      // a view.
      return $this->response;
     
  	}
  }
  
  
 public function waybillExportups() {
    // Stop Cake from displaying action's execution time
    //Configure::write('debug', 0);

    $user_statuses = array('0' => 'awaiting', '1' => 'active', '2' => 'disabled');
    $order_owners = array('0'=>'agent','1'=>'supplier');
    $order_priorities = array('0'=>'normal','1'=>'rush');
    $order_statuses = array('0'=>'pending','1'=>'approved','2'=>'packaged','3'=>'verified','4'=>'out for delivery');
    $order_item_statuses = array('0' => 'pending', '1' => 'waiting for aproval', '2' => 'back ordered', '3'=> 'out for delivery', '4'=> 'cancelled', '5'=> 'supplier to ship');
  
    if (!empty($this->request->data)) {
	 
      $this->loadModel('Order');
    $this->Orders->contain('OrderItem'); 
      $rawData = $this->Orders->find('all', array(
                  'conditions' => array(
                      'Orders.id' => $this->request->data['orderid'],
                              )
              ));

      
      $data = array(null);
	    $obj['id'] = 'Web'.'-'.$rawData['id'];
        $obj['shipping_firstname'] = $rawData['shipping_firstname'].' '.$rawData['shipping_lastname'];
        $obj['shipping_company'] = $rawData['shipping_company'];
        $obj['shipping_address1'] = $rawData['shipping_address1'];
        $obj['shipping_address2'] = $rawData['shipping_address2'];
		$obj['shipping_city'] = $rawData['shipping_city']; 
        $obj['shipping_province'] = $rawData['shipping_province'];
		$strippedpostal = str_replace(' ', '', $rawData['shipping_postalcode']);
		$obj['shipping_postalcode'] = $strippedpostal;
        $obj['shipping_phonenumber'] = $rawData['shipping_phonenumber'];
    	$obj['boxes'] = $this->request->data['boxes'];
        $obj['weight'] = $this->request->data['weight'];
        $obj['signature'] = 1;
    
        array_push($data, $obj);
	 
	
 //     }

        // Make the data available to the view (and the resulting CSV file)
      $this->set(compact('data'));
	

      $filename = "Web-".$rawData['id'];
//  $filename = "myorders_";
      $this->set(compact('filename'));
    $this->layout = "csv"; 
   
 

 
   
	}
  }
  
  
}




?>