<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class SuppliersTable extends Table {

    
    public function initialize(array $config) {

        $this->table('suppliers');
        $this->primaryKey('id');
        $this->addBehavior('Timestamp');


        //The Associations below have been created with all possible keys, those that are not needed can be removed
        $this -> hasMany('Brochures');
        $this -> hasMany('AgentTiers');

        $this -> hasOne('SsoSessions', [
                'foreignKey' => 'user_id',
                'conditons' => ['SsoSessions.user_type'=>'supplier']
            ]
        );
    }
}

?>