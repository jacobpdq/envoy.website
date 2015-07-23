<?php

namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Network\Http\Client;
use Cake\Routing\Router;
use Cake\Core\Configure;

class SuppliersController extends \App\Controller\SuppliersController {

  public $name = 'Suppliers';

  public $helpers = array('Form');

  public function index() {
  
    $this->set('suppliers', $this->paginate());
  }

  public function view($id = null) {
    if (!$id) {
      $this->Flash->error(__('Invalid supplier', true));
      $this->redirect(array('action' => 'index'));
    }

    //   if (empty( $this->request->data)) {
    //       $this->request->data =array (
    //    ('Supplier') => array (
    //        ('activebroch') => 2,
    //        ('id') => $id
    //    )
    //);
    //    }

    if(!empty( $this->request->data)) {
      $this->request->session()->write('filterdata', $this->request->data);
    } else {
       $this->request->data = $this->request->session()->read('filterdata');
       $this->request->data['id'] = $id;
    }


    if (empty($this->request->data['activebroch'])) {
      $this->request->data['activebroch'] = 0;
    }
    if (empty($this->request->data['id'])) {
      $this->request->data['id'] = $id;
    }


    if ($this->request->data['activebroch'] == 1) {
      $this->paginate = array(
        'conditions' => array('Brochures.supplier_id' => $id, 'status' => 1),
        'order' => ['Brochures.name'],
        'recursive' => -1,
        'limit' => 500
      );
    }
    elseif ($this->request->data['activebroch'] == 0) {
      $this->paginate = array(
        'conditions' => array('Brochures.supplier_id' => $id),
        'order' => ['Brochures.name'],
        'recursive' => -1,
        'limit' => 500
      );
    }
    else {
      $this->paginate = array(
        'conditions' => array('Brochures.supplier_id' => $id, 'status' => 0),
        'order' => ['Brochures.name'],
        'recursive' => -1,
        'limit' => 500
      );
    }


    $brochures = $this->paginate($this->Suppliers->Brochures->find('all'));

    $this->set(compact('brochures'));

    $this->set('supplier', $this->Suppliers->get($id)->toArray());
       
     
  }
  

  public function add() {
    if (!empty( $this->request->data)) {
    
      
      $supplier = $this->Suppliers->newEntity($this->request->data());


      if ($last = $this->Suppliers->save($supplier)) {
        $this->Flash->set(__('The supplier has been saved', true));
        $this->redirect(array('action' => 'index'));
      } else {
        $this->Flash->error(__('The supplier could not be saved. Please, try again.', true));
      }
    }
  }

  public function edit($id = null) {
    if (!$id && empty( $this->request->data)) {
      $this->Flash->error(__('Invalid supplier', true));
      $this->redirect(array('action' => 'index'));
    }

    if (!empty( $this->request->data)) {

      $http = new Client();

      $oldSupplier = $this->Suppliers->get($this->request->data['id']);


      if ($this->request->data['password'] == $oldSupplier['password']) {
        $this->request->data['password'] = $oldSupplier['decrypted_password'];
      } else {
        $passwordChanged = true;
      }



      $supplier = $this->Suppliers->newEntity($this->request->data,['accessibleFields'=>['id'=>true]]);

      if ($this->Suppliers->save($supplier)) {
        $this->Flash->set(__('The supplier has been saved', true));
        $this->redirect(array('action' => 'index'));       
      } else {
        $this->Flash->error(__('The supplier could not be saved. Please, try again.', true));
      }
    }

    if (empty( $this->request->data)) {
      $this->request->data = $this->Suppliers->get($id)->toArray();
    }
  }

  public function delete($id = null) {
    if (!$id) {
      $this->Flash->error(__('Invalid id for supplier', true));
      $this->redirect(array('action' => 'index'));
    }
    $supplier = $this->Suppliers->get($id);
    if ($this->Suppliers->delete($supplier)) {
      $this->Flash->set(__('Supplier deleted', true));
      $this->redirect(array('action' => 'index'));
    }

    $this->Flash->error(__('Supplier was not deleted', true));
    $this->redirect(array('action' => 'index'));
  }

}

?>