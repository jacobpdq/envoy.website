<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Core\Configure;
use Cake\Routing\Router;
use Cake\Event\Event;




class SsoController extends AppController {

    public function initialize() {
        parent::initialize();
 
    }


    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        $this->Auth->allow(array('async'));
    }

    public function broker_status() {

        //get broker key
        $broker_key = Configure::read('hippo');
        $broker_key =  $broker_key['sso_broker_key'];

        //respond with it
        //need to creat response object!
        if( $broker_key ){
            return $broker_key;
        }else{
            return 'No Key';  
        }

    }

    public function broker_login($login_key=null) {

        //respons with login info to parent during sso process

        $login_data = array('u'=>'','p'=>'','r'=>'');


        if( ! is_null( $login_key ) && !empty($login_key)){
            //read login key from sso_session table+
            $this->loadModel('SsoSessions');
            $ssoSession = $this->SsoSessions->find('all',[
                'conditions'=>[
                    'login_key' => $login_key
                ]
            ])->first();

            $login_data['u'] = $ssoSession->u;
            $login_data['p'] = $ssoSession->p;
            $login_data['r'] = $ssoSession->r;
        }
    
        $login_data['failed'] = Configure::read('hippo.sso_failed_redirect');
        $login_data['login'] = Configure::read('hippo.sso_login_redirect');
        $login_data['bypass'] = Configure::read('hippo.sso_login_bypass');
    
        //create response object and set it to encode with json
        return json_encode( $login_data );
    }

    public function broker_user_update () {
        if( isset( $this->request->data['e'] ) || isset( $this->request->data['u'] ) ){

            $broker_key = Configure::read('hippo.sso_broker_key');

            if( $broker_key ){
                $this->loadModel('Agents');
                $this->loadModel('Suppliers');

                $key = substr($broker_key, 0, 5);
                
                $DECRYPT_existing_email = '';
                $DECRYPT_existing_username = '';
                $DECRYPT_email = '';
                $DECRYPT_username = '';

                if( isset( $this->request->data['ee'] ) ){ 
                    $DECRYPT_existing_email = mcrypt_ecb (MCRYPT_3DES, $key, base64_decode($this->request->data['ee']), MCRYPT_DECRYPT); 
                    $DECRYPT_existing_email = ereg_replace("[[:cntrl:]]", "", $DECRYPT_existing_email);
                } 
                if( isset( $this->request->data['eu'] ) ){ 
                    $DECRYPT_existing_username = mcrypt_ecb (MCRYPT_3DES, $key, base64_decode($this->request->data['eu']), MCRYPT_DECRYPT); 
                    $DECRYPT_existing_username = ereg_replace("[[:cntrl:]]", "", $DECRYPT_existing_username);
                } 
                if( isset( $this->request->data['e'] ) ){ 
                    $DECRYPT_email = mcrypt_ecb (MCRYPT_3DES, $key, base64_decode($this->request->data['e']), MCRYPT_DECRYPT); 
                    $DECRYPT_email = ereg_replace("[[:cntrl:]]", "", $DECRYPT_email);

                }
                if( isset( $this->request->data['u'] ) ){ 
                    $DECRYPT_username = mcrypt_ecb (MCRYPT_3DES, $key, base64_decode($this->request->data['u']), MCRYPT_DECRYPT); 
                    $DECRYPT_username = ereg_replace("[[:cntrl:]]", "", $DECRYPT_username);
                }

                //attempt to find user in suppliers table
                $user = $this->Suppliers->find('all',[
                    'conditions' => [
                        'username' => $DECRYPT_existing_username,
                        'email' => $DECRYPT_existing_email
                    ],
                    ['accessibleFields'=>['username'=>true]]
                ]);
                $type = 'supplier';
                
                if( $user->count() == 0){
                    //attempt to find user in suppliers table
                   $user = $this->Agents->find('all',[
                        'conditions' => [
                            'username' => $DECRYPT_existing_username,
                            'email' => $DECRYPT_existing_email
                        ],
                        ['accessibleFields'=>['username'=>true]]
                    ]); 
                   $type='agent';
                }


                if( $user->count() > 0){
                    $user = $user->first();

                    if (isset($DECRYPT_username)) {
                        $user->username = $DECRYPT_username;
                    }
                    if(isset($DECRYPT_email)){
                        $user->email = $DECRYPT_email;
                    }


                    if ($type == 'supplier') {
                        $this->Suppliers->save($user);
                    } else {
                        $this->Agents->save($user);
                    }
                }
            }
        }

        return '';
    }

    public function async() {

        $this->render(false);  

        switch ($this->request->data['action']) {

            case 'broker_status':
                $this->response->body($this->broker_status());
                break;

            case 'broker_login':

                $this->response->type('json');

                if (isset($this->request->data['login_key'])){
                    $this->response->body($this->broker_login($this->request->data['login_key']));
                } else {
                    $this->response->body($this->broker_login());
                }
                
                break;

            case 'broker_user_update':
                $this->response->httpCodes($this->broker_user_update()); 
                break;

            default:
                $this->response->httpCodes(400); 
                break;
        }
    }
}