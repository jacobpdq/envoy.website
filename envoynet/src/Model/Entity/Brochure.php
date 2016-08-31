<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Brochure Entity.
 */
class Brochure extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'id' => true,
        'supplier_id' => true,
        'name' => true,
        'is_french' => true,
        'description' => true,
        'image_id' => true,
        'max_order' => true,
        'max_order_a' => true,
        'max_order_b' => true,
        'max_order_c' => true,
        'max_order_d' => true,
        'qty_skid' => true,
        'qty_box' => true,
        'weight' => true,
        'Ontario_inventory' => true,
        'BC_inventory' => true,
        'inv_balance' => true,
        'inv_notif_threshold' => true,
        'language' => true,
        'display_on_agent_page' => true,
        'ontario' => true,
        'poa' => true,
        'ebrochure' => true,
        'status' => true,
        'location' => true,
        'restrict_access' => true,
        'max_restricted_qty' => true,
        'category' => true,
    ];
}