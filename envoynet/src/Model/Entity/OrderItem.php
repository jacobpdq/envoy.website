<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * OrderItem Entity.
 */
class OrderItem extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'order_id' => true,
        'brochure_id' => true,
        'qty_ordered' => true,
        'qty_shipped' => true,
        'status' => true,
        'ontario' => true,
        'shipped_via' => true,
        'tracking_number' => true,
    ];
}
