<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Http\Client;

/**
 * TelegramUpdates Model
 *
 * @property \App\Model\Table\UpdatesTable&\Cake\ORM\Association\BelongsTo $Updates
 *
 * @method \App\Model\Entity\TelegramUpdate newEmptyEntity()
 * @method \App\Model\Entity\TelegramUpdate newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\TelegramUpdate[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TelegramUpdate get($primaryKey, $options = [])
 * @method \App\Model\Entity\TelegramUpdate findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\TelegramUpdate patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TelegramUpdate[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\TelegramUpdate|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TelegramUpdate saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TelegramUpdate[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\TelegramUpdate[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\TelegramUpdate[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\TelegramUpdate[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class TelegramUpdatesTable extends Table
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

        $this->setTable('telegram_updates');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

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
            ->scalar('message')
            ->allowEmptyString('message');

        $validator
            ->scalar('channel_post')
            ->allowEmptyString('channel_post');

        $validator
            ->scalar('inline_query')
            ->allowEmptyString('inline_query');

        $validator
            ->scalar('chosen_inline_result')
            ->allowEmptyString('chosen_inline_result');

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
        return $rules;
    }

    public function afterSave($event, $entity, $options) 
    {
        //  check if update is a new update 
        //  if so, we need to respond
        if ($this->respond_to_telegram_message($entity)) {
            //  respond
            // $this->delete($entity);
        }
    }

    public function respond_to_telegram_message($entity)
    {
        //  called to respond to incoming update
        //  logic: 
        //  check if incoming message is registration confirmation
        //  check if user is registered 
        if (true) {
            $this->send_message(unserialize($entity->message)['chat']['id'], unserialize($entity->message)['text']);
        }
        return true;
    }

    public function send_message($chat_id, $text)
    {
        $method = 'sendMessage';
        $bot = '2136168689:AAHoRH19oPJ4mUOBP2JPA3iH1kS7XdvMDBA';
        $query = "?chat_id=$chat_id&text=$text";
        $http = new Client();
        $response = $http->get(
            "https://api.telegram.org/bot$bot/$method$query",  
            [
                'headers'   => ['Content-Type' => 'application/json']
            ]
        );
    }
}
