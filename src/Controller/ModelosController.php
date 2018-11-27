<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Modelos Controller
 *
 * @property \App\Model\Table\ModelosTable $Modelos
 *
 * @method \App\Model\Entity\Modelo[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ModelosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $data_url = $this->request->query;

        $action = $data_url['Accion'];
        $categoria= $data_url['Categoria'];

        $this->set('action', $action);
        $this->set('categoria', $categoria);


        $modelos = $this->Modelos->find('all', []);

        $this->set(compact('modelos'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $data_url = $this->request->query;

        $action = $data_url['Accion'];
        $categoria= $data_url['Categoria'];

        $this->set('action', $action);
        $this->set('categoria', $categoria);



        $modelo = $this->Modelos->newEntity();
        if ($this->request->is('post')) {
            $modelo = $this->Modelos->patchEntity($modelo, $this->request->getData());
            if ($this->Modelos->save($modelo)) {
                $this->Flash->success(__('El modelo ha sido guardado!'));

                return $this->redirect(['action' => 'index', '?' => ['Accion' => 'Ver SIMNEA', 'Categoria' => 'SIMNEA']]);
            }
            $this->Flash->error(__('No se ha podido guardar el Modelo. Intente nuevamente.'));
        }
        $this->set(compact('modelo'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Modelo id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit()
    {
        $data_url = $this->request->query;

        $action = $data_url['Accion'];
        $categoria= $data_url['Categoria'];
        $id = $data_url['id'];

        $this->set('action', $action);
        $this->set('categoria', $categoria);

        $modelo = $this->Modelos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $modelo = $this->Modelos->patchEntity($modelo, $this->request->getData());
            if ($this->Modelos->save($modelo)) {
                $this->Flash->success(__('El Modelo ha sido editado.'));

                return $this->redirect(['action' => 'index', '?' => ['Accion' => 'Ver SIMNEA', 'Categoria' => 'SIMNEA']]);
            }
            $this->Flash->error(__('Error al editar el Modelo. Intente nuevamente.'));
        }
        $this->set(compact('modelo'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Modelo id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $modelo = $this->Modelos->get($id);
        if ($this->Modelos->delete($modelo)) {
            $this->Flash->success(__('El Modelo ha sido eliminado.'));
        } else {
            $this->Flash->error(__('Error al eliminar el Modelo. Intente nuevamente.'));
        }

        return $this->redirect(['action' => 'index', '?' => ['Accion' => 'Ver SIMNEA', 'Categoria' => 'SIMNEA']]);
    }
}
