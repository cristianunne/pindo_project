<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Laboral Controller
 *
 * @property \App\Model\Table\LaboralTable $Laboral
 */
class LaboralController extends AppController
{
    //Recibe como parametro el usuario autentifiado
    //En cada controlador, vuelvo a crear este metodo y le paso los permisos a las acciones que uiero

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
        $data_url = $this->request->query;

        $action = $data_url['Accion'];
        $categoria = $data_url['Categoria'];

        $this->set('action', $action);
        $this->set('categoria', $categoria);

        $laboral = $this->Laboral->find();
        $laboral = $this->paginate($laboral);

        $this->set(compact('laboral'));
        $this->set('_serialize', ['laboral']);


    }

    public function add()
    {
        $data_url = $this->request->query;

        $action = $data_url['Accion'];
        $categoria = $data_url['Categoria'];

        $this->set('action', $action);
        $this->set('categoria', $categoria);

        $query = $this->Laboral->find();
        $dt = $query->select(['count' => $query->func()->count('*')])->toArray();
        $cantidad = $dt[0]['count'];

        if($cantidad > 0){

            //voy a la funcion de Editar
            return $this->redirect(['action' => 'edit', '?' => ['Accion' => 'Editar Datos Laborales', 'Categoria' => 'Laboral']]);

        } else {

            $laboral = $this->Laboral->newEntity();

            if ($this->request->is('post')) {

                $laboral = $this->Laboral->patchEntity($laboral, $this->request->data);

                if($this->Laboral->save($laboral)){

                    $this->Flash->success(__('Los Datos han sido guardado!.'));
                    //Cambiar el Redireccionamiento
                    return $this->redirect(['action' => 'index', '?' => ['Accion' => 'Ver Datos Laborales', 'Categoria' => 'Laboral']]);
                }

                $this->Flash->error(__('Verifique los datos e intente nuevamente'));
            }

            $this->set(compact('laboral'));
            $this->set('_serialize', ['laboral']);
        }


    }

    public function edit()
    {
        $data_url = $this->request->query;

        $action = $data_url['Accion'];
        $categoria = $data_url['Categoria'];

        $this->set('action', $action);
        $this->set('categoria', $categoria);

        $laboral = $this->Laboral->find()->first();

        if ($this->request->is(['patch', 'post', 'put'])) {

            $laboral = $this->Laboral->patchEntity($laboral, $this->request->data);

            if($this->Laboral->save($laboral)){

                $this->Flash->success(__('Los Datos Laborales han sido editados!.'));
                //Cambiar el Redireccionamiento
                return $this->redirect(['action' => 'index', '?' => ['Accion' => 'Ver Datos Laborales', 'Categoria' => 'Laboral']]);
            }

            $this->Flash->error(__('Verifique los datos e intente nuevamente'));

        }
        $this->set(compact('laboral'));
        $this->set('_serialize', ['laboral']);
    }


}
