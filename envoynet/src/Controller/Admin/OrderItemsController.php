<?php

namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Core\Configure;

class OrderItemsController extends \App\Controller\OrderItemsController {


  public $helpers = array('ImageResize');

  
  public function index() {
    $this->OrderItem->recursive = 0;
    $this->set('orderItems', $this->paginate());
  }

  public function view($id = null) {
    if (!$id) {
      $this->Flash->set(__('Invalid order item'));
      $this->redirect(array('action' => 'index'));
    }
    $this->set('orderItem', $this->OrderItem->get($id));
  }

  public function add($id = null) {
    if (!empty($this->request->data)) {
      $this->OrderItem->create();
      if ($this->OrderItem->save($this->request->data)) {
        $this->Flash->set(__('The order item has been saved'));
        $this->redirect(array('action' => 'index'));
      } else {
        $this->Flash->set(__('The order item could not be saved. Please, try again.'));
      }
    }
 
 
    $brochures = $this->OrderItem->Brochures->find('list', array('order' => 'Brochures.name', 'conditions' => array('Brochures.status' => 1)));
    $this->set(compact('brochures', 'id'));
  }

  public function edit($id = null) {
    if (!$id && empty($this->request->data)) {
      $this->Flash->set(__('Invalid order item'));
      $this->redirect(array('action' => 'index'));
    }
    if (!empty($this->request->data)) {
      if ($this->OrderItem->save($this->request->data)) {
        $this->Flash->set(__('The order item has been saved'));
        $this->redirect(array('action' => 'index'));
      } else {
        $this->Flash->set(__('The order item could not be saved. Please, try again.'));
      }
    }
    if (empty($this->request->data)) {
      $this->request->data = $this->OrderItem->get($id);
    }
    //   $orders = $this->OrderItem->Orders->find('list');
    $brochures = $this->OrderItem->Brochures->find('list');
    $this->set(compact('brochures'));
  }

  public function bulkUpdate() {
    if (!empty($this->request->data)) {
      if ($this->OrderItem->saveAll($this->request->data[], array('validate' => 'first'))) {

        $orderStatus = "1";
        $orderId = $this->request->data['Order']['id'];
        foreach ($this->request->data as $item) {
          if ($item['status'] != '3' && $item['status'] != '4') {
            $orderStatus = "0";
          }
        }

        $this->OrderItem->Orders->contain('OrderItems.Brochure');
        $order = $this->OrderItem->Orders->get($orderId);
        $this->OrderItem->Orders->set('status', $orderStatus);
        if ($this->OrderItem->Orders->save()) {

          if ($orderStatus == "1") {
      //      $this->_notifyOrderOwner($order);
          }

          $this->Flash->set(__('Order items updated'));
          $this->redirect($this->referer());
        } else {
          $this->Flash->set(__('Order items could not be updated'));
          $this->redirect($this->referer());
        }
      }
    }
  }

 

  public function delete($id = null) {
    if (!$id) {
      $this->Flash->set(__('Invalid id for order item'));
      $this->redirect(array('action' => 'index'));
    }
    if ($this->OrderItem->delete($id)) {
      $this->Flash->set(__('Order item deleted'));
      $this->redirect(array('action' => 'index'));
    }
    $this->Flash->set(__('Order item was not deleted'));
    $this->redirect(array('action' => 'index'));
  }
  
  public function pack($id = null) {
   


    if (!empty($this->request->data))   {
      if ($this->request->data['status']==0) {
        if ($this->request->data['brochure']['sku'] <> $this->request->data['barcodes']) {

          $this->Flash->set(__('Invalid barcode'));
          $this->redirect($this->referer());
        } else{

          $orderItem = $this->OrderItems->get($this->request->data['id']);

          $orderItem->status = 6;
          $orderItem->qty_shippded = $this->request->data['qty_shipped'];


          if ($this->OrderItems->save($orderItem)) {


            //      $this->Flash->set('Barcode Confirmed', 'default', array('class' => 'flash_good'));
            $this->redirect($this->referer());
          } 
        
        }
      } else if ($this->request->data['status']==6) {
        if ($this->OrderItem->save($this->request->data, true, array('qty_shipped'))) {
          $this->Flash->set('Qty Shipped Updated', 'default', array('class' => 'flash_good'));
          $this->redirect($this->referer());
        } 
      } else {
        $this->Flash->set(__('The order item could not be saved. Please, try again.'));
        $this->redirect($this->referer());
      }
    } else {
      $this->paginate = [
        'limit' => 1,
        'order' => ['Brochures.sku' => 'DESC'] 
      ];
      $orderItems = $this->OrderItems->find('all', array(
        'conditions' => array(
          'order_id' => $id, 
          'OrderItems.status IN' => '(0, 6)'
         ),
      'contain' => array('Brochures.Images', 'Orders') 
      ));
      $orderItems = $this->paginate($orderItems);
      if ($orderItems->count() > 0) {
        $this->request->data = $orderItems->first()->toArray();
      } else {
        $this->Flash->set(__('All order items have been shipped.'));
        $this->redirect(['controller'=>'orders','action'=>'pack']);
      }
      //  $this->request->data = $this->OrderItem->get(77614);
    }
    $this->set(compact('id','barcode'));
  }
}
?>