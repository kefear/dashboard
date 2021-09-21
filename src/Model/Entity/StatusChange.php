<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * StatusChange Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenTime $created
 * @property int $employee_id
 * @property int|null $old_status_id
 * @property int $new_status_id
 *
 * @property \App\Model\Entity\Employee $employee
 * @property \App\Model\Entity\OldStatus $old_status
 * @property \App\Model\Entity\NewStatus $new_status
 */
class StatusChange extends Entity
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
        'created' => true,
        'employee_id' => true,
        'old_status_id' => true,
        'new_status_id' => true,
        'employee' => true,
        'old_status' => true,
        'new_status' => true,
    ];
}
