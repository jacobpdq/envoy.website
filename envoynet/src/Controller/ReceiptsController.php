<?php

namespace App\Controller;

use App\Controller\AppController;

class ReceiptsController extends AppController {

  public $name = 'Receipts';
   $this->set('title_for_layout', __('Receipts'));

  
  public $paginate = [];

}

?>