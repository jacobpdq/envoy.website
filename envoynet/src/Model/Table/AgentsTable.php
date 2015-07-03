<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class AgentsTable extends Table {

    public $displayField = 'company';

    public function initialize(array $config)
    {

        $this->table('agents');
        $this->primaryKey('id');
        $this->addBehavior('Timestamp');

        $this -> hasMany('AgentTiers');

        $this -> hasOne('SsoSessions', [
                'foreignKey' => 'user_id',
                'conditons' => ['SsoSessions.user_type'=>'agent']
            ]
        );
    }
}

?>