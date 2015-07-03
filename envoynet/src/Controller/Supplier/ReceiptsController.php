<?php

namespace App\Controller\Supplier;

use App\Controller\AppController;

class ReceiptsController extends \App\Controller\ReceiptsController {


  
    
  public function index() {

    $this->set('title_for_layout', __('Receipts'));
  	
  	$mastersupplier = $this->Auth->user('master_supplier');
  	
    if ($mastersupplier == 0) {
      $supplierId = $this->Auth->user('id'); 
  	} else {
  	  $supplierId = $this->Auth->user('master_supplier');
  	}

    if ($supplierId != null) {
      $this->paginate = array(
        'contain' => [
          'Brochures'
        ],
        'conditions' => array(
          'Brochures.supplier_id' => $supplierId, 
          'Brochures.status' => '1'
        ),
        'limit' => 50,
  	    'order' => ['Receipts.date']
       );

      $this->set(['receipts'=>$this->paginate()]);
    }
  }
}

?>