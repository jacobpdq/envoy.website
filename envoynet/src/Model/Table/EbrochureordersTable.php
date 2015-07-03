<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class EbrochureordersTable extends Table {
	
	
	public function initialize(array $config) {

        $this->table('ebrochureorders');
        $this->primaryKey('id');
        $this->addBehavior('Timestamp');

        //The Associations below have been created with all possible keys, those that are not needed can be removed
		$this -> belongsTo('Agents');
	    $this -> belongsTo('Brochures');
	}
}
?>