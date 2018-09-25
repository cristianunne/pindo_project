<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CatOperarios Controller
 *
 * @property \App\Model\Table\CatOperariosTable $CatOperarios
 */
class CatOperariosController extends AppController
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

    public function index(){

        $categorias_ = $this->CatOperarios->find()->order(['categoria' => 'ASC']);
        $categorias_ = $this->paginate($categorias_);

        $data_url = $this->request->query;

        $action = $data_url['Accion'];
        $categoria = $data_url['Categoria'];

        $this->set('action', $action);
        $this->set('categoria', $categoria);

        $this->set(compact('categorias_'));
        $this->set('_serialize', ['categorias_']);


    }

    public function add()
    {
        $data_url = $this->request->query;

        $action = $data_url['Accion'];
        $categoria = $data_url['Categoria'];

        $this->set('action', $action);
        $this->set('categoria', $categoria);

        $catOperarios = $this->CatOperarios->newEntity();

        if ($this->request->is('post')) {

            $catOperarios = $this->CatOperarios->patchEntity($catOperarios, $this->request->data);

            if($this->CatOperarios->save($catOperarios)){

                $this->Flash->success(__('La Categoría ha sido guardado!.'));
                //Cambiar el Redireccionamiento
                return $this->redirect(['action' => 'index', '?' => ['Accion' => 'Ver Categorias de Operarios', 'Categoria' => 'Operarios']]);
            }

            $this->Flash->error(__('Verifique los datos e intente nuevamente'));
        }

        $this->set(compact('catOperarios'));
        $this->set('_serialize', ['catOperarios']);


    }

    public function edit()
    {
        $data_url = $this->request->query;

        $action = $data_url['Accion'];
        $categoria = $data_url['Categoria'];
        $id = $data_url['id'];
        $this->set('action', $action);
        $this->set('categoria', $categoria);

        $catOperarios = $this->CatOperarios->get($id, [
            'contain' => []
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {

            $catOperarios = $this->CatOperarios->patchEntity($catOperarios, $this->request->data);

            if($this->CatOperarios->save($catOperarios)){

                $this->Flash->success(__('La Categoría ha sido editada!.'));
                //Cambiar el Redireccionamiento
                return $this->redirect(['action' => 'index', '?' => ['Accion' => 'Ver Categorias de Operarios', 'Categoria' => 'Operarios']]);
            }

            $this->Flash->error(__('Verifique los datos e intente nuevamente'));

        }
        $this->set(compact('catOperarios'));
        $this->set('_serialize', ['catOperarios']);


    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);

        $catOperarios = $this->CatOperarios->get($id);
        if ($this->CatOperarios->delete($catOperarios)) {

        } else {
            $this->Flash->error(__('Error al eliminar la Categoría. Intente nuevamente'));
        }

        return $this->redirect(['action' => 'index', '?' => ['Accion' => 'Ver Categorias de Operarios', 'Categoria' => 'Operarios'] ]);

    }


}
