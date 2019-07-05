<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Plantaciones Controller
 *
 * @property \App\Model\Table\PlantacionesTable $Plantaciones
 */
class PlantacionesController extends AppController implements \Countable
{


    public function count(){
        return $this->count;
    }
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $plantaciones = $this->paginate($this->Plantaciones);

        $this->set(compact('plantaciones'));
        $this->set('_serialize', ['plantaciones']);
    }

    /**
     * View method
     *
     * @param string|null $id Plantacione id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $plantacione = $this->Plantaciones->get($id, [
            'contain' => []
        ]);

        $this->set('plantacione', $plantacione);
        $this->set('_serialize', ['plantacione']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function asignar()
    {
        $data_url = $this->request->query;

        $action = $data_url['Accion'];
        $categoria= $data_url['Categoria'];
        $this->id = $data_url['id'];

        $this->set('action', $action);
        $this->set('categoria', $categoria);


        //Traigo el modelo de Emsefor
        $tablaEmsefor = $this->loadModel('Emsefor');

        $emsefor = $tablaEmsefor->find('list', [
                'keyField' => 'idemsefor',
                'valueField' => 'nombre'
            ])->toArray();

        $this->set('emsefor', $emsefor);


        //Traigo el modelo de Emsefor
        $tablaProcedencias = $this->loadModel('Procedencias');

        $procedencia = $tablaProcedencias->find('list', [
                'keyField' => 'idprocedencias',
                'valueField' => 'full_name'
            ])->toArray();

        $this->set('procedencia', $procedencia);




        $plantacione = $this->Plantaciones->newEntity();

        if ($this->request->is('post')) {
            $plantacione = $this->Plantaciones->patchEntity($plantacione, $this->request->data);
            $plantacione->rodales_idrodales = $this->id;

            if ($this->Plantaciones->save($plantacione)) {

                return $this->redirect(['controller' => 'Rodales', 'action' => 'view', '?' => ['Accion' => 'Ver Rodales', 'Categoria' => 'Rodales', 'id' => $this->id]]);
                //return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The plantacione could not be saved. Please, try again.'));
            }

        }
        $this->set(compact('plantacione'));
        $this->set('_serialize', ['plantacione']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Plantacione id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $plantacione = $this->Plantaciones->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $plantacione = $this->Plantaciones->patchEntity($plantacione, $this->request->data);
            if ($this->Plantaciones->save($plantacione)) {
                $this->Flash->success(__('The plantacione has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The plantacione could not be saved. Please, try again.'));
        }
        $this->set(compact('plantacione'));
        $this->set('_serialize', ['plantacione']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Plantacione id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $data_url = $this->request->query;

        $action = $data_url['Accion'];
        $categoria= $data_url['Categoria'];
        $id_ = $data_url['id'];
        $id_plant = $data_url['id_plan'];


        $this->request->allowMethod(['post', 'delete', 'get']);
        $tabla_plantacion = $this->loadModel('Plantaciones');

        $plantacione = $tabla_plantacion->get($id_plant);
        debug($plantacione);
        if ($this->Plantaciones->delete($plantacione)) {


        } else {
            $this->Flash->error(__('The plantacione could not be deleted. Please, try again.'));
        }

        return $this->redirect(['controller' => 'Rodales', 'action' => 'view', '?' => ['Accion' => 'Ver Rodales', 'Categoria' => 'Rodales', 'id' => $id_]]);
    }
}
