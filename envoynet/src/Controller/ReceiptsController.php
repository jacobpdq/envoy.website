<?php

namespace App\Controller;

use App\Controller\AppController;

class ReceiptsController extends AppController {

  public $name = 'Receipts';

  
  public $paginate = [];

   public function view($id = null) {

   	 $this->set('title_for_layout', __('Receipts'));

  }

}

?>