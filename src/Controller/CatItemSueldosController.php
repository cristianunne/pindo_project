<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CatItemSueldos Controller
 *
 * @property \App\Model\Table\CatItemSueldosTable $CatItemSueldos
 */
class CatItemSueldosController extends AppController
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

        $categorias_ = $this->CatItemSueldos->find()->order(['categoria' => 'ASC']);
        $categorias_ = $this->paginate($categorias_);

        $data_url = $this->request->query;

        $action = $data_url['Accion'];
        $categoria = $data_url['Categoria'];

        $this->set('action', $action);
        $this->set('categoria', $categoria);

        $this->set(compact('categorias_'));
        $this->set('_serialize', ['categorias_']);



    }

    public function add(){

        //Recupero los datos de la URL
        $data_url = $this->request->query;

        $action = $data_url['Accion'];
        $categoria= $data_url['Categoria'];
        $this->set('action', $action);
        $this->set('categoria', $categoria);

        $catitemsueldos = $this->CatItemSueldos->newEntity();
        if ($this->request->is('post')) {

            $catitemsueldos = $this->CatItemSueldos->patchEntity($catitemsueldos, $this->request->data);

            if($this->CatItemSueldos->save($catitemsueldos)){

                $this->Flash->success(__('La Categoría ha sido guardado!.'));
                //Cambiar el Redireccionamiento
                return $this->redirect(['action' => 'index', '?' => ['Accion' => 'Ver Categorías', 'Categoria' => 'Categorias']]);
            }

            $this->Flash->error(__('Verifique los datos e intente nuevamente'));
        }

        $this->set(compact('catitemsueldos'));
        $this->set('_serialize', ['catitemsueldos']);

    }

    public function edit(){
        //Recupero los datos de la URL
        $data_url = $this->request->query;

        $action = $data_url['Accion'];
        $categoria= $data_url['Categoria'];
        $id = $data_url['id'];
        $this->set('action', $action);
        $this->set('categoria', $categoria);

        $catitemsueldos = $this->CatItemSueldos->get($id, [
            'contain' => []
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {

            $catitemsueldos = $this->CatItemSueldos->patchEntity($catitemsueldos, $this->request->data);

            if($this->CatItemSueldos->save($catitemsueldos)){

                $this->Flash->success(__('La Categoría ha sido editada!.'));
                //Cambiar el Redireccionamiento
                return $this->redirect(['action' => 'index', '?' => ['Accion' => 'Ver Categorías', 'Categoria' => 'Categorias']]);
            }

            $this->Flash->error(__('Verifique los datos e intente nuevamente'));

        }
        $this->set(compact('catitemsueldos'));
        $this->set('_serialize', ['catitemsueldos']);

    }


    public function delete($id = null){

        $this->request->allowMethod(['post', 'delete']);

        $catitemsueldos = $this->CatItemSueldos->get($id);
        if ($this->CatItemSueldos->delete($catitemsueldos)) {

        } else {
            $this->Flash->error(__('Error al eliminar la Categoría. Intente nuevamente'));
        }

        return $this->redirect(['action' => 'index', '?' => ['Accion' => 'Ver Categorías', 'Categoria' => 'Categorias'] ]);
    }

}
