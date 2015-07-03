<?php

namespace App\Controller\Agent;

use App\Controller\AppController;
use Cake\Core\Configure;
use Cake\ORM\TableRegistry;


class BrochuresController extends \App\Controller\BrochuresController {

  public $name = 'Brochures';
  public $helpers = array('ImageResize');

  public function initialize()
  {
      parent::initialize();
  }

  public function index($supplierId=null) {
  
 

    $this->set('title_for_layout', __('Brochures'));

    $defaultSupplierId = Configure::read('hippo.default_supplier');

    
    if ($supplierId != null && !empty($defaultSupplierId)) {
      $supplierId = $defaultSupplierId;
    }

    if ($supplierId != null) {

      $this->paginate['conditions'] = [
        'Brochures.supplier_id' => $supplierId, 
        'Brochures.display_on_agent_page' => '1', 
        'Brochures.status' => '1'
      ];
    } else {

      $checkDate = mktime(0, 0, 0, date("m"), date("d") - 14, date("Y"));
      $checkDate = date("Y-m-d", $checkDate);

      $this->paginate ['conditions'] = [
        'Brochures.created >=' => $checkDate, 
        'Brochures.display_on_agent_page' => '1', 
        'Brochures.status' => '1', 
        'Brochures.supplier_id <>' => '1021' 
      ];

    }

    //   $this->Brochures->recursive = 1;
    $this->set('brochures', $this->paginate());

    $agentid = $this->Auth->user('id');
    //$this->Brochures->Suppliers->AgentTier->recursive = -1;
    $agentTiers = TableRegistry::get('AgentTiers');

    $this->set('agttiers', $agentTiers->find('all', [
      'conditions' => [
        'agent_id' => $agentid, 
        'supplier_id' => $supplierId
      ]
    ]));

    $this->loadModel('Suppliers');
    $this->set(
      'suppliers', 
      $this->Suppliers->find(
        'all', [
          'fields' => [
            'company', 
            'id', 
            'status', 
            'display_on_agent_site'
          ],
          'order' => [
            'Suppliers.company' => 'ASC'
          ]
        ]
      )
    );

    if ($supplierId != null) {
      $this->set('selectedSupplier', $this->Brochures->Suppliers->findById($supplierId));
    } else {
      $this->set('selectedSupplier', null);
    }

    $this->set('tcuts',$this->Auth->user('travelcuts'));
	}

  

  public function view($id = null) {
    if (!$id) {
      $this->Flash->set(__('Invalid brochure'));
      $this->redirect(array('action' => 'index'));
    }
    $this->set('brochure', $this->Brochures->get($id));
  }

}

?>