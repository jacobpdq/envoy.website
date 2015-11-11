<?php

namespace App\Controller\Agent;

use App\Controller\AppController;
use Cake\Core\Configure;
use Cake\ORM\TableRegistry;
use Cake\Form\Form;


class ShoppingCartController extends \App\Controller\ShoppingCartController {

  public $uses = 'Order';

  public $brochures;


  public function initialize() {
    parent::initialize();
  }
  //Agent cart
  public function index() {

    $cart = $this->request->session()->read('ShoppingCart');
    $this->request->data['Cart'] = $cart;
    $this->set('title_for_layout', __('Your cart'));
    $orderForm = new Form();
    $this->set(compact('orderForm'));
  }

  public function placeOrder() {

    

    if (!empty($this->request->data)) {
      $cart = $this->request->session()->read('ShoppingCart');
      $orderItem['brochure_id'] = $this->request->data['OrderItem']['brochure_id'];
      $orderItem['qty_ordered'] = $this->request->data['OrderItem']['qty_ordered'];
      $orderItem['brochure_name'] = $this->request->data['OrderItem']['brochure_name'];
      $orderItem['max_order'] = $this->request->data['OrderItem']['max_order'];
      $orderItem['ontario'] = $this->request->data['OrderItem']['ontario'];
	    $orderItem['qty_choice'] = $this->request->data['OrderItem']['qty_choice'];
	
      $this -> loadModel('Brochures');
      $brochure =  $this->Brochures->findById($orderItem['brochure_id'])->first();

      if ($orderItem['qty_ordered'] > 0) {
        if ($orderItem['qty_ordered'] <= $orderItem['max_order']) {   //check max order
          if ($orderItem['qty_ordered'] <= $brochure['inv_balance']) {  //check inventory balance
            if (empty($cart['Items'])) {
              $cart['Items']['0'] = $orderItem;
            } else {
              $t = false;

              foreach ($cart['Items'] as $key => $item) { //check if order item for this brochure allready exists and update
                if ($item['brochure_id'] == $orderItem['brochure_id']) {
                  $t = true;
                  $newQty = $item['qty_ordered'] + $orderItem['qty_ordered'];

                  if ($newQty <= $orderItem['max_order']) {
                    if ($newQty <= $brochure['inv_balance']) {
                      $cart['Items'][$key]['qty_ordered'] = $newQty;
                    } else {
                      $this->Flash->error("Not enough units of " . $orderItem['brochure_name'] . "  in stock.");
                      return $this->redirect($this->referer());
                    }
                  } else {
                    $this->Flash->error("Max quantity for " . $orderItem['brochure_name'] . " was exceeded");
                    return $this->redirect($this->referer());
                  }
                }
              }

              if ($t == false) {  //add new order item
                array_push($cart['Items'], $orderItem);
              }
            }

            $this->request->session()->write('ShoppingCart', $cart); //update shopping cart in session

            $this->Flash->set($orderItem['brochure_name'] . " has been added to your cart");
          } else {
            $this->Flash->error("Not enough units of " . $orderItem['brochure_name'] . "  in stock.");
            return $this->redirect($this->referer());
          }
        } else {
          $this->Flash->error("Maximum quantity for " . $orderItem['brochure_name'] . " was exceeded");
          return $this->redirect($this->referer());
        }
      } else {
        $this->Flash->error(__("You must input a quantity of at least 1 to add to your cart"));
      }

      $this->redirect($this->referer());
    }
  }

  public function removeItem($itemId=null) {
    if ($itemId != null) {
      $cart = $this->request->session()->read('ShoppingCart');
      unset($cart['Items'][$itemId]);
      $this->request->session()->write('ShoppingCart', $cart);
      $this->Flash->set(__("Brochure was removed from your cart"));
      $this->redirect($this->referer());
    }
  }

  public function clear() {
    $shoppingCart['Agent'] = $this->Auth->user('id');
    $shoppingCart['Items'] = array();
    $this->request->session()->write('ShoppingCart', $shoppingCart);
    $this->redirect(array('controller' => 'brochures', 'action' => 'index', 'prefix' => 'agent'));
  }

  public function update() {
    if (!empty($this->request->data)) {

      $order = $this->request->data;
      $cart = $this->request->session()->read('ShoppingCart');
      $cart['Items'] = array();
      $brochureIds = "";
      foreach ($order['Cart']['Items'] as $item) {
        if (!empty($brochureIds)) {
          $brochureIds .= ',' . $item['brochure_id'];
        } else {
          $brochureIds .= $item['brochure_id'];
        }
      }
      $this->loadModel('Brochures');
      $brochures = $this->Brochures->find('all', array('conditions' => array("Brochures.id IN ($brochureIds)")));  //load brochure data for the order items

      foreach ($order['Cart']['Items'] as $key => $item) {

        foreach ($brochures as $brochure) {

          if ($brochure['id'] == $item['brochure_id']) {

            if ($item['qty_ordered'] <= $item['max_order']) {   //check max order
              if ($item['qty_ordered'] <= $brochure['inv_balance']) {  //check stock
                array_push($cart['Items'], $item);
              } else {
                $this->Flash->error('Cart could not be updated. Not enough units in stock for ' . $brochure['name']);
                return $this->redirect($this->referer());
              }
            } else {
              $this->Flash->error('Cart could not be updated. Max order quantity exceeded for ' . $brochure['name']);
              return $this->redirect($this->referer());
            }
          }
        }
      }

      $this->request->session()->write('ShoppingCart', $cart); //update shopping cart in session

      $this->Flash->set("Cart updated");
      $this->redirect($this->referer());
    } else {
      $this->Flash->error("Cart is empty");
      $this->redirect($this->referer());
    }
  }

