<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Employee Entity
 *
 * @property int $id
 * @property string $name
 * @property \Cake\I18n\FrozenDate|null $dob
 * @property string|null $email
 * @property string|null $phone
 * @property int|null $team_id
 * @property int|null $role_id
 * @property int|null $report_id
 * @property int|null $salary
 * @property \Cake\I18n\FrozenTime $created
 * @property int $status_id
 *
 * @property \App\Model\Entity\Team $team
 * @property \App\Model\Entity\Role $role
 * @property \App\Model\Entity\Report $report
 * @property \App\Model\Entity\Status $status
 * @property \App\Model\Entity\StatusChange[] $status_changes
 */
class Employee extends Entity
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
        'name' => true,
        'dob' => true,
        'email' => true,
        'phone' => true,
        'team_id' => true,
        'role_id' => true,
        'report_id' => true,
        'salary' => true,
        'created' => true,
        'status_id' => true,
        'team' => true,
        'role' => true,
        'report' => true,
        'status' => true,
        'status_changes' => true,
    ];
}
