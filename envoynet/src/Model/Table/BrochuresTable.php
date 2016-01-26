<?php

namespace App\Model\Table;

use Cake\ORM\Table;


class BrochuresTable extends Table {
    public function initialize(array $config)
    {


        $this->table('brochures');
        $this->displayField('name');
        $this->primaryKey('id');
        $this->addBehavior('Timestamp');
        //The Associations below have been created with all possible keys, those that are not needed can be removed
        $this -> belongsTo('Images');

        $this -> belongsTo('Suppliers');

    	$this -> hasMany('BrochureOrderAmts', array('dependent' => false,'sort'=>['BrochureOrderAmts.tier'=>'asc','BrochureOrderAmts.quantity'=>'desc']));

    	$this -> hasMany('Receipts');
    	$this -> hasMany('OrderItems');
		$this -> hasMany('Racks');

        $this -> belongsToMany('Orders', [
                'foreignKey' => 'order_id',
                'targetForeignKey' => 'brochure_id',
                'through' => 'OrderItems'
            ]
        );


    }
}

?>