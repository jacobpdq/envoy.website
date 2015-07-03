<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Core\Configure;

class SettingsTable extends Table {

	public $displayField = 'key';

    public $key = 'hippo';
    public $custom_settings = array();

    //retrieve configuration data from the DB
    public function getcfg(){
        // get all settings from db
        $cfgs = $this->find('all', array('fields'=>array('id','key','value')));

        // if not is array we exit
        if( $cfgs->count() == 0 ) return;

        // parse each setting
        foreach($cfgs as $cfg) {

            // build the array for use later
            $data_array = array(
                        'id' =>    $cfg['id'],
                        'key' => $cfg['key'],
                        'value' => $cfg['value'],
                        'checksum' => md5($cfg['value']) );
            $this->custom_settings[] = $data_array;

            // write the config
            Configure::write($this->key . '.' . $cfg['key'], $cfg['value']);
        }
    }

}
?>