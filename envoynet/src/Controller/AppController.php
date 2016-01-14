<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\Error\Debugger;
use Cake\Network;
use Cake\Core\App;
use PHPMailerLite;
use Cake\Core\Configure;



/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */

use Cake\ORM\TableRegistry;
use Cake\Controller\Component\AuthComponent;
use Cake\I18n\I18n;

class AppController extends Controller {

  //var $components = array('Auth', 'Cookie', 'Session', 'DebugKit.Toolbar');
  //var $components = array('Auth','Cookie', 'Session');
  public $components = array(
    'Auth',
    'Cookie', 
    'Session'
    );
  public $helpers = array('Html', 'Form','Url');

  public function appError($error) {
    $this->redirect('/',301,false);
  }
 
  public function initialize()
  {
    parent::initialize();
    $this->loadComponent('Flash');
    $this->loadComponent('Session');

    $language = $this->request->session()->read('language');

    if ($language) {

     switch($language) {
          case "fr":
          I18n::locale('fr_CA');
          break;
          case "en":
          I18n::locale('en_CA');
          break;
          default:
          I18n::locale('en_CA');
          break;   
        }
    } else {
        $this->request->session()->write('language', 'en');
    }



    if (isset($this->request['prefix'])) {
      if ($this->request['prefix'] == 'admin') {
        $this->loadComponent('Auth', [
          'loginAction' => [
            'controller' => 'Main', 
            'action' => 'login', 
            'prefix'=>'admin'
          ],
          'logoutAction' => [
            'controller' => 'Main', 
            'action' => 'logout', 
            'prefix' => 'admin'
          ],
          'logoutRedirect' => [
            'controller' => 'Main', 
            'action' => 'index', 
            'prefix' => false
          ],
          'loginRedirect' => [
            'controller' => 'Main', 
            'action' => 'index', 
            'prefix' => 'admin'
          ],
          'authenticate' => [ 
            'Form' => [
              'userModel' => 'Admins',
              'fields' => [
                'username' => 'username', 
                'password' => 'password'
              ],
              'passwordHasher' => [
                  'className' => 'Fallback',
                  'hashers' => ['Default', 'Legacy']
              ]
            ]
          ],
          'authorize' => 'Controller',
          'unauthorizedRedirect' => $this->request->referer()
        ]);
        $this->layout = 'admin';
        $this->_setAdminUIVariables();
      } else if ($this->request['prefix'] == 'agent') {

        $this->loadComponent('Auth', [
          'autoRedirect' => false,
          'loginAction' => [
            'controller' => 'Main', 
            'action' => 'login', 
            'prefix'=>'agent'
          ],
          'logoutAction' => [
            'controller' => 'Main', 
            'action' => 'logout', 
            'prefix' => 'agent'
          ],
          'logoutRedirect' => [
            'controller' => 'Main', 
            'action' => 'index', 
            'prefix' => false
          ],
          'loginRedirect' => [
            'controller' => 'brochures', 
            'action' => 'index', 
            'prefix' => 'agent'
          ],
          'authenticate' => [ 
            'Form' => [
              'userModel' => 'Agents',
              'fields' => [
                'username' => 'username', 
                'password' => 'password'
              ],
              'scope' => array('Agents.status' => 1),
              'passwordHasher' => [
                  'className' => 'Fallback',
                  'hashers' => ['Default', 'Legacy']
              ]
            ]
          ],
          'authorize' => 'Controller',
          'unauthorizedRedirect' => $this->request->referer()
        ]);

        $this->layout = 'agent';
        $this->_initShoppingCart();
        
      } else if ($this->request['prefix'] == 'supplier') {
        

        $this->loadComponent('Auth', [
          'loginAction' => [
            'controller' => 'Main', 
            'action' => 'login', 
            'prefix'=>'supplier'
          ],
          'logoutAction' => [
            'controller' => 'Main', 
            'action' => 'logout', 
            'prefix' => 'supplier'
          ],
          'logoutRedirect' => [
            'controller' => 'Main', 
            'action' => 'index', 
            'prefix' => false
          ],
          'loginRedirect' => [
            'controller' => 'Main', 
            'action' => 'index', 
            'prefix' => 'supplier'
          ],
          'authenticate' => [ 
            'Form' => [
              'userModel' => 'Suppliers',
              'fields' => [
                'username' => 'username', 
                'password' => 'password'
              ],
              'passwordHasher' => [
                  'className' => 'Fallback',
                  'hashers' => ['Default', 'Legacy']
              ]
            ]
          ],
          'authorize' => 'Controller',
          'unauthorizedRedirect' => $this->request->referer()
        ]);

        $this->layout = 'supplier';
        $this->_initShoppingCart();
        
         $suppliername = $this->Auth->user('company');
         $this->set('suppliername',$suppliername);
         
      }
    }
  }

