<?php

namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Core\Configure;

class OrdersController extends \App\Controller\OrdersController {

  public $name = 'Orders';

 
  public function index() {
    $this->Orders->recursive = 0;
    
    $this->paginate = array(
      'order' => ['Orders.created' =>  'DESC'],
      'limit' => 50
    );

    $this->set('orders', $this->paginate());
  }
    
   public function pack() {
    $this->paginate = array(
     'conditions' => array(
          'Orders.id in (
              select distinct order_items.order_id from order_items where order_items.status=0 OR order_items.status=6
              
            ) '
        ),
      'order' => array('Orders.priority' => 'DESC', 'Orders.created' => 'ASC'),
      'limit' => 50,
      'contain' => 'OrderItems'
      
    );
    $this->set('orders', $this->paginate());
  }  

  public function view($id = null) {
    if (!$id) {
      $this->Flash->set(__('Invalid order'));
      $this->redirect(array('action' => 'index'));
    }
     $this->LoadModel('Orders');
     $order = $this->Orders->find('all',[
       'conditions'=>[
         'Orders.id'=>$id
       ],
       'contain' => [
         'OrderItems.Brochures',
         'Agents'
      ]
    ])->first()->toArray();

     $this->set('order', $order);
  }
  
  public function ship($id = null) {
    if (!$id) {
      $this->Flash->set(__('Invalid order'));
      $this->redirect(array('action' => 'index'));
    }
    if (!empty($this->request->data)) {

      $shippedvia = $this->request->data['shipped_via'];
      
      $order = $this->Orders->findById($id)->contain(['OrderItems'])->first();
      $order['shipped_via'] = $shippedvia;
      $this->Orders->save($order);

      $orderitems = $order['order_items'];
      

      foreach ($orderitems as $item) {
        if ($item['status'] == 6) {
        $item['shipped_via'] = $shippedvia;
        $this->Orders->OrderItems->save($item);
        }
      }

      $this->Flash->set(__('Delivery Mode Confirmed'));
       $this->redirect($this->referer());
    } else {
      $this->request->data = $this->Orders->findById($id)->contain('OrderItems.Brochures')->first()->toArray();

    }
    $this->set('order', $this->Orders->get($id));
  }
 
  public function ship2($id = null) {

    if (!$id) {
      $this->Flash->set(__('Invalid order'));
      $this->redirect(array('action' => 'index'));
    }

    if (!empty($this->request->data)) {
      if ($this->Orders->save($this->request->data)) {
    
        $boxes = $this->request->data['boxes'];
        $order = $this->Orders->get($id);
        $orderitems = $order['OrderItems'];
      }
    } else {
      $this->request->data = $this->Orders->findById($id)->first()->toArray();
    }

    
    $this->set('order', $this->Orders->findById($id)->contain('OrderItems.Brochures')->first()->toArray());
  }
 
  public function ship3($id = null) {
    if (!$id) {
      $this->Flash->set(__('Invalid order'));
      $this->redirect(array('action' => 'index'));
    }

    if (!empty($this->request->data)) {

        $adminId = $this->Auth->user('id');

        $waybill = $this->request->data['tracking_number'];

        $order = $this->Orders->findById($id)->contain('OrderItems.Brochures')->first();

        $orderitems = $order['order_items'];

        foreach ($orderitems as $item) {
          if ($item['status'] == 6) {

            $item['status'] = 3;
            $item['tracking_number'] = $waybill;

            $tot_inv_temp = $item['brochure']['inv_balance'] - $item['qty_shipped'];
            $item['brochure']['inv_balance'] = $tot_inv_temp;

            if ($adminId == 3) {

              $on_inv_temp = $item['brochure']['Ontario_inventory'] - $item['qty_shipped'];
              $item['brochure']['Ontario_inventory'] = $on_inv_temp;

              if ($on_inv_temp <= $item['brochure']['inv_notif_threshold']) {
                $this->_lowInvNotif($item['brochure']);
              }
            } else {
              
              $bc_inv_temp = $item['brochure']['bc_inventory'] - $item['qty_shipped'];
              $item['brochure']['BC_inventory'] = $bc_inv_temp;
              
              if ($bc_inv_temp <= $item['brochure']['inv_notif_threshold']) {
                $this->_lowInvNotif($item['brochure']);
              }
            }
    
            $this->Orders->OrderItem->save($item);

            //$this->Orders->OrderItem->save($item);
          }
        }

        $this->Flash->set('Order Completed');
        $this->redirect(array('controller' => 'orders', 'action' => 'pack'));
    } else {
      $this->request->data = $this->Orders->findById($id)->first()->toArray();
    }

    $this->set('order', $this->Orders->findById($id)->contain('OrderItems.Brochures')->first()->toArray());
  }

  public function printpack($id = null) {
    $this->layout= 'blank';
  
   
    if (!$id) {
      $this->Flash->set(__('Invalid order'));
      $this->redirect(array('action' => 'index'));
    }
    
    $this->set('order', $this->Orders->findById($id)->contain('OrderItems.Brochures','Suppliers')->first()->toArray());
    $adminId = $this->Auth->user('id');
    $this->set(compact('adminId'));
  }

  public function add() {
    if (!empty($this->request->data)) {

      $order = $this->Orders->newEntity($this->request->data);
      
      if ($this->Orders->save($order)) {
        $this->Flash->set(__('The order has been saved'));
        $this->redirect(array('action' => 'index'));
      } else {
        $this->Flash->set(__('The order could not be saved. Please, try again.'));
      }
    }
    $agents = $this->Orders->Agents->find('list');

    $this->set(compact('agents'));
  }

  public function edit($id = null) {
    
    if (!$id && empty($this->request->data)) {
      $this->Flash->set(__('Invalid order'));
      $this->redirect(array('action' => 'index'));
    }
    if (!empty($this->request->data)) {

      $order = $this->Orders->newEntity($this->request->data);

      if ($this->Orders->save($order)) {
        $this->Flash->set(__('The order has been saved'));
        $this->redirect(array('action' => 'index'));
      } else {
        $this->Flash->set(__('The order could not be saved. Please, try again.'));
      }
    }
    if (empty($this->request->data)) {
      $this->request->data = $this->Orders->find('all',[
        'conditions' => [
          'Orders.id' => $id
        ],
        'contain' => [
          'OrderItems.Brochures'
        ]
      ])->first()->toArray();
    }
    //   $agents = $this->Orders->Agents->find('list');
    //   $this->set(compact('agents'));
  }

  public function delete($id = null) {
    if (!$id) {
      $this->Flash->set(__('Invalid id for order'));
      $this->redirect(array('action' => 'index'));
    }

    $order = $this->Orders->findById($id)->first();

    if ($this->Orders->delete($order)) {
      $this->Flash->set(__('Order deleted'));
      $this->redirect($this->referer());
    } else {
      $this->Flash->set(__('Order was not deleted'));
      $this->redirect($this->referer());
    }
  }
}

?>