  public function processOrder() {
    if (!empty($this->request->data)) {
      $orderItems = $this->request->session()->read('ShoppingCart.Items');
      $this->loadModel('Orders');

      $order = $this->request->data;

      $this->request->data['owner_id'] = $this->Auth->user('id');
      $this->request->data['owner_type'] = "0";
      $this->request->data['status'] = "0";

      $processedOrder = $this->Orders->newEntity($this->request->data);

      $order['OrderItems'] = $orderItems;

      $brochureIds = "";
      foreach ($order['OrderItems'] as $item) {
        if (!empty($brochureIds)) {
          $brochureIds .= ',' . $item['brochure_id'];
       
        } else {
          $brochureIds .= $item['brochure_id'];
         
        }
      }
      $this->loadModel('OrderItems');
      $this->loadModel('Brochures');
      $brochures = $this->Brochures->find('all', array('conditions' => array("Brochures.id IN ($brochureIds)")));  //load brochure data for the order items
      $orderItems = [];

      foreach ($order['OrderItems'] as $item) {
     
        foreach ($brochures as $brochure) {

          if ($brochure['id'] == $item['brochure_id']) {

      
              if ($item['qty_ordered'] <= $brochure['inv_balance']) {  //check stock

                $orderItem = $this->OrderItems->newEntity($item);
                //create order item
                $orderItem->brochure_name = $brochure['name'];
                $orderItem->ontario = $brochure['ontario'];

               if ($brochure['poa'] == '1') {  //set item initial status
                  $orderItem->status = '1';
                } else if ($brochure['poa'] == '2') {
                  $orderItem->status = '5';
                }
                else  {
                  $orderItem->status = '0';
                }

                // to avoid DB changes hard coding default for now
                $orderItem->shipped_via = '';
                $orderItem->tracking_number = '';

                array_push($orderItems, $orderItem);
              
              } else {
                $this->Flash->error('Order could not be placed. Not enough units in stock.');
                $this->redirect($this->referer());
              }
            
          }
        }
      }
      
      $processedOrder->order_items = $orderItems;
      if ($last = $this->Orders->save($processedOrder)) {
        $this->Flash->set('Order has been placed');


    //    $this->_updateInventory($ord);
        $ord = $this ->Orders->findById($last->id)->contain(['OrderItems'])->first();

        $this->_checkForPoaBrochures($ord);
        $this->_checkForSupplierSelfFulfillment($ord);
	      $this->_checkForSupplierNotification($ord);
	                
        $this->_notifyAgent($ord);
        //if ($processedOrder['Order']['priority'] == '1') {
        //  $this->_rushOrderNotif($orderId);
        //}
        $shoppingCart['Items'] = array();
        $this->request->session()->write('ShoppingCart', $shoppingCart);
        $this->redirect(array('controller' => 'Brochures', 'action' => 'index', 'prefix' => 'agent'));
      } else {
        $this->redirect($this->referer());
      }
    }
  }

  public function shipping() {
    if (!empty($this->request->data)) {
      $cart = $this->request->data['Cart'];
      $this->request->session()->write('ShoppingCart.Items', $cart['Items']);
    } else {
      $this->Flash->error("Cart is empty");
      $this->redirect($this->referer());
    }

    $agent = $this->Auth->User();


    $this->request->data['shipping_company'] = $agent['company'];
    $this->request->data['shipping_firstname'] = $agent['firstname'];
    $this->request->data['shipping_lastname'] = $agent['lastname'];
    $this->request->data['shipping_address1'] = $agent['address'];
    $this->request->data['shipping_address2'] = $agent['address2'];
    $this->request->data['shipping_city'] = $agent['city'];
    $this->request->data['shipping_province'] = $agent['province'];
    $this->request->data['shipping_postalcode'] = $agent['postalcode'];
    $this->request->data['shipping_email'] = $agent['email'];
    $this->request->data['shipping_phonenumber'] = $agent['phonenumber'];
    $shippingProvinces = array('AB', 'BC', 'MB', 'NB', 'NL', 'NT', 'NS', 'NU', 'ON', 'PE', 'QC', 'SK', 'YT','-----', 'AL', 'AK', 'AZ', 'AR', 'CA', 'CO', 'CT', 'DE', 'DC', 'FL', 'GA', 'HI', 'ID', 'IL', 'IN', 'IA', 'KS', 'KY', 'LA', 'ME', 'MD', 'MA', 'MI', 'MN', 'MS', 'MO', 'MT', 'NE', 'NV', 'NH', 'NJ', 'NM', 'NY', 'NC', 'ND', 'OH', 'OK', 'OR', 'PA', 'RI', 'SC', 'SD', 'TN', 'TX', 'UT', 'VT', 'VA', 'WA', 'WV', 'WI', 'WY');

    $shippingProvinces = array_combine($shippingProvinces,$shippingProvinces);

    $this->set(compact('shippingProvinces'));

    $orderForm = new Form();
    $this->set(compact('orderForm'));
    $this->set('title_for_layout', __('Shipping'));
    
  }

  
}

?>