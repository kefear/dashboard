<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * OneOnOne Entity
 *
 * @property int $id
 * @property string $name
 * @property int $employee_id
 * @property int $manager_id
 * @property string|null $agenda
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime|null $date
 * @property int|null $duration
 * @property string|null $resume
 * @property string|null $manager_notes
 *
 * @property \App\Model\Entity\Employee $employee
 * @property \App\Model\Entity\Manager $manager
 */
class OneOnOne extends Entity
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
        'employee_id' => true,
        'manager_id' => true,
        'agenda' => true,
        'created' => true,
        'date' => true,
        'duration' => true,
        'resume' => true,
        'manager_notes' => true,
        'employee' => true,
        'manager' => true,
    ];
}
