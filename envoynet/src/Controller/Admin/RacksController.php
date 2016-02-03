<?php

namespace App\Controller\Admin;

use App\Controller\AppController;

class RacksController extends \App\Controller\RacksController {

  public $name = 'Racks';
  
  
  
  public function index() {
    $this->paginate = array(
        'contain'=>['Brochures'],
        'limit' => 50,
        'sortWhitelist'=>['Brochures.name','Brochures.sku']
    );

    $this->set('racks', $this->paginate($this->Racks->find('all')));
  }

 
  public function add() {
    $error = false;
    if (!empty($this->request->data)) {
      $rack = $this->Racks->newEntity($this->request->data);
   
      if ($this->Racks->save($rack) && $error == false) {
        $this->Flash->set(__('The rack has been saved'));
        $this->redirect(array('action' => 'index'));
      } else {
        $this->Flash->set(__('The rack could not be saved. Please, try again.'));
      }
    }
	  $brochures = $this->Racks->Brochures->find('list', array('order' => ['Brochures.name'], 'conditions' => array('Brochures.status' => 1)));
    $this->set(compact('brochures'));
  }

  public function edit($id = null) {

    if (!$id && empty($this->request->data)) {
      $this->Flash->set(__('Invalid order'));
      $this->redirect(array('action' => 'index'));
    }

    if (!empty($this->request->data)) {

      $rack = $this->Racks->newEntity($this->request->data);
      
      
      $rack->isNew(false);
      $rack->id = $id;

      if ($this->Racks->save($rack)) {
        $this->Flash->set(__('The rack has been saved'));
        $this->redirect(array('action' => 'index'));
      } else {
        $this->Flash->set(__('The rack could not be saved. Please, try again.'));
      }
    } else {
      $this->request->data = $this->Racks->findById($id)->first()->toArray();
    }

	  $brochures = $this->Racks->Brochures->find('list', array('order' => 'Brochures.name', 'conditions' => array('Brochures.status' => 1)));
    $this->set(compact('brochures'));
  }

  public function delete($id = null) {
    if (!$id) {
      $this->Flash->set(__('Invalid id for rack'));
      $this->redirect(array('action' => 'index'));
    }
    $rack = $this->Racks->get($id);
    if ($this->Racks->delete($rack)) {
      $this->Flash->set(__('Rack deleted'));
      $this->redirect(array('action' => 'index'));
    } else {
      $this->Flash->set(__('Rack was not deleted'));
      $this->redirect(array('action' => 'index'));
    }
  }

}

?>