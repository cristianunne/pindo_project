<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Emsefor Controller
 *
 * @property \App\Model\Table\EmseforTable $Emsefor
 */
class EmseforController extends AppController
{

    public function isAuthorized($user)
    {
        if(isset($user['role']) and $user['role'] === 'user')
        {
            if(in_array($this->request->action, ['index', 'add', 'edit', 'delete']))
            {
                return true;
            }
        }

        return parent::isAuthorized($user);
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
          //Recupero los datos de la URL
        $data_url = $this->request->query;

        $action = $data_url['Accion'];
        $categoria= $data_url['Categoria'];

        $emsefor = $this->paginate($this->Emsefor);

        $this->set(compact('emsefor'));
        $this->set('_serialize', ['emsefor']);

        $this->set('action', $action);
        $this->set('categoria', $categoria);
    }

    /**
     * View method
     *
     * @param string|null $id Emsefor id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view()
    {
        $data_url = $this->request->query;

        $action = $data_url['Accion'];
        $categoria= $data_url['Categoria'];
        $id = $data_url['id_ems'];

        $this->set('action', $action);
        $this->set('categoria', $categoria);
        $this->set('id_ems', $id);

        //Debo obtener los datos de la relacion con VariablesGenerales
        $emsefor = $this->Emsefor->get($id, [
            'contain' => ['Maquinas', 'VariablesGlobales']
        ]);


        $this->set('emsefor', $emsefor);
        $this->set('_serialize', ['emsefor']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
           //Recupero los datos de la URL
        $data_url = $this->request->query;

        $action = $data_url['Accion'];
        $categoria= $data_url['Categoria'];

        $emsefor = $this->Emsefor->newEntity();
        if ($this->request->is('post')) {
            $emsefor = $this->Emsefor->patchEntity($emsefor, $this->request->data);
            if ($this->Emsefor->save($emsefor)) {


               return $this->redirect(['action' => 'index', '?' => ['Accion' => 'Ver Emsefor', 'Categoria' => 'Emsefor']]);
            }
            $this->Flash->error(__('La Emsefos no se pudo agregar. Por Favor, intente nuevamente.'));
        }
        $this->set(compact('emsefor'));
        $this->set('_serialize', ['emsefor']);
        $this->set('action', $action);
        $this->set('categoria', $categoria);
    }

    /**
     * Edit method
     *
     * @param string|null $id Emsefor id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit()
    {
        //obtengo l variable de la get
        $data_url = $this->request->query;
        $id = $data_url['id'];
        $action = $data_url['Accion'];
        $categoria= $data_url['Categoria'];

        $emsefor = $this->Emsefor->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $emsefor = $this->Emsefor->patchEntity($emsefor, $this->request->data);
            if ($this->Emsefor->save($emsefor)) {


                 $this->Flash->set('/pindo_project/Emsefor?Accion=Ver+Emsefor&Categoria=Emsefor', ['element' => 'success_2']);
            } else {
                 $this->Flash->error(__('The emsefor could not be saved. Please, try again.'));
            }

        }
        $this->set(compact('emsefor'));
        $this->set('_serialize', ['emsefor']);
        $this->set('action', $action);
        $this->set('categoria', $categoria);
    }

    /**
     * Delete method
     *
     * @param string|null $id Emsefor id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $emsefor = $this->Emsefor->get($id);


        try{
             if ($this->Emsefor->delete($emsefor)) {
                $this->Flash->success(__('La Emsefor ha sido eliminada.'));
                return $this->redirect(['action' => 'index', '?' => ['Accion' => 'Ver Emsefor', 'Categoria' => 'Emsefor']]);
            } else {
                $this->Flash->error(__('La Emsefor no pudo ser eliminada. Intente nuevamente.'));
            }
        }catch(\PDOException $e){
              $this->Flash->error(__($e->getMessage()));
              $this->Flash->error(__('La Emsefor no pudo ser eliminada. Intente nuevamente.'));
                return $this->redirect(['action' => 'index', '?' => ['Accion' => 'Ver Emsefor', 'Categoria' => 'Emsefor']]);
        }





    }





}
