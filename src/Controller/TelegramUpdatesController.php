<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * TelegramUpdates Controller
 *
 * @property \App\Model\Table\TelegramUpdatesTable $TelegramUpdates
 * @method \App\Model\Entity\TelegramUpdate[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TelegramUpdatesController extends AppController
{

    public function initialize(): void
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
        $this->Authentication->allowUnauthenticated(['receiveUpdate']);
        // $this->Authorization->skipAuthorization();
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [];
        $telegramUpdates = $this->paginate($this->TelegramUpdates);

        $this->set(compact('telegramUpdates'));
    }

    /**
     * View method
     *
     * @param string|null $id Telegram Update id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $telegramUpdate = $this->TelegramUpdates->get($id);

        $this->set(compact('telegramUpdate'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $telegramUpdate = $this->TelegramUpdates->newEmptyEntity();
        if ($this->request->is('post')) {
            $telegramUpdate = $this->TelegramUpdates->patchEntity($telegramUpdate, $this->request->getData());
            if ($this->TelegramUpdates->save($telegramUpdate)) {
                $this->Flash->success(__('The telegram update has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The telegram update could not be saved. Please, try again.'));
        }
        $updates = $this->TelegramUpdates->Updates->find('list', ['limit' => 200]);
        $this->set(compact('telegramUpdate', 'updates'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Telegram Update id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $telegramUpdate = $this->TelegramUpdates->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $telegramUpdate = $this->TelegramUpdates->patchEntity($telegramUpdate, $this->request->getData());
            if ($this->TelegramUpdates->save($telegramUpdate)) {
                $this->Flash->success(__('The telegram update has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The telegram update could not be saved. Please, try again.'));
        }
        $updates = $this->TelegramUpdates->Updates->find('list', ['limit' => 200]);
        $this->set(compact('telegramUpdate', 'updates'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Telegram Update id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $telegramUpdate = $this->TelegramUpdates->get($id);
        if ($this->TelegramUpdates->delete($telegramUpdate)) {
            $this->Flash->success(__('The telegram update has been deleted.'));
        } else {
            $this->Flash->error(__('The telegram update could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function receiveUpdate()
    {
        $response = [
            'message' => 'not ok'
        ];
        if ($this->request->is('post')) {
            $update_data = $this->request->getData();
            $telegramUpdate = $this->TelegramUpdates->newEmptyEntity();
            $telegramUpdate->update_id = $update_data['update_id'];
            $telegramUpdate->message = serialize($update_data['message']);
            if ($this->TelegramUpdates->save($telegramUpdate)) {
                $response = 'ok';
            }
        }
        $this->viewBuilder()->setOption('serialize', 'response');
        return $this->RequestHandler->renderAs($this, 'json');
    }
}
