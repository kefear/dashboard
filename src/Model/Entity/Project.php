<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Project Entity
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property \Cake\I18n\FrozenTime $created
 * @property int|null $manager_id
 * @property int|null $team_id
 * @property int $tasks_total
 * @property int $tasks_done
 * @property \Cake\I18n\FrozenDate|null $date_due
 * @property \Cake\I18n\FrozenDate|null $date_start
 *
 * @property \App\Model\Entity\Manager $manager
 * @property \App\Model\Entity\Team $team
 * @property \App\Model\Entity\Report[] $reports
 */
class Project extends Entity
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
        'name'          => true,
        'description'   => true,
        'created'       => true,
        'manager_id'    => true,
        'team_id'       => true,
        'tasks_total'   => true,
        'tasks_done'    => true,
        'date_due'      => true,
        'date_start'    => true,
        'manager'       => true,
        'team'          => true,
        'reports'       => true,
        'status_id'     => true
    ];

    protected $_statuses = [
        1   => 'new',
        2   => 'active',
        3   => 'blocked',
        4   => 'completed',
        5   => 'abandoned'
    ];

    public function _getStatusOptions()
    {
        return $this->_statuses;
    }

    public function _getPrettyStatus()
    {
        return $this->_statuses[$this->status_id];
    }
}
