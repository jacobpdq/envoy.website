<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class OrdersTable extends Table {

	public function initialize(array $config) {


        $this->table('orders');
        $this->primaryKey('id');
        $this->addBehavior('Timestamp');
		//The Associations below have been created with all possible keys, those that are not needed can be removed
	
		$this -> belongsTo('Agents', [
				'foreignKey' => 'owner_id'
			]
		);
	    $this -> belongsTo('Suppliers', [
				'foreignKey' => 'owner_id',
			]
		);
	
		$this -> hasMany('OrderItems', [

		        'dependent' => true
			]
		);
		$this -> belongsToMany('Brochures', [
                'foreignKey' => 'brochure_id',
                'targetForeignKey' => 'order_id',
		        'through' => 'OrderItems'
			]
		);
	}
}
?>