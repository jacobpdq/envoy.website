<?php

namespace App\Controller\Supplier;

use App\Controller\AppController;
use Cake\Core\Configure;

class OrderItemsController extends \App\Controller\OrderItemsController {

  public $helpers = array('ImageResize');

  function edit($id = null) {
    if (!$id && empty($this->request->data)) {
      $this->Flash->set(__('Invalid order item'));
      $this->redirect($this->referer());
    }
    if (!empty($this->request->data)) {
      $this->loadModel('OrderItems');
      $orderItem = $this->OrderItems->get($id);

      $orderItem->qty_ordered = $this->request->data['qty_ordered'];

      if ($this->OrderItems->save($orderItem)) {
        $this->Flash->set(__('Order item updated'));
        $this->redirect($this->referer());
      } else {
        $this->Flash->set(__('The order item could not updated. Please, try again.'));
      }
    }
  }

  function approve($id = null) {
    if (!$id) {
      $this->Flash->set(__('Invalid order item'));
      $this->redirect($this->referer());
    }
    $orderItem = $this->OrderItems->get($id);
    $orderItem->status= '0';
    if ($this->OrderItems->save( $orderItem)) {
      $this->Flash->set(__('Order item approved'));
      $this->redirect($this->referer());
    } else {
      $this->Flash->set(__('The order item could not updated. Please, try again.'));
    }
  }

  function unapprove($id = null) {
    if (!$id) {
      $this->Flash->set(__('Invalid order item'));
      $this->redirect($this->referer());
    }
    $orderItem = $this->OrderItems->get($id);
    $orderItem->status='4';
    if ($this->OrderItems->save($orderItem)) {
      $this->Flash->set(__('Order item cancelled'));
      $this->redirect($this->referer());
    } else {
      $this->Flash->set(__('The order item could not updated. Please, try again.'));
    }
  }

  function delete($id = null) {
    if (!$id) {
      $this->Flash->set(__('Invalid id for order item'));
      $this->redirect($this->referer());
    }
    if ($this->OrderItems->delete($id)) {
      $this->Flash->set(__('Order item deleted'));
      $this->redirect($this->referer());
    }
    $this->Flash->set(__('Order item was not deleted'));
    $this->redirect($this->referer());
  }

  function ajaxEdit($id = null) {
    $this->layout = 'ajax';
    if (!$id && empty($this->request->data)) {
      $this->Flash->set(__('Invalid order item'));
      $this->redirect($this->referer());
    }
    $this->request->data = $this->OrderItems->get($id);
  }
  
  public function add() {
    if (!empty($this->request->data)) {
      $this->loadModel('Orders');
      
      $orderItem = $this->OrderItems->newEntity($this->request->data);

      if ($this->OrderItems->save($orderItem)) {
        $this->Flash->set(__('The order item has been saved'));
        $this->redirect($this->referer());
      } else {
        $this->Flash->set(__('The order item could not be saved. Please, try again.'));
      }
    }
  }
}



?>