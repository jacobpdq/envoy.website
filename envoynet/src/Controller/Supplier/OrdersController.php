<?php

namespace App\Controller\Supplier;

use App\Controller\AppController;
use Cake\Core\Configure;
use Cake\Form\Form;
use Cake\Utility\Hash;
use Cake\Routing\Router;

class OrdersController extends \App\Controller\OrdersController {

  
  public function index() {
  
    ini_set('memory_limit', '256M');  

    $this->set('title_for_layout', __('My Orders'));
	
		$mastersupplier = $this->Auth->user('master_supplier');
	
    if ($mastersupplier == 0) {
      $supplierId = $this->Auth->user('id'); 
  	} else {
      $supplierId = $this->Auth->user('master_supplier');
  	}
	
    if (!empty($supplierId)) {

      if (isset($this->request->query['filter_start_date']) && isset($this->request->query['filter_end_date']))  {

        $endDateRoundup = strtotime ( '+1 day' , strtotime ($this->request->query['filter_end_date'] ) ) ;
        $endDateRoundup = date ( 'Y-m-j' , $endDateRoundup );

        $this->paginate = array(
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
                ),
                ['Orders.created >=' => $this->request->query['filter_start_date']],
                ['Orders.created <=' => $endDateRoundup]
              
          ),
				  'contain' => array('OrderItems.Brochures', 'OrderItems.Brochures.Suppliers'),
          'order' => [
            'Orders.created'=> 'DESC'
          ],
          'limit' => 50
        );

  

 

        $this->request->data['filter_start_date'] = $this->query['filter_start_date'];
        $title[] = __('StartDate') . ': ' . $this->query['filter_start_date'];

        $this->request->data['filetr_end_date'] = $this->query['filter_end_date'];
        $title[] = __('EndDate') . ': ' . $this->data['filter_end_date'];
      } else {

        $this->paginate = array(
            'conditions' => array('OR' => array(
                  'Orders.id in (
                  select distinct order_items.order_id from order_items where order_items.brochure_id in (
                       select brochures.id from brochures where brochures.supplier_id = ' . $supplierId . '
                   )
                 )', 
				  'Orders.id in (
                  select distinct order_items.order_id from order_items where order_items.brochure_id in (
                       select brochures.id from brochures where brochures.supplier_id in (select suppliers.id from suppliers where suppliers.master_supplier = ' . $supplierId . '
                   ))
                 )'
	               )),
	     
                 
			
