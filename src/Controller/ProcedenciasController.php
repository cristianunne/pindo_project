<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Procedencias Controller
 *
 * @property \App\Model\Table\ProcedenciasTable $Procedencias
 */
class ProcedenciasController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $procedencias = $this->paginate($this->Procedencias);

        $this->set(compact('procedencias'));
        $this->set('_serialize', ['procedencias']);

         //Recupero los datos de la URL
        $data_url = $this->request->query;
        $action = $data_url['Accion'];
        $categoria= $data_url['Categoria'];

        $this->set('action', $action);
        $this->set('categoria', $categoria);


    }

    /**
     * View method
     *
     * @param string|null $id Procedencia id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $procedencia = $this->Procedencias->get($id, [
            'contain' => []
        ]);

        $this->set('procedencia', $procedencia);
        $this->set('_serialize', ['procedencia']);

          //Recupero los datos de la URL
        $data_url = $this->request->query;
        $action = $data_url['Accion'];
        $categoria= $data_url['Categoria'];

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
        $procedencia = $this->Procedencias->newEntity();
        if ($this->request->is('post')) {
            $procedencia = $this->Procedencias->patchEntity($procedencia, $this->request->data);
            if ($this->Procedencias->save($procedencia)) {
                $this->Flash->success(__('La Procedencia ha sido guardada correctamente!.'));

                 return $this->redirect(['action' => 'index', '?' => ['Accion' => 'Ver Procedencias', 'Categoria' => 'Procedencias']]);
            }
            $this->Flash->error(__('The procedencia could not be saved. Please, try again.'));
        }
        $this->set(compact('procedencia'));
        $this->set('_serialize', ['procedencia']);
        //Recupero los datos de la URL
        $data_url = $this->request->query;
        $action = $data_url['Accion'];
        $categoria= $data_url['Categoria'];

        $this->set('action', $action);
        $this->set('categoria', $categoria);
    }

    /**
     * Edit method
     *
     * @param string|null $id Procedencia id.
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



        $procedencia = $this->Procedencias->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $procedencia = $this->Procedencias->patchEntity($procedencia, $this->request->data);
            if ($this->Procedencias->save($procedencia)) {

                $this->Flash->success(__('La Procedencia ha sido editada correctamente!.'));

                return $this->redirect(['action' => 'index', '?' => ['Accion' => 'Ver Procedencias', 'Categoria' => 'Procedencias']]);


            } else {
                $this->Flash->error(__('Error al editar la Procedencia. Intente nuevamente.'));
            }

        }
        $this->set(compact('procedencia'));
        $this->set('_serialize', ['procedencia']);
        $this->set('action', $action);
        $this->set('categoria', $categoria);
    }

    /**
     * Delete method
     *
     * @param string|null $id Procedencia id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $procedencia = $this->Procedencias->get($id);
        if ($this->Procedencias->delete($procedencia)) {
            $this->Flash->success(__('La Procedencia ha sido eliminada correctamente.'));
        } else {
            $this->Flash->error(__('Error al eliminar la Procedencia. Intente nuevamente.'));
        }

        return $this->redirect(['action' => 'index', '?' => ['Accion' => 'Ver Procedencias', 'Categoria' => 'Procedencias']]);
    }
}
