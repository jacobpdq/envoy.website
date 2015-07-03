<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class SsoSessionsTable extends Table {

    public function initialize(array $config) {


        $this->table('sso_sessions');
        $this->primaryKey('id');
        $this->addBehavior('Timestamp');
    }
}
?>