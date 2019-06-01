<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Capasbase Controller
 *
 * @property \App\Model\Table\CapasbaseTable $Capasbase
 */
class CapasbaseController extends AppController
{

    public function isAuthorized($user)
    {
        if(isset($user['role']) and $user['role'] === 'user')
        {
            if(in_array($this->request->action, ['index']))
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

        $capasbase = $this->Capasbase->find();
        $this->set(compact('capasbase'));
        $this->set('_serialize', ['capasbase']);
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
        $this->set('action', $action);
        $this->set('categoria', $categoria);
        $capasbase = $this->Capasbase->newEntity();
        if ($this->request->is('post')) {
            $capasbase = $this->Capasbase->patchEntity($capasbase, $this->request->data);
            if ($this->Capasbase->save($capasbase)) {
                $this->Flash->success(__('La Capa Base se ha guardado correctamente!'));
                return $this->redirect(['action' => 'index', '?' => ['Accion' => 'Ver Capas Base', 'Categoria' => 'Mapa']]);
            }
            $this->Flash->error(__('Error al guardar la Capa Base. Intente nuevamente.'));
        }
        $this->set(compact('capasbase'));
        $this->set('_serialize', ['capasbase']);
    }

    public function edit()
    {
        //Recupero los datos de la URL
        $data_url = $this->request->query;
        //Obtengo los datos de la tabla
        $action = $data_url['Accion'];
        $categoria = $data_url['Categoria'];
        $id = $data_url['id'];
        $capasbase = $this->Capasbase->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $capasbase = $this->Capasbase->patchEntity($capasbase, $this->request->data);
            if ($this->Capasbase->save($capasbase)) {
                $this->Flash->success(__('La Capa Base se ha guardado correctamente!'));
                return $this->redirect(['action' => 'index', '?' => ['Accion' => 'Ver Capas Base', 'Categoria' => 'Mapa']]);
            } else {
                $this->Flash->error(__('Error al guardar la Capa Base. Intente nuevamente.'));
            }
        }
        $this->set(compact('capasbase'));
        $this->set('_serialize', ['capasbase']);
        $this->set('action', $action);
        $this->set('categoria', $categoria);
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $capasbase = $this->Capasbase->get($id);
        try{
            if ($this->Capasbase->delete($capasbase)) {
                $this->Flash->success(__('La Capa Base se ha eliminado correctamente!.'));
                return $this->redirect(['action' => 'index', '?' => ['Accion' => 'Ver Capas Base', 'Categoria' => 'CapasBase']]);
            } else {
                $this->Flash->error(__('La Emsefor no pudo ser eliminada. Intente nuevamente.'));
            }
        }catch(\PDOException $e){
            $this->Flash->error(__($e->getMessage()));
            $this->Flash->error(__('La Capa Base no pudo ser eliminada. Intente nuevamente.'));
            return $this->redirect(['action' => 'index', '?' => ['Accion' => 'Ver Capas Base', 'Categoria' => 'Mapa']]);
        }
    }






}
