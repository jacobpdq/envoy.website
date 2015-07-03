<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class ReceiptsTable extends Table {

    public function initialize(array $config) {

        $this->table('receipts');
        $this->primaryKey('id');
        $this->addBehavior('Timestamp');
        
        $this -> belongsTo('Brochures');
    }
}

?>