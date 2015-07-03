<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * AgentTier Entity.
 */
class AgentTier extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'agent_id' => true,
        'supplier_id' => true,
        'tier' => true,
    ];
}
