<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * AdministracionUsuarios Controller
 *
 */
class AdministracionUsuariosController extends AppController
{

    public function isAuthorized($user)
    {
        if(isset($user['role']) and $user['role'] === 'user')
        {
            if(in_array($this->request->action, ['viewProfile']))
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

        $action = $data_url['Accion'];
        $categoria= $data_url['Categoria'];

        $this->set('action', $action);
        $this->set('categoria', $categoria);

        $modelUsers = $this->loadModel('Users');
        $tablaUsers = $modelUsers->find('all', []);

        $this->set('tablaUsers', $tablaUsers);

    }

    public function edit()
    {

        //Recupero los datos de la URL
        $data_url = $this->request->query;

        $action = $data_url['Accion'];
        $categoria= $data_url['Categoria'];
        $id = $data_url['id'];

        $this->set('action', $action);
        $this->set('categoria', $categoria);

        $modelUsers = $this->loadModel('Users');

        $users = $modelUsers->get($id, [
            'contain' => []
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {

            $user = $modelUsers->patchEntity($users, $this->request->data);

            if ($modelUsers->save($user)) {

                $this->Flash->success('El Usuario se ha editado Correctamente!');


                return $this->redirect(['action' => 'index', '?' => ['Accion' => 'Administrar Usuarios', 'Categoria' => 'AdministracionUsuarios']]);
            } else {
                $this->Flash->error(__('Error al editar. Intente nuevamente!'));
            }


        }

        $this->set('users', $users);


    }

    public function viewProfile()
    {
        //Recupero los datos de la URL
        $data_url = $this->request->query;

        $action = $data_url['Accion'];
        $categoria= $data_url['Categoria'];
        $id = $data_url['id'];

        $this->set('action', $action);
        $this->set('categoria', $categoria);

        $modelUsers = $this->loadModel('Users');
        $user = $modelUsers->get($id, [
            'contain' => []
        ]);
        $this->set('user', $user);


    }



}
