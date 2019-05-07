<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Controller\Model\Table\RodalesTable;

/**
 * Empresa Controller
 *
 * @property \App\Model\Table\EmpresaTable $Empresa
 * @property \App\Model\Table\RodalesTable $Rodales
 */
class EmpresaController extends AppController
{


    //Recibe como parametro el usuario autentifiado
    //En cada controlador, vuelvo a crear este metodo y le paso los permisos a las acciones que uiero
    
    public function isAuthorized($user)
    {
        if(isset($user['role']) and $user['role'] === 'user')
        {
            if(in_array($this->request->action, ['index', 'add']))
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
        $empresa = $this->paginate($this->Empresa);

        //extraigo el rol de usuario
        $session = $this->request->session();
        $user_rol = $session->read('Auth.User.role');

        
        //Recupero los datos de la URL
        $data_url = $this->request->query;
        
        $action = $data_url['Accion'];
        $categoria= $data_url['Categoria'];
     

        $this->set(compact('empresa'));
        $this->set('_serialize', ['empresa']);
        $this->set('action', $action);
        $this->set('categoria', $categoria);
        $this->set('user_rol', $user_rol);
    }

    /**
     * View method
     *
     * @param string|null $id Empresa id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view()
    {
        
        //Recupero los datos de la URL
        $data_url = $this->request->query;
        
        $action = $data_url['Accion'];
        $categoria= $data_url['Categoria'];
        
        $id = $data_url['id'];
        
        $empresa = $this->Empresa->get($id, [
            'contain' => []
        ]);
        
        //Obtengo los rodales
        $rodales = $this->Empresa->Rodales->find('all')
        ->where(['Rodales.empresa_idempresa' => $id]);
        

        $this->set('empresa', $empresa);
        $this->set('_serialize', ['empresa']);
        $this->set('rodales', $rodales);
        
        $this->set('action', $action);
        $this->set('categoria', $categoria);
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
        
        $empresa = $this->Empresa->newEntity();
        if ($this->request->is('post')) {
            $empresa = $this->Empresa->patchEntity($empresa, $this->request->data);
            if ($this->Empresa->save($empresa)) {

                return $this->redirect(['action' => 'index', '?' => ['Accion' => 'Ver Empresas', 'Categoria' => 'Empresa']]);
            }
            $this->Flash->error(__('La Empresa no pudo ser guardada. Por Favor, Intente Nuevamente.'));
        }
        $this->set(compact('empresa'));
        $this->set('_serialize', ['empresa']);
        
        $this->set('action', $action);
        $this->set('categoria', $categoria);
        
       
    }

    /**
     * Edit method
     *
     * @param string|null $id Empresa id.
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
        
        $empresa = $this->Empresa->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $empresa = $this->Empresa->patchEntity($empresa, $this->request->data);
            if ($this->Empresa->save($empresa)) {
                
                //$this->Session->setFlash($message,'flash',array('alert'=>'info'));
                $this->Flash->set('/pindo_project/Empresa?Accion=Ver+Empresas&Categoria=Empresa', ['element' => 'success_2']);
                //$this->Flash->success(__('The empresa has been saved.'));

                //return $this->redirect(['action' => 'index', '?' => ['Accion' => 'Ver Empresas', 'Categoria' => 'Empresa']]);
            } else {
                $this->Flash->error(__('The empresa could not be saved. Please, try again.'));
            }
            
        }
        $this->set(compact('empresa'));
        $this->set('_serialize', ['empresa']);
        $this->set('action', $action);
        $this->set('categoria', $categoria);
    }

    /**
     * Delete method
     *
     * @param string|null $id Empresa id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $empresa = $this->Empresa->get($id);
        try{
            if ($this->Empresa->delete($empresa)) {
                return $this->redirect(['action' => 'index', '?' => ['Accion' => 'Ver Empresas', 'Categoria' => 'Empresa']]);
            } else {
                $this->Flash->error(__('La Empresa no puede ser Eliminada. Por Favor, Intente nuevamente.'));
            }
        }catch (\PDOException $ee){
            $this->Flash->error(__('La Empresa no puede ser Eliminada. Por Favor, Intente nuevamente.'. $ee->getMessage()));
            return $this->redirect(['action' => 'index', '?' => ['Accion' => 'Ver Empresas', 'Categoria' => 'Empresa']]);

        }


    }
}
