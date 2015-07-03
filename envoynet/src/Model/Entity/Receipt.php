<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Receipt Entity.
 */
class Receipt extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'brochure_id' => true,
        'qty' => true,
        'date' => true,
        'carrier' => true,
    ];
}
