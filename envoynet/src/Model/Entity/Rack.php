<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Receipt Entity.
 */
class Rack extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'brochure_id' => true,
        'rack_number' => true,
        
    ];
}