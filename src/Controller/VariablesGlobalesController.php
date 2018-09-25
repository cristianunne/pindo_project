<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * VariablesGlobales Controller
 *
 * @property \App\Model\Table\VariablesGlobalesTable $VariablesGlobales
 */
class VariablesGlobalesController extends AppController
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


    public function index()
    {

    }

    public function add()
    {
        $data_url = $this->request->query;

        $action = $data_url['Accion'];
        $categoria= $data_url['Categoria'];
        $id_ems = $data_url['id_ems'];

        $this->set('action', $action);
        $this->set('categoria', $categoria);
        $this->set('id_ems', $id_ems);

        $variablesGlobales = $this->VariablesGlobales->newEntity();

        if ($this->request->is('post')) {
            $variablesGlobales = $this->VariablesGlobales->patchEntity($variablesGlobales, $this->request->getData());
            //Cargo la clave foranea
            $variablesGlobales->emsefor_idemsefor = $id_ems;

            //Fecha de los costos
            //$variablesGlobales->fecha_act_costos = Time::now();

            if ($this->VariablesGlobales->save($variablesGlobales)) {
                $this->Flash->success(__('Las Variables Generales han sido guardadas.'));

                return $this->redirect(['controller' => 'Emsefor', 'action' => 'view', '?' => ['Accion' => 'Ver Emsefor', 'Categoria' => 'Emsefor', 'id_ems' => $id_ems]]);
            }
            $this->Flash->error(__('Error al guardar las Variables Generales. Intente nuevamente'));
        }
        $this->set(compact('variablesGlobales'));

    }

    public function edit()
    {
        $data_url = $this->request->query;

        $action = $data_url['Accion'];
        $categoria= $data_url['Categoria'];
        $id_ems = $data_url['id_ems'];
        $id_var_gen = $data_url['id_var_gen'];

        $this->set('action', $action);
        $this->set('categoria', $categoria);
        $this->set('id_ems', $id_ems);
        $this->set('id_var_gen', $id_var_gen);

        $variablesGlobales = $this->VariablesGlobales->get($id_var_gen, [
            'contain' => []
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $variablesGlobales = $this->VariablesGlobales->patchEntity($variablesGlobales, $this->request->getData());
            if ($this->VariablesGlobales->save($variablesGlobales)) {
                $this->Flash->success(__('Las Variables Generales han sido guardadas.'));

                return $this->redirect(['controller' => 'Emsefor', 'action' => 'view', '?' => ['Accion' => 'Ver Emsefor', 'Categoria' => 'Emsefor', 'id_ems' => $id_ems]]);
            }
            $this->Flash->error(__('Error al guardar las Variables Generales. Intente nuevamente'));
        }
        $this->set(compact('variablesGlobales'));

    }

    public function view()
    {
        $data_url = $this->request->query;

        $action = $data_url['Accion'];
        $categoria= $data_url['Categoria'];
        $id_ems = $data_url['id_ems'];
        $id_var_gen = $data_url['id_var_gen'];

        $this->set('action', $action);
        $this->set('categoria', $categoria);
        $this->set('id_ems', $id_ems);
        $this->set('id_var_gen', $id_var_gen);

        $variablesGlobales = $this->VariablesGlobales->get($id_var_gen, [
            'contain' => []
        ]);

        $this->set('variablesGlobales', $variablesGlobales);

    }

    public function delete($id = null)
    {

    }

}
