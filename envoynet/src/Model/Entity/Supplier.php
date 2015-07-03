<?php
namespace App\Model\Entity;

use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\Entity;

/**
 * Supplier Entity.
 */
class Supplier extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'username' => true,
        'password' => true,
        'decrypted_password' => true,
        'company' => true,
        'address1' => true,
        'address2' => true,
        'city' => true,
        'province' => true,
        'postal' => true,
        'country' => true,
        'email' => true,
        'phonenumber' => true,
        'contact_firstname' => true,
        'contact_lastname' => true,
        'status' => true,
        'allow_modify_orders' => true,
        'allow_modify_brochures' => true,
        'display_on_agent_site' => true,
        'master_supplier' => true,
        'restrict_brochure_access' => true,
        'restrict_report_access' => true,
        'restrict_order_access' => true,
        'agent_tiers' => true,
        'brochures' => true,
    ];

    protected function _setPassword($password)
    {
        $this->decrypted_password = $password;
        return (new DefaultPasswordHasher)->hash($password);
    }
}
