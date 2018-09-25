<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * RodalSagpya Controller
 *
 * @property \App\Model\Table\RodalSagpyaTable $RodalSagpya

 */
class RodalSagpyaController extends AppController
{

    var $id = null;

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $rodalSagpya = $this->paginate($this->RodalSagpya);

        $this->set(compact('rodalSagpya'));
        $this->set('_serialize', ['rodalSagpya']);
    }

    /**
     * View method
     *
     * @param string|null $id Rodal Sagpya id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $rodalSagpya = $this->RodalSagpya->get($id, [
            'contain' => []
        ]);

        $this->set('rodalSagpya', $rodalSagpya);
        $this->set('_serialize', ['rodalSagpya']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function asignar()
    {
          //Recupero los datos de la URL
        $data_url = $this->request->query;

        $action = $data_url['Accion'];
        $categoria= $data_url['Categoria'];
        $this->id = $data_url['id'];
        $this->set('action', $action);
        $this->set('categoria', $categoria);
        $this->set('id', $this->id);

         //Recupero las Tablas
        $RodalesTable = $this->loadModel('Rodales');
        $SagpyaTable = $this->loadModel('Sagpyas');

        $sagpya_data = $SagpyaTable->find('list')->where(['idsagpya'=> $this->id]);
        //$rodales_data = $RodalesTable->find('list');


        $rodales_data = $RodalesTable->find('list', [
                'keyField' => 'idrodales',
                'valueField' => ['idrodales', 'cod_sap', 'campo', 'uso']
            ]);

        $rodales_data->notMatching('Sagpyas', function ($q) {
                return $q->where(['RodalSagpya.sagpya_idsagpya' => $this->id]);
            });
        //$rodales_data->matching('Sagpyas');

        //$sag_rod = $SagpyaTable->find()->contain('Rodales');

        //debug($rodales_data->toArray());
        $rodalSagpya = $this->RodalSagpya->newEntity();
        if ($this->request->is('post')) {
            $rodalSagpya = $this->RodalSagpya->patchEntity($rodalSagpya, $this->request->data);

            //Asigno el valor del Sagpya Actual
            $rodalSagpya->sagpya_idsagpya = $this->id;


            if ($this->RodalSagpya->save($rodalSagpya)) {



                 return $this->redirect(['action' => 'asignar', '?' => ['Accion' => 'Ver Sagpya', 'Categoria' => 'Sagpya', 'id' => $this->id]]);

            } else {
                $this->Flash->error(__('The rodal sagpya could not be saved. Please, try again.'));
            }

        }
        $this->set(compact('rodalSagpya'));
        $this->set('_serialize', ['rodalSagpya']);
         $this->set('sagpya', $sagpya_data);
         $this->set('rodales', $rodales_data);

        $this->render('asignar');
    }

    /**
     * Edit method
     *
     * @param string|null $id Rodal Sagpya id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $rodalSagpya = $this->RodalSagpya->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $rodalSagpya = $this->RodalSagpya->patchEntity($rodalSagpya, $this->request->data);
            if ($this->RodalSagpya->save($rodalSagpya)) {
                $this->Flash->success(__('The rodal sagpya has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The rodal sagpya could not be saved. Please, try again.'));
        }
        $this->set(compact('rodalSagpya'));
        $this->set('_serialize', ['rodalSagpya']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Rodal Sagpya id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($uu = null)
    {
          //Recupero los datos de la URL
        $data_url = $this->request->query;

        $id_rodal = $data_url['id_rodal'];
        $id_sagpya = $data_url['id_sagpya'];

        $this->request->allowMethod(['post', 'delete']);

        $query = $this->RodalSagpya->query();

        $stmt = $query->delete()
            ->where(['sagpya_idsagpya' => $id_sagpya, 'rodales_idrodales' => $id_rodal])
            ->execute();

        $rowCount = count($stmt);
        $rowCount = $stmt->rowCount();

        if($rowCount >= 1){
            return $this->redirect(['controller' => 'Sagpyas', 'action' => 'view', '?' => ['Accion' => 'Ver Sagpya', 'Categoria' => 'Sagpya', 'id' => $id_sagpya]]);
        } else {
              //Aca debo marcar el erros
        }
    }


}
