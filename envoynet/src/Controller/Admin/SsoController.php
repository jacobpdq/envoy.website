<?php

namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Core\Configure;
use Cake\Event\Event;
use Cake\Utility\Hash;
use Cake\ORM\TableRegistry;

class SsoController extends \App\Controller\SsoController {


  public function beforeFilter(Event $event) {
    parent::beforeFilter($event);
  }


  public function settings() {
    $settings = TableRegistry::get('Settings');

    if (empty($this->request->data)) {
        // get all SSO settings from db
        
        //retrieve settings from db which are loaded every request
        $this->request->data = Configure::read('hippo');

        if (empty($this->request->data)){

   

            $settings->query()->insert(['`key`','`value`'])->values(['`key`'=> "sso_redirect_login",'`value`'=>"/"])->execute();
            $settings->query()->insert(['`key`','`value`'])->values(['`key`'=> "sso_redirect_error",'`value`'=>"/"])->execute();
            $settings->query()->insert(['`key`','`value`'])->values(['`key`'=> "sso_redirect_logout",'`value`'=>"/"])->execute();
            $settings->query()->insert(['`key`','`value`'])->values(['`key`'=> "sso_broker_key",'`value`'=>''])->execute();

            $this->request->data['sso_redirect_login'] = '/';

            //Redirect on logout
            $this->request->data['sso_redirect_logout'] = '/';

            //Redirect on failed login
            $this->request->data['sso_redirect_error'] = '/';

            //Redirect on password reset 

            //broker key
            $this->request->data['sso_broker_key'] = '';
   
        } 

        

            
    } else {

        $setting = $settings->find('all', 
            array('fields'=>array('id','value'))
        )->where(['`key`'=>'sso_redirect_login'])->first();

        $setting->value = $this->request->data['sso_redirect_login'];
        $settings->save($setting);

        $setting = $settings->find('all', 
            array('fields'=>array('id','value'))
        )->where(['`key`'=>'sso_redirect_logout'])->first();
        
        $setting->value = $this->request->data['sso_redirect_logout'];
        $settings->save($setting);

        $setting = $settings->find('all', 
            array('fields'=>array('id','value'))
        )->where(['`key`'=>'sso_redirect_error'])->first();
        
        $setting->value = $this->request->data['sso_redirect_error'];
        $settings->save($setting);

        $setting = $settings->find('all', 
            array('fields'=>array('id','value'))
        )->where(['`key`'=>'sso_broker_key'])->first();
        
        $setting->value = $this->request->data['sso_broker_key'];
        $settings->save($setting);
    }
  }
}
?>