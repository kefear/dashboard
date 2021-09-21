<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * StatusChanges Model
 *
 * @property \App\Model\Table\EmployeesTable&\Cake\ORM\Association\BelongsTo $Employees
 * @property \App\Model\Table\OldStatusesTable&\Cake\ORM\Association\BelongsTo $OldStatuses
 * @property \App\Model\Table\NewStatusesTable&\Cake\ORM\Association\BelongsTo $NewStatuses
 *
 * @method \App\Model\Entity\StatusChange newEmptyEntity()
 * @method \App\Model\Entity\StatusChange newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\StatusChange[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\StatusChange get($primaryKey, $options = [])
 * @method \App\Model\Entity\StatusChange findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\StatusChange patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\StatusChange[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\StatusChange|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\StatusChange saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\StatusChange[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\StatusChange[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\StatusChange[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\StatusChange[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class StatusChangesTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('status_changes');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Employees', [
            'foreignKey' => 'employee_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('OldStatuses', [
            'foreignKey' => 'old_status_id',
        ]);
        $this->belongsTo('NewStatuses', [
            'foreignKey' => 'new_status_id',
            'joinType' => 'INNER',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->nonNegativeInteger('id')
            ->allowEmptyString('id', null, 'create');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['employee_id'], 'Employees'), ['errorField' => 'employee_id']);
        $rules->add($rules->existsIn(['old_status_id'], 'OldStatuses'), ['errorField' => 'old_status_id']);
        $rules->add($rules->existsIn(['new_status_id'], 'NewStatuses'), ['errorField' => 'new_status_id']);

        return $rules;
    }
}
