<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * OneOnOne Controller
 *
 * @property \App\Model\Table\OneOnOneTable $OneOnOne
 * @method \App\Model\Entity\OneOnOne[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class OneOnOneController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Employees', 'Managers'],
        ];
        $oneOnOne = $this->paginate($this->OneOnOne);

        $this->set(compact('oneOnOne'));
    }

    /**
     * View method
     *
     * @param string|null $id One On One id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $oneOnOne = $this->OneOnOne->get($id, [
            'contain' => ['Employees', 'Managers'],
        ]);

        $this->set(compact('oneOnOne'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $oneOnOne = $this->OneOnOne->newEmptyEntity();
        if ($this->request->is('post')) {
            $oneOnOne = $this->OneOnOne->patchEntity($oneOnOne, $this->request->getData());
            if ($this->OneOnOne->save($oneOnOne)) {
                $this->Flash->success(__('The one on one has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The one on one could not be saved. Please, try again.'));
        }
        $employees = $this->OneOnOne->Employees->find('list')->find('employed')->order(['first_name' => 'asc']);
        $managers = $this->OneOnOne->Managers->find('list')->find('employed')->order(['first_name' => 'asc']);
        $this->set(compact('oneOnOne', 'employees', 'managers'));
    }

    /**
     * Edit method
     *
     * @param string|null $id One On One id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $oneOnOne = $this->OneOnOne->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $oneOnOne = $this->OneOnOne->patchEntity($oneOnOne, $this->request->getData());
            if ($this->OneOnOne->save($oneOnOne)) {
                $this->Flash->success(__('The one on one has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The one on one could not be saved. Please, try again.'));
        }
        $employees = $this->OneOnOne->Employees->find('list')->find('employed')->order(['first_name' => 'asc']);
        $managers = $this->OneOnOne->Managers->find('list')->find('employed')->order(['first_name' => 'asc']);
        $this->set(compact('oneOnOne', 'employees', 'managers'));
    }

    /**
     * Delete method
     *
     * @param string|null $id One On One id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $oneOnOne = $this->OneOnOne->get($id);
        if ($this->OneOnOne->delete($oneOnOne)) {
            $this->Flash->success(__('The one on one has been deleted.'));
        } else {
            $this->Flash->error(__('The one on one could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
