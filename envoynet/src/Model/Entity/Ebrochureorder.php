<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Ebrochureorder Entity.
 */
class Ebrochureorder extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'agent_id' => true,
        'agentfirst' => true,
        'agentlast' => true,
        'email' => true,
        'brochure_id' => true,
        'brochname' => true,
        'supplierid' => true,
        'webaddress' => true,
        'agent' => true,
        'brochure' => true,
    ];
}
