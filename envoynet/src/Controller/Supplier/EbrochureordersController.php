<?php

namespace App\Controller\Supplier;

use App\Controller\AppController;
use Cake\Routing\Router;

class EbrochureordersController extends \App\Controller\EbrochureordersController {

  public $name = 'Ebrochureorders';
  
 
  
  
  public function index() {

    $this->set('title_for_layout', __('My e-Brochure Orders'));
    $supplierId = $this->Auth->user('id');
    if (!empty($supplierId)) {
      if (isset($this->request->query['filter_start_date']) && isset($this->request->query['filter_end_date']))  {
        $this->paginate = array(
          'contain' => ['Agents'],
          'conditions' => array(
            'Ebrochureorders.supplierid' => $supplierId
          ),
          'order' => ['Ebrochureorders.created' => 'desc'],
          'limit' => 50 
        );
      
        $endDateRoundup = strtotime ( '+1 day' , strtotime ($this->request->query['filter_end_date'] ) ) ;
        $endDateRoundup = date ( 'Y-m-j' , $endDateRoundup );
 
        $this->paginate['conditions']['Ebrochureorders.created >='] = $this->request->query['filter_start_date'];
        //$this->paginate['conditions'][]['Order.created <='] = $this->request->query['filter_end_date'];
  
        $this->paginate['conditions']['Ebrochureorders.created <='] = $endDateRoundup;

        $this->request->data['filter_start_date'] = $this->request->query['filter_start_date'];
        $title[] = __('StartDate') . ': ' . $this->request->query['filter_start_date'];

        $this->request->data['filter_end_date'] = $this->request->query['filter_end_date'];
        $title[] = __('EndDate') . ': ' . $this->request->query['filter_end_date'];
      } else {

        $this->paginate = array(
          'contain' => ['Agents'],
          'conditions' => array('Ebrochureorders.supplierid' => $supplierId),
          'order' => ['Ebrochureorders.created' => 'desc'],
          'limit' => 50 
        );
      }
      }
     $this->set('ebrochureorders', $this->paginate());
   }
   
  public function search() {
    // the page we will redirect to
    $url['action'] = 'index';

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

 
  function supplier_view($id = null) {
    if (!$id) {
      $this->Flash->set(__('Invalid order'));
      $this->redirect(array('action' => 'index'));
    }
    $this->Orders->contain('OrderItem.Brochure');
    $this->set('order', $this->Orders->get($id));
  }
}

?>