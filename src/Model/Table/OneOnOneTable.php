<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * OneOnOne Model
 *
 * @property \App\Model\Table\EmployeesTable&\Cake\ORM\Association\BelongsTo $Employees
 * @property \App\Model\Table\ManagersTable&\Cake\ORM\Association\BelongsTo $Managers
 *
 * @method \App\Model\Entity\OneOnOne newEmptyEntity()
 * @method \App\Model\Entity\OneOnOne newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\OneOnOne[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\OneOnOne get($primaryKey, $options = [])
 * @method \App\Model\Entity\OneOnOne findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\OneOnOne patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\OneOnOne[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\OneOnOne|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\OneOnOne saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\OneOnOne[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\OneOnOne[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\OneOnOne[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\OneOnOne[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class OneOnOneTable extends Table
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

        $this->setTable('one_on_one');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Employees', [
            'foreignKey' => 'employee_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Managers', [
            'className'     => 'Employees',
            'foreignKey'    => 'manager_id',
            'joinType'      => 'INNER',
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

        $validator
            ->scalar('name')
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->scalar('agenda')
            ->allowEmptyString('agenda');

        $validator
            ->dateTime('date')
            ->allowEmptyDateTime('date');

        $validator
            ->nonNegativeInteger('duration')
            ->allowEmptyString('duration');

        $validator
            ->scalar('resume')
            ->allowEmptyString('resume');

        $validator
            ->scalar('manager_notes')
            ->allowEmptyString('manager_notes');

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
        $rules->add($rules->existsIn(['manager_id'], 'Managers'), ['errorField' => 'manager_id']);

        return $rules;
    }
}