				  'contain' => array('OrderItems.Brochures', 'OrderItems.Brochures.Suppliers'),
            'order' => [
              'Orders.created' => 'DESC'
            ],
            'limit' => 50
        );
      }
    }

    $this->set('orders', $this->paginate());
	  $this->set(compact('supplierId'));
  }

  public function search() {
    // the page we will redirect to
    $url['action'] = 'index';
    $url['prefix'] = 'supplier';

    // build a URL will all the search elements in it
    // the resulting URL will be
    // example.com/cake/posts/index/Search.keywords:mykeyword/Search.tag_id:3
    
    foreach ($this->request->data as $k => $v) {
      if (is_array($v)) {
        foreach ($v as $kk => $vv) {
          $url[$k . '.' . $kk] = $vv;
        }
      } else {
        $url[$k] = $v;
      }
    }
    
    // redirect the user to the url
    $this->redirect(Router::url($url));
  }

  public function view($id = null) {
    if (!$id) {
      $this->Flash->set(__('Invalid order'));
      $this->redirect(array('action' => 'index'));
    }



    $this->set('title_for_layout', __('Order #') . $id);

    $order =  $this->Orders->findById($id)->contain([
        'OrderItems.Brochures.Suppliers'
      ])->first();

    $this->set(compact('order'));
	
	  $mastersupplier = $this->Auth->user('master_supplier');
	
    if ($mastersupplier == 0) {
      $supplierId = $this->Auth->user('id'); 
	  }
  	else {
  	  $supplierId = $this->Auth->user('master_supplier');
  	}
	  
	  
	  $this->loadModel('Brochures');

    $brochures = $this->Brochures->find('list', array(
      'conditions' => array(
        'OR' => array(
          'Brochures.supplier_id' => $supplierId, 
          'Suppliers.master_supplier' => $supplierId
        ), 
        'Brochures.status' => '1'
      ), 
      'order' => [
        'Brochures.name' => 'ASC'
      ],
      'contain' => [
        'Suppliers'
      ]
    ));
    $brochures = $brochures->toArray();
	 
    $this->set(compact('brochures','supplierId'));
	
  }

  public function quickOrder() {
    $this->set('title_for_layout', __('Place Order'));
	
		$mastersupplier = $this->Auth->user('master_supplier');
	
    if ($mastersupplier == 0) {
      $supplierId = $this->Auth->user('id'); 
  	} else {
  	 $supplierId = $this->Auth->user('master_supplier');
  	}

    if ($supplierId != null) {

      $this->loadModel('Brochures');
      $brochures = $this->Brochures->find('all', array(
        'conditions' => array(
          'OR' => array(
            'Brochures.supplier_id' => $supplierId, 
            'Suppliers.master_supplier' => $supplierId
          ), 
          'Brochures.status' => '1'
        ), 
        'limit' => '200', 
        'order' => array(
          'Brochures.category',
          'Brochures.name'
        ), 
        'contain'=> 'Suppliers'
      ));

      $this->set(compact('brochures'));
      
      $shippingProvinces = array('AB', 'BC', 'MB', 'NB', 'NL', 'NT', 'NS', 'NU', 'ON', 'PE', 'QC', 'SK', 'YT','-----', 'AL', 'AK', 'AZ', 'AR', 'CA', 'CO', 'CT', 'DE', 'DC', 'FL', 'GA', 'HI', 'ID', 'IL', 'IN', 'IA', 'KS', 'KY', 'LA', 'ME', 'MD', 'MA', 'MI', 'MN', 'MS', 'MO', 'MT', 'NE', 'NV', 'NH', 'NJ', 'NM', 'NY', 'NC', 'ND', 'OH', 'OK', 'OR', 'PA', 'RI', 'SC', 'SD', 'TN', 'TX', 'UT', 'VT', 'VA', 'WA', 'WV', 'WI', 'WY');
      $shippingProvinces = array_combine($shippingProvinces,$shippingProvinces);
      $this->set(compact('shippingProvinces'));
    
    }
  }

  public function processOrder() {
    if (!empty($this->request->data)) {
      $order = $this->request->data;
      $this->loadModel('Orders');

      $processedOrder = $this->Orders->newEntity($this->request->data);

      $processedOrder->owner_id = $this->Auth->user('id');
      $processedOrder->owner_type = "1";
      $processedOrder->status = "0";

      $brochureIds = "";
      foreach ($order['order_items'] as $item) {
        if (!empty($brochureIds)) {
          $brochureIds .= ',' . $item['brochure_id'];
        } else {
          $brochureIds .= $item['brochure_id'];
        }
      }

      $this->loadModel('Brochures');
      $brochures = $this->Brochures->find('all', array('conditions' => array("Brochures.id IN ($brochureIds)")));  //load brochure data for the order items

      $orderItems = [];
      foreach ($order['order_items'] as $item) {
        foreach ($brochures as $brochure) {
          if ($brochure['id'] == $item['brochure_id']) {
            if (!empty($item['qty_ordered'])) {
              if ($item['qty_ordered'] <= $brochure['max_order']) {   //check max order
                if ($item['qty_ordered'] <= $brochure['inv_balance']) {  //check stock
                  $orderItem = $this->OrderItems->newEntity($item);
                    //create order item
                  $orderItem->brochure_name = $brochure['name'];
                  $orderItem->ontario = $brochure['ontario'];

                	if ($brochure['poa'] == '1') {  //set item initial status - no need to get poa (supplier order approval from supplier orders)
                    $orderItem->status = '1';
                  } else {
                    $orderItem->status = '0';
                  }

                  // to avoid DB changes hard coding default for now
                  $orderItem->shipped_via = '';
                  $orderItem->tracking_number = '';

                  array_push($orderItems, $orderItem);
                } else {
                  $this->Flash->set('Order could not be placed. Not enough units in stock.');
                  $this->redirect($this->referer());
                }
              } else {
                $this->Flash->set('Order could not be placed. Max order quantity exceeded.');
                $this->redirect($this->referer());
              }
            }
          }
        }
        $processedOrder->order_items = $orderItems;
        if ($last = $this->Orders->save($processedOrder,array('validation'=>'first' ))) {
          $this->Flash->set('Order has been placed');
          $orderId = $last->id;
          //     $this->_updateInventory($orderId);
          //     $this->_checkForPoaBrochures($orderId); remove supplier approval requirement on orders received from supplier page
          if ($processedOrder['priority'] == '1') {
            $this->_rushOrderNotif($orderId);
          } else{
            $this->_supplierOrderNotif($orderId);
          }
          
          $this->redirect(array('controller' => 'Brochures', 'action' => 'index', 'prefix' => 'supplier'));
        } else {
          $this->Flash->set('Order could not be placed');
          $this->redirect($this->referer());
        }
      }
    }
  }
  
  
  public function searchAgent() {
    $this->layout = 'ajax';
    if (!empty($this->request->data)) {
      $this->loadModel('Agents');
      $agents = $this->Agents->find('all', array('limit' => '500',
                  'conditions' => array(
                              'Agents.company LIKE' => str_replace('*', '%', $this->request->data['company']) 
                  )
              ));

      $this->set(compact('agents'));
    }
  }
}

?>