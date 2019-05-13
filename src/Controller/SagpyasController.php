<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Sagpyas Controller
 *
 * @property \App\Model\Table\SagpyasTable $Sagpyas
 */
class SagpyasController extends AppController
{

    var $id = null;
    //Recibe como parametro el usuario autentifiado
    //En cada controlador, vuelvo a crear este metodo y le paso los permisos a las acciones que uiero

    public function isAuthorized($user)
    {
        if(isset($user['role']) and $user['role'] === 'user')
        {
            if(in_array($this->request->action, ['index', 'add', 'view', 'edit', 'delete']))
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

        $sagpyas = $this->Sagpyas->find()->order(['idsagpya' => 'ASC']);

        $sagpyas = $this->paginate($sagpyas);
         //Recupero los datos de la URL
        $data_url = $this->request->query;

        $action = $data_url['Accion'];
        $categoria= $data_url['Categoria'];
        $this->set('action', $action);
        $this->set('categoria', $categoria);

        $this->set(compact('sagpyas'));
        $this->set('_serialize', ['sagpyas']);

        $session = $this->request->session();
        $user_rol = $session->read('Auth.User.role');
        $this->set('user_rol', $user_rol);
    }

    /**
     * View method
     *
     * @param string|null $id Sagpya id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view()
    {
        $data_url = $this->request->query;

        $action = $data_url['Accion'];
        $categoria= $data_url['Categoria'];
        $this->id = $data_url['id'];

        $this->set('action', $action);
        $this->set('categoria', $categoria);

        $session = $this->request->session();
        $user_rol = $session->read('Auth.User.role');
        $this->set('user_rol', $user_rol);

        $sagpya = $this->Sagpyas->get($this->id, [
            'contain' => []
        ]);


        //Obtengo los rodales de la empresa
        $RodalesTable = $this->loadModel('Rodales');
        $SagpyaTable = $this->loadModel('Sagpyas');

        $rodales_data = $RodalesTable->find();
        $rodales_data->matching('Sagpyas', function ($q) {
                return $q->where(['RodalSagpya.sagpya_idsagpya' => $this->id]);
            });

        $rodales_data->matching('Empresa');



        $this->set('sagpya', $sagpya);
        $this->set('_serialize', ['sagpya']);

        $rodales = $this->paginate($rodales_data);
        $this->set(compact('rodales'));
        $this->set('_serialize', ['rodales']);

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
        $this->set('action', $action);
        $this->set('categoria', $categoria);

        $sagpya = $this->Sagpyas->newEntity();
        if ($this->request->is('post')) {
            $sagpya = $this->Sagpyas->patchEntity($sagpya, $this->request->data);

            if ($this->Sagpyas->save($sagpya)) {
                $this->Flash->success(__('El SAGPYA ha sido guardado!.'));
                return $this->redirect(['action' => 'index', '?' => ['Accion' => 'Ver Sagpya', 'Categoria' => 'Sagpya']]);
            }
            $this->Flash->error(__('Verifique los datos e intente nuevamente'));
        }
        $this->set(compact('sagpya'));
        $this->set('_serialize', ['sagpya']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Sagpya id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit()
    {
        //Recupero los datos de la URL
        $data_url = $this->request->query;

        $action = $data_url['Accion'];
        $categoria= $data_url['Categoria'];
        $id = $data_url['id'];
        $this->set('action', $action);
        $this->set('categoria', $categoria);


        $sagpya = $this->Sagpyas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $sagpya = $this->Sagpyas->patchEntity($sagpya, $this->request->data);
            if ($this->Sagpyas->save($sagpya)) {
                $this->Flash->success(__('El SAGPYA ha sido editado correctamente.'));

                return $this->redirect(['action' => 'index', '?' => ['Accion' => 'Ver Sagpya', 'Categoria' => 'Sagpya']]);
            }
            $this->Flash->error(__('Error al editar. Intente nuevamente!'));
        }
        $this->set(compact('sagpya'));
        $this->set('_serialize', ['sagpya']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Sagpya id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $sagpya = $this->Sagpyas->get($id);
        if ($this->Sagpyas->delete($sagpya)) {

        } else {
            $this->Flash->error(__('The sagpya could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index', '?' => ['Accion' => 'Ver Sagpya', 'Categoria' => 'Sagpya'] ]);
    }


}
