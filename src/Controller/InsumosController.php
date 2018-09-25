<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Insumos Controller
 *
 * @property \App\Model\Table\InsumosTable $Insumos
 */
class InsumosController extends AppController
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

        $insumos = $this->Insumos->find();
        $insumos = $this->paginate($insumos);

        $this->set(compact('insumos'));
        $this->set('_serialize', ['insumos']);


    }

    public function add()
    {
        $data_url = $this->request->query;

        $action = $data_url['Accion'];
        $categoria = $data_url['Categoria'];

        $this->set('action', $action);
        $this->set('categoria', $categoria);

        //Obtengo un count para saber si ya existe 1 registro
        $query = $this->Insumos->find();
        $dt = $query->select(['count' => $query->func()->count('*')])->toArray();
        $cantidad = $dt[0]['count'];

        if ($cantidad > 0){

            //voy a la funcion de Editar
            return $this->redirect(['action' => 'edit', '?' => ['Accion' => 'Editar Precios de Insumos', 'Categoria' => 'Insumos']]);

        } else {

            $Insumos = $this->Insumos->newEntity();

            if ($this->request->is('post')) {

                $Insumos = $this->Insumos->patchEntity($Insumos, $this->request->data);

                if($this->Insumos->save($Insumos)){

                    $this->Flash->success(__('Los Precios han sido guardado!.'));
                    //Cambiar el Redireccionamiento
                    return $this->redirect(['action' => 'index', '?' => ['Accion' => 'Ver Precios de Insumos', 'Categoria' => 'Insumos']]);
                }

                $this->Flash->error(__('Verifique los datos e intente nuevamente'));
            }

            $this->set(compact('Insumos'));
            $this->set('_serialize', ['Insumos']);

        }


    }

    public function edit()
    {
        $data_url = $this->request->query;

        $action = $data_url['Accion'];
        $categoria = $data_url['Categoria'];

        $this->set('action', $action);
        $this->set('categoria', $categoria);


        $insumos = $this->Insumos->find()->first();

        if ($this->request->is(['patch', 'post', 'put'])) {

            $insumos = $this->Insumos->patchEntity($insumos, $this->request->data);

            if($this->Insumos->save($insumos)){

                $this->Flash->success(__('Los Precios de Insumos han sido editados!.'));
                //Cambiar el Redireccionamiento
                return $this->redirect(['action' => 'index', '?' => ['Accion' => 'Ver Precios de Insumos', 'Categoria' => 'Insumos']]);
            }

            $this->Flash->error(__('Verifique los datos e intente nuevamente'));

        }
        $this->set(compact('insumos'));
        $this->set('_serialize', ['insumos']);


    }



}
