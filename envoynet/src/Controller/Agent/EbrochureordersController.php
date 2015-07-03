<?php

namespace App\Controller\Agent;

use App\Controller\AppController;

class EbrochureordersController extends AppController {

  
  
  
  public function index($id = null) {
 
    $this->set('title_for_layout', __('View E-brochure'));
   
    $agtid = $this->Auth->user('id');
    $this->request->data['agent_id'] = $agtid; 
	}

 
  public function placeOrder() {
  
    if (!empty($this->request->data)) {
        $this->LoadModel('Ebrochureorders');
        $eBrochureOrder = $this->Ebrochureorders->newEntity($this->request->data);

        if ($this->Ebrochureorders->save($eBrochureOrder)) {

            $supplierid=$this->request->data['supplierid'];
            $webredirect=$this->request->data['webaddress'];
            $this->redirect($webredirect);    
        } 
    }
  }
  
 

}

?>