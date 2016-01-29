<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class RacksTable extends Table {

    public function initialize(array $config) {

        $this->table('racks');
        $this->primaryKey('id');
        
        $this -> belongsTo('Brochures');
    }
}

?>