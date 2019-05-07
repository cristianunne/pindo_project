<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Inventario Controller
 *
 * @property \App\Model\Table\InventarioTable $Inventario
 */
class InventarioController extends AppController
{

    public function isAuthorized($user)
    {
        if(isset($user['role']) and $user['role'] === 'user')
        {
            if(in_array($this->request->action, ['edit']))
            {
                return true;
            }
        }

        return parent::isAuthorized($user);
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $inventario = $this->paginate($this->Inventario);

        $this->set(compact('inventario'));
        $this->set('_serialize', ['inventario']);
    }

    /**
     * View method
     *
     * @param string|null $id Inventario id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $inventario = $this->Inventario->get($id, [
            'contain' => []
        ])->order(['idinventario' => 'ASC']);

        $this->set('inventario', $inventario);
        $this->set('_serialize', ['inventario']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $data_url = $this->request->query;

        $action = $data_url['Accion'];
        $categoria= $data_url['Categoria'];
        $id_rodal = $data_url['id'];
        $cod_sap = $data_url['cod_sap'];

        $this->set('action', $action);
        $this->set('categoria', $categoria);
        $this->set('id_rodal', $id_rodal);
        $this->set('cod_sap', $cod_sap);


               //Traigo el modelo de Emsefor
        $tablaEmsefor = $this->loadModel('Emsefor');



        $emsefor = $tablaEmsefor->find('list', [
                'keyField' => 'idemsefor',
                'valueField' => 'nombre'
            ])->toArray();

        $this->set('emsefor', $emsefor);

        //Obtengo las intervenciones segun el id del rodal
        $tablaIntervenciones = $this->loadModel('Intervenciones');
        $intervenciones = $tablaIntervenciones->find('list', [
            'keyField' => 'idintervencion',
            'valueField' => ['nro', 'tipo_intervencion']
        ])->where(['rodales_idrodales' => $id_rodal])
            ->toArray();

        $this->set('intervenciones', $intervenciones);

        $inventario = $this->Inventario->newEntity();
        if ($this->request->is('post')) {
            $inventario = $this->Inventario->patchEntity($inventario, $this->request->data);
            //Asigno el Numero de Rodal
            $inventario->rodales_idrodales = $id_rodal;
            $inventario->cod_sap = $cod_sap;


            if ($this->Inventario->save($inventario)) {
                    $this->Flash->success(__('El Inventario ha sido Agregado.'));

                 return $this->redirect(['controller' => 'Rodales', 'action' => 'view', '?' => ['Accion' => 'Ver Rodales', 'Categoria' => 'Rodales', 'id' => $id_rodal]]);
            }
            $this->Flash->error(__('The inventario could not be saved. Please, try again.'));
        }
        $this->set(compact('inventario'));
        $this->set('_serialize', ['inventario']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Inventario id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit()
    {

        $data_url = $this->request->query;

        $action = $data_url['Accion'];
        $categoria= $data_url['Categoria'];
        $id_inv = $data_url['id'];
        $id_rodal = $data_url['id_rodal'];
        $cod_sap = $data_url['cod_sap'];

        $this->set('action', $action);
        $this->set('categoria', $categoria);
        $this->set('id_rodal', $id_rodal);
        $this->set('id_inv', $id_inv);
        $this->set('cod_sap', $cod_sap);

        $inventario = $this->Inventario->get($id_inv, [
            'contain' => []
        ]);

          //Traigo el modelo de Emsefor
        $tablaEmsefor = $this->loadModel('Emsefor');

        $emsefor = $tablaEmsefor->find('list', [
                'keyField' => 'idemsefor',
                'valueField' => 'nombre'
            ])->toArray();

        $this->set('emsefor', $emsefor);

        //Obtengo las intervenciones segun el id del rodal
        $tablaIntervenciones = $this->loadModel('Intervenciones');
        $intervenciones = $tablaIntervenciones->find('list', [
            'keyField' => 'idintervencion',
            'valueField' => ['nro', 'tipo_intervencion']
        ])->where(['rodales_idrodales' => $id_rodal])
            ->toArray();

        $this->set('intervenciones', $intervenciones);



        if ($this->request->is(['patch', 'post', 'put'])) {
            $inventario = $this->Inventario->patchEntity($inventario, $this->request->data);
            if ($this->Inventario->save($inventario)) {
                $this->Flash->success(__('El inventario ha sido Editado'));

                return $this->redirect(['controller' => 'Rodales', 'action' => 'view', '?' => ['Accion' => 'Ver Rodales', 'Categoria' => 'Rodales', 'id' => $id_rodal]]);
            }
            $this->Flash->error(__('El Inventario no puede ser guardado. Intente Nuevamente.'));
        }
        $this->set(compact('inventario'));
        $this->set('_serialize', ['inventario']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Inventario id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $data_url = $this->request->query;

        $action = $data_url['Accion'];
        $categoria= $data_url['Categoria'];
        $id_rodal = $data_url['id_rodal'];

        $this->request->allowMethod(['post', 'delete', 'get']);
        $inventario = $this->Inventario->get($id);
        if ($this->Inventario->delete($inventario)) {

            $this->Flash->success(__('El Inventario ha sido eliminado.'));
            return $this->redirect(['controller' => 'Rodales', 'action' => 'view', '?' => ['Accion' => 'Ver Rodales', 'Categoria' => 'Rodales', 'id' => $id_rodal]]);
        } else {
            $this->Flash->error(__('The inventario could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
