<?php

namespace App\Controller\Agent;

use App\Controller\AppController;
use Cake\Core\Configure;

class OrdersController extends \App\Controller\OrdersController {

  public $name = 'Orders';

  public $paginate = [
    'order' => [
      'Orders.created' => 'desc'
    ],
    'limit' => 50
  ];

  public function initialize() {
    parent::initialize();
    $this->loadComponent('Paginator');

  }

  function index() {

    $this->set('title_for_layout', __('Orders'));

    $agentId = $this->Auth->user('id');
    if (!empty($agentId)) {

      $this->paginate ['conditions'] = [
        'Orders.owner_id' => $agentId, 
        'Orders.owner_type' => 'agent'
      ];
    }


    $this->set('orders', $this->paginate());
  }

  public function view($id = null) {
    
    if (!$id) {
      $this->Flash->set(__('Invalid order'));
      $this->redirect(array('action' => 'index'));
    }

    $this->set('title_for_layout', __('Order') . ' #' . $id);
    $order = $this->Orders->findById($id)->contain(['OrderItems.Brochures'])->first();

    $this->set(compact('order'));
  }  

}

?>