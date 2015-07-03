<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Order Entity.
 */
class Order extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'owner_id' => true,
        'owner_type' => true,
        'shipping_company' => true,
        'shipping_firstname' => true,
        'shipping_lastname' => true,
        'shipping_address1' => true,
        'shipping_address2' => true,
        'shipping_province' => true,
        'shipping_city' => true,
        'shipping_postalcode' => true,
        'shipping_email' => true,
        'shipping_phonenumber' => true,
        'order_comments' => true,
        'priority' => true,
        'arrival_due_date' => true,
        'rack_id' => true,
        'status' => true,
        'shipped_via' => true,
        'tracking_number' => true,
        'owner' => true,
        'rack' => true,
        'order_items' => true,
    ];
}
