<?php

namespace App\Controller\Admin;

use App\Controller\AppController;

class SettingsController extends AppController {

  public $name = 'Settings';

  public function index() {

    $this->set('settings', $this->paginate());
  }

  public function view($id = null) {
    if (!$id) {
      $this->Flash->set(__('Invalid setting'));
      $this->redirect(array('action' => 'index'));
    }
    $this->set('setting', $this->Setting->get($id));
  }

  public function add() {
    if (!empty($this->request->data)) {
      $this->Setting->create();
      if ($this->Setting->save($this->request->data)) {
        $this->Flash->set(__('The setting has been saved'));
        $this->redirect(array('action' => 'index'));
      } else {
        $this->Flash->set(__('The setting could not be saved. Please, try again.'));
      }
    }
  }

  public function edit($id = null) {
    if (!$id && empty($this->request->data)) {
      $this->Flash->set(__('Invalid setting'));
      $this->redirect(array('action' => 'index'));
    }
    if (!empty($this->request->data)) {
      if ($this->Setting->save($this->request->data)) {
        $this->Flash->set(__('The setting has been saved'));
        $this->redirect(array('action' => 'index'));
      } else {
        $this->Flash->set(__('The setting could not be saved. Please, try again.'));
      }
    }
    if (empty($this->request->data)) {
      $this->request->data = $this->Setting->get($id);
    }

    $this->loadModel('Supplier');
    $suppliers = $this->Suppliers->find('list', array('fields' => array('Supplier.id', 'Supplier.company')));
    $suppliers[''] = 'none';
    $this->set(compact('suppliers'));
  }

  public function delete($id = null) {
    if (!$id) {
      $this->Flash->set(__('Invalid id for setting'));
      $this->redirect(array('action' => 'index'));
    }
    if ($this->Setting->delete($id)) {
      $this->Flash->set(__('Setting deleted'));
      $this->redirect(array('action' => 'index'));
    }
    $this->Flash->set(__('Setting was not deleted'));
    $this->redirect(array('action' => 'index'));
  }

}

?>