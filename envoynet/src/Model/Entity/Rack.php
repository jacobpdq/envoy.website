<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Rack Entity.
 */
class Rack extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'rack_number' => true,
    ];
}
