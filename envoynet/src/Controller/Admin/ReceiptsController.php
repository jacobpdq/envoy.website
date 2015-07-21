<?php

namespace App\Controller\Admin;

use App\Controller\AppController;

class ReceiptsController extends \App\Controller\ReceiptsController {

  public $name = 'Receipts';
  
  
  
  public function index() {
    $this->paginate = array(
        'order' => ['Receipts.date' => 'DESC'],
        'contain'=>['Brochures'],
        'limit' => 50
    );

    $this->set('receipts', $this->paginate($this->Receipts->find('all')));
  }

 
  public function add() {
    if (!empty($this->request->data)) {
      $receipt = $this->Receipts->newEntity($this->request->data);
      if ($receipt->qty == '') {
        $error = true;
        $this->Flash->set(__('Please enter a quantity.'));
      }
      if ($this->Receipts->save($receipt) && $error == false) {
        $this->Flash->set(__('The receipt has been saved'));
        $this->redirect(array('action' => 'index'));
      } else {
        $this->Flash->set(__('The receipt could not be saved. Please, try again.'));
      }
    }
	  $brochures = $this->Receipts->Brochures->find('list', array('order' => ['Brochures.name'], 'conditions' => array('Brochures.status' => 1)));
    $this->set(compact('brochures'));
  }

  public function edit($id = null) {

    if (!$id && empty($this->request->data)) {
      $this->Flash->set(__('Invalid order'));
      $this->redirect(array('action' => 'index'));
    }

    if (!empty($this->request->data)) {

      $receipt = $this->Receipts->newEntity($this->request->data);

      if ($this->Receipt->save($receipt)) {
        $this->Flash->set(__('The receipt has been saved'));
        $this->redirect(array('action' => 'index'));
      } else {
        $this->Flash->set(__('The receipt could not be saved. Please, try again.'));
      }
    } else {
      $this->request->data = $this->Receipts->findById($id)->first()->toArray();
    }

	  $brochures = $this->Receipts->Brochures->find('list', array('order' => 'Brochures.name', 'conditions' => array('Brochures.status' => 1)));
    $this->set(compact('brochures'));
  }

  public function delete($id = null) {
    if (!$id) {
      $this->Flash->set(__('Invalid id for receipt'));
      $this->redirect(array('action' => 'index'));
    }
    $receipt = $this->Receipts->get($id);
    if ($this->Receipts->delete($receipt)) {
      $this->Flash->set(__('Receipt deleted'));
      $this->redirect(array('action' => 'index'));
    } else {
      $this->Flash->set(__('Receipt was not deleted'));
      $this->redirect(array('action' => 'index'));
    }
  }

}

?>