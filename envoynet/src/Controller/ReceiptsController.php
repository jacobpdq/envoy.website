<?php

namespace App\Controller;

use App\Controller\AppController;

class ReceiptsController extends AppController {

  //public $name = 'Receipts';

  
  public $paginate = [];

    public function initialize() {

    $this->set('title_for_layout', __('Receipts'));

  	
  	}

   public function index($id = null) {

   	 $this->set('title_for_layout', __('Receipts'));

  }

}

?>