<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Team Entity
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property int|null $parent_id
 *
 * @property \App\Model\Entity\ParentTeam $parent_team
 * @property \App\Model\Entity\Employee[] $employees
 * @property \App\Model\Entity\ChildTeam[] $child_teams
 */
class Team extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'name'              => true,
        'description'       => true,
        'parent_id'         => true,
        'parent_team'       => true,
        'employees'         => true,
        'child_teams'       => true,
        'department_id'     => true,
        'manager_id'        => true,
    ];
}
