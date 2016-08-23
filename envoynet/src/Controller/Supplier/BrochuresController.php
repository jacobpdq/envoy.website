<?php

namespace App\Controller\Supplier;

use App\Controller\AppController;
use Cake\Core\Configure;
use Cake\Routing\Router;


class BrochuresController extends \App\Controller\BrochuresController {

  public $helpers = array('ImageResize');



  public function index() {

    $this->set('title_for_layout', __('Brochures'));
	
  	$mastersupplier = $this->Auth->user('master_supplier');
  	
      if ($mastersupplier == 0) {
      $supplierId = $this->Auth->user('id'); 
  	}
  	else {
  	$supplierId = $this->Auth->user('master_supplier');
  	}

    if ($supplierId != null) {
      $this->paginate = array(
          'contain' => [
            'Suppliers',
            'Images'
          ],
          'conditions' => array(
            'OR' => array(
              'Brochures.supplier_id' => $supplierId, 
              'Suppliers.master_supplier' => $supplierId
            ), 
            'Brochures.status' => '1'
          ),
          'limit' => 5,
		      'order' => ['Brochures.name']
      );
      $this->set('brochures', $this->paginate());
    }
  }
  
  public function inventorysummary() {
  
    ini_set('memory_limit', '256M');

    $this->set('title_for_layout', __('Inventory Summary'));

    $mastersupplier = $this->Auth->user('master_supplier');

    if ($mastersupplier == 0) {
      $supplierId = $this->Auth->user('id'); 
    }
    else {
      $supplierId = $this->Auth->user('master_supplier');
    }

    if ($supplierId != null) {
      if (isset($this->request->query['filter_start_date']) && isset($this->request->query['filter_end_date']))  {

        $endDateRoundup = strtotime ( '+1 day' , strtotime ($this->request->query['filter_end_date'] ) ) ;
        $endDateRoundup = date ( 'Y-m-j' , $endDateRoundup );

        $this->paginate = array(
        'conditions' => array('OR' => array('Brochures.supplier_id' => $supplierId, 'Suppliers.master_supplier' => $supplierId), 'Brochures.status' => '1'),
        'limit' => 100,
        'order' => ['Brochures.name'],
        'fields' => array('id','supplier_id','sku','name','is_french','qty_skid','qty_box','weight','inv_balance','inv_notif_threshold','created','status','category'),
        'contain' => array('Receipts','Suppliers','OrderItems'=> array('Orders'=> array('fields' => array('id','created'), 'conditions' => array('created >=' => $this->request->query['filter_start_date'], 'created <=' => $endDateRoundup )),'fields' => array('id','order_id','qty_shipped','brochure_id')))


        );



        $this->request->data['filter_start_date'] = $this->request->query['filter_start_date'];
        $title[] = __('StartDate') . ': ' . $this->request->query['filter_start_date'];

        $this->request->data['filter_end_date'] = $this->request->query['filter_end_date'];
        $title[] = __('EndDate') . ': ' . $this->request->query['filter_end_date'];

      } else {
        $this->paginate = [
          'conditions' => array(
            'OR' => array(
              'Brochures.supplier_id' => $supplierId, 
              'Suppliers.master_supplier' => $supplierId
            ), 
            'Brochures.status' => '1'
          ),
          'limit' => 100,
          'order' => ['Brochures.name'],
          'fields' => array(
            'id',
            'supplier_id',
            'sku',
            'name',
            'is_french',
            'qty_skid',
            'qty_box',
            'weight',
            'inv_balance',
            'inv_notif_threshold',
            'created',
            'status',
            'category'
          ),
          'contain' => array(
            'Receipts',
            'Suppliers',
            'OrderItems'=> array(
              'Orders'=> array(
                'fields' => array(
                  'id','created'
                )
              ),
              'fields' => array(
                'id',
                'order_id',
                'qty_shipped',
                'brochure_id'
              )
            )
          )
        ];
    }

    }
    $this->set('brochures', $this->paginate());
  }
  
  public function search() {
    // the page we will redirect to
    $url['action'] = 'inventorysummary';

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


  public function edit($id = null) {

 
    $this->set('title_for_layout', __('Edit Brochure'));

    if (!$id && empty($this->request->data)) {
      $this->Flash->set(__('Invalid brochure'));
      $this->redirect(array('action' => 'index'));
    }

    if (!empty($this->request->data)) {
      if ($this->Brochures->save()) {
        $this->Flash->set(__('The brochure has been saved'));
        $this->redirect(array('action' => 'index'));
      } else {
        $this->Flash->set(__('The brochure could not be saved. Please, try again.'));
      }
    }
    
    if (empty($this->request->data)) {
      $this->request->data = $this->Brochures->findById($id)->contain(['Images'])->first()->toArray();
    }
  }

}

?>