  public function beforeFilter(Event $event) {
    $settings = TableRegistry::get('Settings');
    $settings->getcfg();

    $this->Auth->allow(array('contact', 'index','login','logout', 'forgot', 'send'));
    $this->Auth->allowedActions = (array('contact', 'index','login','logout', 'forgot', 'send'));

    $this->_setUIVariables();

    //add check for prefix and redirect if type of user in incorrect
/*
    $broker_key = Configure::read('hippo.sso_broker_key');
    $user_email = '';
    $user = $this->Auth->user();
    if($user && $user['role'] == 'agent'){
        $user_email = $user['email'];
        $agentname = $user['company'];

        if ($agentname == '') {
          $agentname = $user['firstname'] . ' ' . $user['lastname'];
        }
        $this->set('agentname',$agentname);
    }

    if( $broker_key && $this->request->params['action'] != 'sso-login' && $this->request->params['action'] != 'sso_profile'){
        $sso_session_check =  '<script type="text/javascript" src="http://' . SSO_PARENT . '/user/' . $broker_key . '">';

        if ($user_email != '' ) {$sso_session_check .= '/' . $user_email;}
        $sso_session_check .= '</script>';
    } else {
      $sso_session_check = '';
    }

    $this->set('sso_session_check', $sso_session_check);
*/
  }

  public function beforeRender(Event $event) {
    
    //add check for prefix and redirect if type of user in incorrect

    $broker_key = Configure::read('hippo.sso_broker_key');
    $user_email = '';
    $user = $this->Auth->user();
    
	if($user && $user['role'] == 'agent'){
        $user_email = $user['email'];
        $agentname = $user['company'];
        if ($agentname == '') { $agentname = $user['firstname'] . ' ' . $user['lastname']; }
		$broker_key = $broker_key . '/' . $user_email;
        $this->set('agentname',$agentname);
    }

    if( $broker_key  && $this->request->params['action'] != 'sso_profile' ){
        $sso_session_check =  '<script type="text/javascript" src="http://' . SSO_PARENT . '/sso-session/' . $broker_key . '/';
        $sso_session_check .= '"></script>';
    } else {
      $sso_session_check = '';
    }
	
	//if( !stristr( $_SERVER['REQUEST_URI'], "/main" ) ){
	    $sso_session_check .= '<script type="text/javascript">';
		$sso_session_check .= 'jQuery( document ).ready(function() {';
		
		$sso_session_check .= 'if( typeof sso_action !== "undefined" ){';
		$sso_session_check .= 'jQuery("body").prepend(\'';
		$sso_session_check .= '<div id="sso_loader" style="display:none;position:fixed;top:0px;left:0px;right:0px;bottom:0px;background-color:#eee;color:#000;z-index:9999999;">';
		$sso_session_check .= '<div id="sso_loader_login" style="display:none;padding-top:100px;text-align:center;">Passport Automatic User Login. Please wait...</div>';
		$sso_session_check .= '<div id="sso_loader_logout" style="display:none;padding-top:100px;text-align:center;">Passport Automatic User Logout. Please wait...</div>';
		$sso_session_check .= '</div>\');';
		
		$this->user = $this->Auth->user();
		
		if ( $user_email ){ $sso_session_check .= 'if( sso_action == "logout" ){ jQuery("#sso_loader,#sso_loader_logout").show(); location.href="/agent/main/logout"; }'; }
		if ( !$user_email ){
			$sso_session_check .= 'if( sso_action && sso_action != "logout" ){ ' . "\n";
			//$sso_session_check .= 'var login_url = "/sso-login/"+sso_action+"/?redirect='.urlencode($_SERVER['REQUEST_URI']).'"' . "\n";
			$sso_session_check .= 'var login_url = "/sso-login/"+sso_action+""' . "\n";
			$sso_session_check .= 'jQuery("#sso_loader,#sso_loader_login").show(); ' . "\n";
			$sso_session_check .= '//console.log(login_url); ' . "\n";
			$sso_session_check .= 'location.href=login_url; ' . "\n";
			$sso_session_check .= '}' . "\n";
		}
		
		$sso_session_check .= '}';
		$sso_session_check .= '});';
		$sso_session_check .= '</script>';
	//}
	
    $this->set('sso_session_check', $sso_session_check);

  }


