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

      $ssoUser = false;
      $passwordChanged = false;

      $broker_url = trim(str_replace(array('http://','https://'),'',Router::url('/', true)),'/');

      //check if this is an sso user
      $response = $http->post(
          'http://' . SSO_PARENT . '/wp-admin/admin-ajax.php',
          [
              'action'=>'user_profile',
              'broker_url' => $broker_url,
              'broker_key' => Configure::read('hippo.sso_broker_key'),
              'email' => $oldSupplier['email'],
          ]
      );

      
      

      if ($response->statusCode() == 200 && $response->body() != '') {
        $ssoUser = json_decode($response->body());
          $ssoUser = get_object_vars ($ssoUser);

      } else {
        //check if this is a correction to email
        $response = $http->post(
            'http://' . SSO_PARENT . '/wp-admin/admin-ajax.php',
            [
                'action'=>'user_profile',
                'broker_url' => $broker_url,
                'broker_key' => Configure::read('hippo.sso_broker_key'),
                'email' => $this->request->data['email'],
            ]
        );

        if ($response->statusCode() == 200 && $response->body() != '') {
          $ssoUser = json_decode($response->body());
          $ssoUser = get_object_vars ($ssoUser);
        }
      } 


      if ($this->request->data['password'] == $oldSupplier['password']) {
        $this->request->data['password'] = $oldSupplier['decrypted_password'];
      } else {
        $passwordChanged = true;
      }

      if ($ssoUser) {
        $errorMessage = '';
        if ($this->request->data['email'] != $ssoUser['email']){
          $errorMessage .= (($errorMessage != '') ? ',':'') . 'email';
          $this->request->data['email'] = $ssoUser['email'];
        }
        if ($this->request->data['username'] != $ssoUser['username']){
          $errorMessage .= (($errorMessage != '') ? ',':'') . 'username';  
          $this->request->data['username'] = $ssoUser['username'];
        }
        if ($this->request->data['contact_firstname'] != $ssoUser['first_name']){
          $errorMessage .= (($errorMessage != '') ? ',':'') . 'username';  
          $this->request->data['contact_firstname'] = $ssoUser['first_name'];
        }
        if ($this->request->data['contact_lastname'] != $ssoUser['last_name']){
          $errorMessage .= (($errorMessage != '') ? ',':'') . 'lastname';  
          $this->request->data['contact_lastname'] = $ssoUser['last_name'];
        }
      }


      $supplier = $this->Suppliers->newEntity($this->request->data,['accessibleFields'=>['id'=>true]]);

      if ($this->Suppliers->save($supplier)) {

        if ($passwordChanged) {


          if ($ssoUser) {
            $response = $http->post(
                'http://' . SSO_PARENT . '/wp-admin/admin-ajax.php',
                [
                    'action'=>'user_pwd',
                    'session'=> MD5($this->request->data['password']),
                    'broker_url' => $broker_url,
                    'broker_key' => Configure::read('hippo.sso_broker_key'),
                    'email' => $this->request->data['email'],
                ]
            );

            if ($response->statusCode() == 200) {
              $this->Flash->set(__('The supplier has been saved', true));
              $this->redirect(array('action' => 'index'));
            } else {
              $this->Flash->set(__('The supplier has been saved locally but the SSO password was not accepted.', true));
              $this->redirect(array('action' => 'index'));
            }


          }
        } else {
            $this->Flash->set(__('The supplier has been saved', true));
            $this->redirect(array('action' => 'index'));

            if ($errorMessage != '') {
              $this->Flash->error($this->request->data['company'] . 
                ' is a supplier with SSO login. The following fields have been changed to maintain synchronization: ' .
                $errorMessage);
            }
        }
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