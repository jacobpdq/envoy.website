<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Admin Entity.
 */
class Admin extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'username' => true,
        'password' => true,
        'email' => true,
    ];
}
