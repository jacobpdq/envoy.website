<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * BrochureOrderAmt Entity.
 */
class BrochureOrderAmt extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'brochure_id' => true,
        'tier' => true,
        'quantity' => true,
    ];
}
