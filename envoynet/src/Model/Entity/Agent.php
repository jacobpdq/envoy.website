<?php
namespace App\Model\Entity;

use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\Entity;

/**
 * Agent Entity.
 */
class Agent extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'username' => true,
        'password' => true,
        'phonenumber' => true,
        'company' => true,
        'firstname' => true,
        'lastname' => true,
        'address' => true,
        'address2' => true,
        'city' => true,
        'province' => true,
        'postalcode' => true,
        'country' => true,
        'email' => true,
        'status' => true,
        'travelcuts' => true,
        'agent_tiers' => true,
        'ebrochureorders' => true,
    ];

    protected function _setPassword($password)
    {
        return (new DefaultPasswordHasher)->hash($password);
    }
}
