<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class OrderItemsTable extends Table {

	public function initialize(array $config) {
		
		//The Associations below have been created with all possible keys, those that are not needed can be removed
	
		$this -> belongsTo('Orders');
		$this -> belongsTo('Brochures');
	}
}
?>