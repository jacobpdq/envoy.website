<?php

namespace App\Controller\Supplier;

use App\Controller\AppController;
use Cake\Core\Configure;
use Cake\Error\Debugger;

class ShoppingCartController extends \App\Controller\ShoppingCartController {

  public $name = 'ShoppingCart';
  public $uses = 'Order';



  //Supplier cart
  /*
    function supplier_index() {

    $cart = $this->request->session()->read('ShoppingCart');
    $this->request->data['Cart'] = $cart;
    $this->set('title_for_layout', __('Your cart'));
    }

    function supplier_placeOrder() {
    if (!empty($this->request->data)) {
    $cart = $this->request->session()->read('ShoppingCart');

    $orderItem['brochure_id'] = $this->request->data['OrderItem']['brochure_id'];
    $orderItem['qty_ordered'] = $this->request->data['OrderItem']['qty_ordered'];
    $orderItem['brochure_name'] = $this->request->data['OrderItem']['brochure_name'];
    $orderItem['max_order'] = $this->request->data['OrderItem']['max_order'];


    if ($orderItem['qty_ordered'] > 0) {
    if (empty($cart['Items'])) {
    $cart['Items']['0'] = $orderItem;
    } else {
    array_push($cart['Items'], $orderItem);
    }
    $this->request->session()->write('ShoppingCart', $cart);
    $this->Flash->set($orderItem['brochure_name'] . " was added to your cart");
    } else {
    $this->Flash->set(__("You must input a quantity of at least 1 to add to your cart"));
    }

    $this->redirect($this->referer());
    }
    }

    function supplier_removeItem($itemId=null) {
    if ($itemId != null) {
    $cart = $this->request->session()->read('ShoppingCart');
    unset($cart['Items'][$itemId]);
    $this->request->session()->write('ShoppingCart', $cart);
    $this->Flash->set(__("Brochure was removed from your cart"));
    $this->redirect($this->referer());
    }
    }

    function supplier_empty() {
    $shoppingCart['Supplier'] = $this->Auth->user('id');
    $shoppingCart['Items'] = array();
    $this->request->session()->write('ShoppingCart', $shoppingCart);
    $this->redirect(array('controller' => 'brochures', 'action' => 'index', 'prefix' => 'agent'));
    }

    function supplier_update() {

    }

    function supplier_processOrder() {
    if (!empty($this->request->data)) {
    $orderItems = $this->request->session()->read('ShoppingCart.Items');
    $this->loadModel('Order');


    $order = $this->request->data;


    $order['Order']['owner_id'] = $this->Auth->user('id');
    $order['Order']['owner_type'] = "1";
    $order['Order']['status'] = "0";

    $order['OrderItem'] = $orderItems;

    $this->Orders->create();
    //debug($order);

    if ($this->Orders->saveAll($order)) {
    $this->Flash->set('Order has been placed');
    $shoppingCart['Items'] = array();
    $this->request->session()->write('ShoppingCart', $shoppingCart);
    $this->redirect(array('controller' => 'Brochures', 'action' => 'index', 'prefix' => 'agent'));
    }
    }
    //debug($order);
    //debug($orderItems);
    }

    function supplier_shipping() {

    if (!empty($this->request->data)) {
    $cart = $this->request->data['Cart'];
    $this->request->session()->write('ShoppingCart.Items', $cart['Items']);
    }
    }
   */
}

?>