<?php

namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Core\Configure;
use Cake\Event\Event;
use Cake\Utility\Hash;
use Cake\Network\Http\Client;
use Cake\Routing\Router;

class AgentsController extends \App\Controller\AgentsController {


  public function beforeFilter(Event $event) {
    parent::beforeFilter($event);
  }

  
  public function index() {
    $this->Agents->recursive = -1;
    $this->paginate = array('limit' => 100,'order' => ['Agents.created' => 'DESC']);
    $this->set('agents', $this->paginate());
  }

  public function view($id = null) {
    if (!$id) {
      $this->Flash->set(__('Invalid agent'));
      $this->redirect(array('action' => 'index'));
    }
    $this->set('agent', $this->Agents->get($id));
  }

  public function add() {
    
    if (!empty($this->request->data)) {

      $newAgent = $this->Agents->newEntity($this->request->data);

      if ($this->Agents->save($newAgent)) {

        $this->Flash->set(__('The agent has been saved'));
        $this->redirect(array('action' => 'index'));
      } else {
        $this->Flash->set(__('The agent could not be saved. Please, try again.'));
      }
    }

    $provinces = array('AB', 'BC', 'MB', 'NB', 'NL', 'NT', 'NS', 'NU', 'ON', 'PE', 'QC', 'SK', 'YT','------', 'AL', 'AK', 'AZ', 'AR', 'CA', 'CO', 'CT', 'DE', 'DC', 'FL', 'GA', 'HI', 'ID', 'IL', 'IN', 'IA', 'KS', 'KY', 'LA', 'ME', 'MD', 'MA', 'MI', 'MN', 'MS', 'MO', 'MT', 'NE', 'NV', 'NH', 'NJ', 'NM', 'NY', 'NC', 'ND', 'OH', 'OK', 'OR', 'PA', 'RI', 'SC', 'SD', 'TN', 'TX', 'UT', 'VT', 'VA', 'WA', 'WV', 'WI', 'WY');
    $provinces = array_combine($provinces,$provinces);
    $this->set(compact('provinces'));
  }