  public function isAuthorized($user = null)
  {
      // Any registered user can access public functions
      if (empty($this->request->params['prefix'])) {
          return true;
      }

      // Only admins can access admin functions
      if ($this->request->params['prefix'] === 'admin') {

          return (bool)($user['role'] === 'admin');
      }

            // Only admins can access admin functions
      if ($this->request->params['prefix'] === 'agent') {

          return (bool)($user['role'] === 'agent');
      }



            // Only admins can access admin functions
      if ($this->request->params['prefix'] === 'supplier') {

          return (bool)($user['role'] === 'supplier');
      }

      // Default deny
      return false;
  }

  function _setAdminUIVariables() {
    $user_statuses = array('0' => 'awaiting', '1' => 'active', '2' => 'disabled');
    $order_owners = array('0' => 'agent', '1' => 'supplier');
    $order_priorities = array('0' => 'normal', '1' => 'rush');
    $order_statuses = array('0' => 'pending', '1' => 'completed');
    $order_item_statuses = array('0' => 'pending', '1' => 'waiting for aproval', '2' => 'back ordered', '3'=> 'out for delivery', '4'=> 'cancelled', '5'=> 'supplier to ship', '6'=> 'packaged');
    $poa_options = array('0' => 'no approval required', '1' => 'supplier to approve', '2' => 'supplier to ship', '3' => 'no approval required, notify supplier');
    $this->set(compact('user_statuses','order_owners','order_priorities','order_statuses','order_item_statuses','brochure_statuses','poa_options'));


  }

  function _setUIVariables() {

    $user_statuses = array('0' => 'awaiting', '1' => 'active', '2' => 'disabled');
    $order_owners = array('0' => 'agent', '1' => 'supplier');
    $order_priorities = array('0' => 'normal', '1' => 'rush');
    $order_statuses = array('0' => 'pending', '1' => 'completed');
   $order_item_statuses = array('0' => 'pending', '1' => 'waiting for approval', '2' => 'back ordered', '3'=>'out for delivery', '4'=> 'cancelled', '5'=> 'supplier to ship', '6'=> 'packaged');
    $brochure_statuses = array('0' => 'disabled', '1' => 'active');
    $brochure_categorys = array('0' => 'Brochure', '1' => 'Booth', '2' => 'Flyer', '3' => 'Postcard', '4' => 'Poster', '5' => 'Promotional');
    $shipvia = array("" => '','0' => 'Canpar', '1' => 'UPS', '2' => 'Purolator', '3' => 'Canada Post', '4' => 'Envoy', 'N/A' => '', 'null' => "");
    $this->set(compact('user_statuses', 'order_owners', 'order_priorities', 'order_statuses','order_item_statuses','brochure_statuses','shipvia', 'brochure_categorys'));
  }

  function _initShoppingCart() {
    

    $shoppingCart = $this->request->session()->read('ShoppingCart');
    if (empty($shoppingCart)) {
      $shoppingCart['Agent'] = $this->Auth->user('id');
      $shoppingCart['Items'] = array();
      $this->request->session()->write('ShoppingCart', $shoppingCart);
    }
  }

  function _sendEmail($to=null, $from=null, $subject=null, $message=null) {
    $mail = new PHPMailerLite();

    $mail->SetFrom($from);
    $mail->AddAddress($to);
    $mail->AddCC($from);
    $mail->Subject = $subject;
    $mail->MsgHTML($message);

    if ($mail->Send()) {
      
    }
  }

}
