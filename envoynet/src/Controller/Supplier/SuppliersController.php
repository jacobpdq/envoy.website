<?php

namespace App\Controller\Supplier;

use App\Controller\AppController;
use Cake\Form\Form;


class SuppliersController extends \App\Controller\SuppliersController {

  public function profile() {

    $this->set('title_for_layout', __('My Profile'));

    $id = $this->Auth->user('id');
    if (!$id && empty($this->request->data)) {
      $this->Flash->set(__('Invalid agent'));
      $this->redirect(array('action' => 'index'));
    }
    if (!empty($this->request->data)) {
      
      $phonenumber = $this->request->data['digits1'] . "-" . $this->request->data['digits2'] . "-" . $this->request->data['digits3'];
      $this->request->data['phonenumber'] = $phonenumber;
      $supplier = $this->Suppliers->get($id);

      $supplier->company = $this->request->data['company'];
      $supplier->contact_firstname = $this->request->data['contact_firstname'];
      $supplier->contact_lastname = $this->request->data['contact_lastname'];
      
      $supplier->address1 = $this->request->data['address1'];
      $supplier->address2 = $this->request->data['address2'];
      $supplier->province = $this->request->data['province'];
      $supplier->postal = $this->request->data['postal'];
      $supplier->country = $this->request->data['country'];

      $supplier->email = $this->request->data['email'];
      $supplier->phonenumber = $this->request->data['phonenumber'];


      if ($this->Suppliers->save($supplier)) {
        $this->Flash->set(__('Profile data has been saved'));
        $this->redirect($this->referer());
      } else {
        $this->Flash->set(__('Profile data could not be saved. Please, try again.'));
      }
    }
    if (empty($this->request->data)) {
      $this->request->data = $this->Suppliers->get($id)->toArray();
      $ph = explode('-', $this->request->data['phonenumber']);

      if (count($ph) > 1) {
        $this->request->data['digits1'] = $ph[0];
        $this->request->data['digits2'] = $ph[1];
        $this->request->data['digits3'] = $ph[2];
      }
      
    }

    $provinces = array('AB', 'BC', 'MB ', 'NB ', 'NL', 'NT', 'NS', 'NU', 'ON', 'PE', 'QC', 'SK', 'YT');
    $provinces = array_combine($provinces,$provinces);
    $this->set(compact('provinces'));
  }

}

?>