  public function edit($id = null) {
    if (!$id && empty($this->request->data)) {
      $this->Flash->error(__('Invalid agent'));
      $this->redirect(array('action' => 'index'));
    }
    if (!empty($this->request->data)) {
      $http = new Client();
      $oldAgent = $this->Agents->get($id);

      if($oldAgent['status'] != '1' && $this->request->data['status'] == '1') {
        $agentActivated = true;
      } else {
        $agentActivated = false;
      }

      $ssoUser = false;
      $passwordChanged = false;

      $broker_url = Router::url('/', true);

      if (substr($broker_url,0,7) == 'http://') {
          $broker_url = substr($broker_url,7);
      } else if (substr($broker_url,0,8) == 'https://') {
          $broker_url = substr($broker_url,8);
      }

      if (substr($broker_url,-1) == '/') {
          $broker_url = substr($broker_url,0,strlen($broker_url)-1);
      }

      if (substr($broker_url,0,3) != 'www') {
        $broker_url = 'www.' . $broker_url;
      }

      //check if this is an sso user
      $response = $http->post(
          'http://' . SSO_PARENT . '/wp-admin/admin-ajax.php',
          [
              'action'=>'user_profile',
              'broker_url' => $broker_url,
              'broker_key' => Configure::read('hippo.sso_broker_key'),
              'email' => $oldAgent['email'],
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


      if (isset($this->request->data['password'])) {
        if ($this->request->data['password'] == $oldAgent['password']) {
          $this->request->data['password'] = $oldAgent['decrypted_password'];
        } else {
          $passwordChanged = true;
        }
      }

        $errorMessage = '';
      //check for sync with sso parent
      if ($ssoUser) {
        if ($this->request->data['email'] != $ssoUser['email']){
          $errorMessage .= (($errorMessage != '') ? ',':'') . 'email';
					$this->request->data['email'] = $ssoUser['email'];
        }
				if (isset($this->request->data['username']) 
            && $this->request->data['username'] != $ssoUser['username']){
          $errorMessage .= (($errorMessage != '') ? ',':'') . 'username'; 
					$this->request->data['username'] = $ssoUser['username'];
        }
        if ($this->request->data['firstname'] != $ssoUser['first_name']){
          $errorMessage .= (($errorMessage != '') ? ',':'') . 'username'; 
					$this->request->data['firstname'] = $ssoUser['first_name'];
        }
        if ($this->request->data['lastname'] != $ssoUser['last_name']){
          $errorMessage .= (($errorMessage != '') ? ',':'') . 'lastname'; 
					$this->request->data['lastname'] = $ssoUser['last_name'];
        }
      }

      $agent = $this->Agents->newEntity($this->request->data,['accessibleFields'=>['id'=>true]]);
      if ($this->Agents->save($agent)) {
        if ($passwordChanged) {
          if ($ssoUser) {
            $response = $http->post(
                'http://' . SSO_PARENT . '/wp-admin/admin-ajax.php',
                [
                    'action'=>'broker_pwd',
                    'session'=> MD5($this->request->data['password']),
                    'broker_url' => $broker_url,
                    'broker_key' => Configure::read('hippo.sso_broker_key'),
                    'email' => $this->request->data['email'],
                ]
            );

            if ($response->statusCode() == 200) {
              $this->Flash->set(__('The agent has been saved', true));
              $this->redirect(array('action' => 'index'));
            } else {
              $this->Flash->set(__('The agent has been saved locally but the SSO password was not accepted.', true));
              $this->redirect(array('action' => 'index'));
            }
          }
        } else {
            $this->Flash->set(__('The agent has been saved', true));
            $this->redirect(array('action' => 'index'));
        }

        if ($agentActivated == true) {
          $from = Configure::read('hippo.warehouse_email');
          $subject = "Account activated";
          $message = Configure::read('hippo.msg_agent_activated');

          if (!empty($this->request->data['email'])) {
            $this->_sendEmail($this->request->data['email'], $from, $subject, $message);
          }
        }

        if ($errorMessage != '') {
          $this->Flash->error($this->request->data['company'] . 
            ' is an agent with SSO login. The following fields have been changed to maintain synchronization: ' .
            $errorMessage);
        }
        $this->redirect(array('action' => 'index'));
      } else {
        $this->Flash->set(__('The agent could not be saved. Please, try again.'));
      }
    } else {
      $this->request->data = $this->Agents->get($id)->toArray();
    }


    $provinces = array('AB', 'BC', 'MB', 'NB', 'NL', 'NT', 'NS', 'NU', 'ON', 'PE', 'QC', 'SK', 'YT','------', 'AL', 'AK', 'AZ', 'AR', 'CA', 'CO', 'CT', 'DE', 'DC', 'FL', 'GA', 'HI', 'ID', 'IL', 'IN', 'IA', 'KS', 'KY', 'LA', 'ME', 'MD', 'MA', 'MI', 'MN', 'MS', 'MO', 'MT', 'NE', 'NV', 'NH', 'NJ', 'NM', 'NY', 'NC', 'ND', 'OH', 'OK', 'OR', 'PA', 'RI', 'SC', 'SD', 'TN', 'TX', 'UT', 'VT', 'VA', 'WA', 'WV', 'WI', 'WY');
    $provinces = array_combine($provinces,$provinces);
    $this->set(compact('provinces'));
  }

  public function delete($id = null) {
    if (!$id) {
      $this->Flash->set(__('Invalid id for agent'));
      $this->redirect(array('action' => 'index'));
    }
    $agent = $this->Agents->get($id);
    if ($this->Agents->delete($agent)) {
      $this->Flash->set(__('Agent deleted'));
      $this->redirect(array('action' => 'index'));
    }
    $this->Flash->set(__('Agent was not deleted'));
    $this->redirect(array('action' => 'index'));
  }

}

?>