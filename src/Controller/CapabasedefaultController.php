<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Capabasedefault Controller
 *
 * @property \App\Model\Table\CapabasedefaultTable $Capabasedefault
 */
class CapabasedefaultController extends AppController
{

    public function isAuthorized($user)
    {
        if(isset($user['role']) and $user['role'] === 'Admin')
        {
            if(in_array($this->request->action, ['index', 'add', 'edit']))
            {
                return true;
            }
        }
        return parent::isAuthorized($user);
    }

    public function index()
    {
        //Recupero los datos de la URL
        $data_url = $this->request->query;
        //Obtengo los datos de la tabla
        $action = $data_url['Accion'];
        $categoria = $data_url['Categoria'];

        $query = $this->Capabasedefault->find();
        $cantidad = $query->select(['count' => $query->func()->count('*')])->toArray();
        $this->set(compact('cantidad'));
        $this->set('_serialize', ['cantidad']);

        $capasbasedef = $this->Capabasedefault->find('all', [
            'contain' => 'Capasbase'
        ]);
        $this->set(compact('capasbasedef'));
        $this->set('_serialize', ['capasbasedef']);
        $this->set('action', $action);
        $this->set('categoria', $categoria);
    }

    public function add()
    {
        //Recupero los datos de la URL
        $data_url = $this->request->query;
        //Obtengo los datos de la tabla
        $action = $data_url['Accion'];
        $categoria = $data_url['Categoria'];
        $tablaCapaBase = $this->loadModel('Capasbase');
        $capaBase = $tablaCapaBase->find('list', [
            'keyField' => 'idcapasbase',
            'valueField' => 'nombre'
        ])->toArray();

        //Si encuentra un Objeto en las capas base que me lo pase al metodo edit



        $this->set('capaBase', $capaBase);
        $capasbasedefault = $this->Capabasedefault->newEntity();
        if ($this->request->is('post')) {
            $capasbasedefault = $this->Capabasedefault->patchEntity($capasbasedefault, $this->request->data);
            if ($this->Capabasedefault->save($capasbasedefault)) {
                return $this->redirect(['action' => 'index', '?' => ['Accion' => 'Ver Capas Base', 'Categoria' => 'Mapa']]);
            }
            $this->Flash->error(__('La Capa base no se ha establecido como default. Intente nuevamente'));
        }
        $this->set('capasbasedefault', $capasbasedefault);
        $this->set('action', $action);
        $this->set('categoria', $categoria);
    }

    public function edit()
    {
        //Recupero los datos de la URL
        $data_url = $this->request->query;
        //Obtengo los datos de la tabla
        $action = $data_url['Accion'];
        $categoria = $data_url['Categoria'];
        $id = $data_url['id'];
        $tablaCapaBase = $this->loadModel('Capasbase');
        $capaBase = $tablaCapaBase->find('list', [
            'keyField' => 'idcapasbase',
            'valueField' => 'nombre'
        ])->toArray();
        $this->set('capaBase', $capaBase);
        $capasbasedefault = $this->Capabasedefault->get($id, [
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $capasbasedefault = $this->Capabasedefault->patchEntity($capasbasedefault, $this->request->data);
            if ($this->Capabasedefault->save($capasbasedefault)) {
                return $this->redirect(['action' => 'index', '?' => ['Accion' => 'Ver Capas Base', 'Categoria' => 'Mapa']]);
            }
            $this->Flash->error(__('The rodale could not be saved. Please, try again.'));
        }
        $this->set('capasbasedefault', $capasbasedefault);
        $this->set('action', $action);
        $this->set('categoria', $categoria);
    }

    public function delete()
    {
        $this->request->allowMethod(['post', 'delete']);

        //Recupero los datos de la URL
        $data_url = $this->request->query;
        //Obtengo los datos de la tabla
        $action = $data_url['Accion'];
        $categoria = $data_url['Categoria'];
        $id = $data_url['id'];


        $capasbase = $this->Capabasedefault->get($id);
        try{
            if ($this->Capabasedefault->delete($capasbase)) {
                $this->Flash->success(__('La Capa Base Default se ha eliminado correctamente!.'));
                return $this->redirect(['action' => 'index', '?' => ['Accion' => 'Ver Capas Base', 'Categoria' => 'Mapa']]);
            } else {
                $this->Flash->error(__('La Capa Base Default no pudo ser eliminada. Intente nuevamente.'));
            }
        }catch(\PDOException $e){
            $this->Flash->error(__($e->getMessage()));
            $this->Flash->error(__('La Capa Base no pudo ser eliminada. Intente nuevamente.'));
            return $this->redirect(['action' => 'index', '?' => ['Accion' => 'Ver Capas Base', 'Categoria' => 'Mapa']]);
        }

    }


}
