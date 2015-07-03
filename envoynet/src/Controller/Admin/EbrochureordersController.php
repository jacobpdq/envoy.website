<?php

namespace App\Controller;

use App\Controller\AppController;

class EbrochureordersController extends AppController {

  public $name = 'Ebrochureorders';
  
  

 

  function admin_index() {
    $this->Ebrochureorder->recursive = 0;
    $this->paginate = array(
        'ebrochureorder' => 'Ebrochureorder.created DESC',
        'limit' => 50
    );
    $this->set('ebrochureorders', $this->paginate());
  }

 
  function admin_add() {
    if (!empty($this->request->data)) {
      $this->Orders->create();
      if ($this->Orders->save($this->request->data)) {
        $this->Flash->set(__('The order has been saved'));
        $this->redirect(array('action' => 'index'));
      } else {
        $this->Flash->set(__('The order could not be saved. Please, try again.'));
      }
    }
    $agents = $this->Orders->Agents->find('list');

    $this->set(compact('agents'));
  }

  function admin_edit($id = null) {
        $this->Orders->contain('OrderItem.Brochure');
    if (!$id && empty($this->request->data)) {
      $this->Flash->set(__('Invalid order'));
      $this->redirect(array('action' => 'index'));
    }
    if (!empty($this->request->data)) {
      if ($this->Orders->save($this->request->data)) {
        $this->Flash->set(__('The order has been saved'));
        $this->redirect(array('action' => 'index'));
      } else {
        $this->Flash->set(__('The order could not be saved. Please, try again.'));
      }
    }
    if (empty($this->request->data)) {
      $this->request->data = $this->Orders->get($id);
    }
    $agents = $this->Orders->Agents->find('list');
    $this->set(compact('agents'));

  }

  function admin_delete($id = null) {
    if (!$id) {
      $this->Flash->set(__('Invalid id for order'));
      $this->redirect(array('action' => 'index'));
    }
    if ($this->Orders->delete($id)) {
      $this->Flash->set(__('Order deleted'));
      $this->redirect(array('action' => 'index'));
    }
    $this->Flash->set(__('Order was not deleted'));
    $this->redirect(array('action' => 'index'));
  }

}

?>