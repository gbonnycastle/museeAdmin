<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Locators Controller
 *
 * @property \App\Model\Table\LocatorsTable $Locators
 */
class LocatorsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Contacts']
        ];
        $locators = $this->paginate($this->Locators);

        $this->set(compact('locators'));
        $this->set('_serialize', ['locators']);
    }

    /**
     * View method
     *
     * @param string|null $id Locator id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $locator = $this->Locators->get($id, [
            'contain' => ['Contacts']
        ]);

        $this->set('locator', $locator);
        $this->set('_serialize', ['locator']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $locator = $this->Locators->newEntity();
        if ($this->request->is('post')) {
            $locator = $this->Locators->patchEntity($locator, $this->request->data);
            if ($this->Locators->save($locator)) {
                $this->Flash->success(__('The locator has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The locator could not be saved. Please, try again.'));
            }
        }
        $contacts = $this->Locators->Contacts->find('list', ['limit' => 200]);
        $this->set(compact('locator', 'contacts'));
        $this->set('_serialize', ['locator']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Locator id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $locator = $this->Locators->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $locator = $this->Locators->patchEntity($locator, $this->request->data);
            if ($this->Locators->save($locator)) {
                $this->Flash->success(__('The locator has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The locator could not be saved. Please, try again.'));
            }
        }
        $contacts = $this->Locators->Contacts->find('list', ['limit' => 200]);
        $this->set(compact('locator', 'contacts'));
        $this->set('_serialize', ['locator']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Locator id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $locator = $this->Locators->get($id);
        if ($this->Locators->delete($locator)) {
            $this->Flash->success(__('The locator has been deleted.'));
        } else {
            $this->Flash->error(__('The locator could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
