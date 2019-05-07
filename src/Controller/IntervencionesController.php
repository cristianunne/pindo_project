<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Time;

/**
 * Intervenciones Controller
 *
 * @property \App\Model\Table\IntervencionesTable $Intervenciones
 */
class IntervencionesController extends AppController
{

    public function isAuthorized($user)
    {
        if(isset($user['role']) and $user['role'] === 'user')
        {
            if(in_array($this->request->action, ['view', 'edit', 'verInfoIntervencion', 'editInfoIntervencion', 'delete']))
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
        $intervenciones = $this->paginate($this->Intervenciones);

        $this->set(compact('intervenciones'));
        $this->set('_serialize', ['intervenciones']);
    }

    /**
     * View method
     *
     * @param string|null $id Intervencione id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $intervencione = $this->Intervenciones->get($id, [
            'contain' => []
        ]);

        $this->set('intervencione', $intervencione);
        $this->set('_serialize', ['intervencione']);
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

        $this->set('action', $action);
        $this->set('categoria', $categoria);

              //Traigo el modelo de Emsefor
        $tablaEmsefor = $this->loadModel('Emsefor');

        $emsefor = $tablaEmsefor->find('list', [
                'keyField' => 'idemsefor',
                'valueField' => 'nombre'
            ])->toArray();

        $this->set('emsefor', $emsefor);

        //Traigo el modelo de Rodales para obtener el codigo SAP
        $tablaRodales = $this->loadModel('Rodales');
        $rodales =$tablaRodales->get($id_rodal, [
            'contain' => []
        ]);
        $cod_sap = $rodales->cod_sap;


        $intervenciones = $this->Intervenciones->newEntity();

        if ($this->request->is('post')) {
            $intervenciones = $this->Intervenciones->patchEntity($intervenciones, $this->request->data);
            $intervenciones->rodales_idrodales = $id_rodal;

            if ($this->Intervenciones->save($intervenciones)) {

                //Si el tipo de Intervencion es Raleo o Talarraza debo agregar un Inventario

                $tablaInventario = $this->loadModel('Inventario');

                if ($intervenciones->tipo_intervencion == 'RALEO'){

                    //Creo la Entidad Inventario
                    $inventario = $tablaInventario->newEntity();
                    $inventario->intervencion_idintervencion = $intervenciones->idintervencion;
                    $inventario->rodales_idrodales = $id_rodal;
                    $inventario->emsefor_idemsefor = $intervenciones->emsefor_idemsefor;
                    $inventario->tipo_inventario = 'INTERVENCION';
                    $inventario->fecha = Time::now();
                    $inventario->cod_sap = $cod_sap;

                    //Deberia descontar el N° de Arboles tmb

                    if ($tablaInventario->save($inventario)){
                        $this->Flash->success(__('Se ha agregado también un Inventario. Por Favor Verifique.'));
                    }


                }
                $this->Flash->success(__('La intervención ha sido Guardada.'));

                return $this->redirect(['controller' => 'Rodales', 'action' => 'view', '?' => ['Accion' => 'Ver Rodales', 'Categoria' => 'Rodales', 'id' => $id_rodal]]);
            }
            $this->Flash->error(__('The intervencione could not be saved. Please, try again.'));
        }
        $this->set(compact('intervenciones'));
        $this->set('_serialize', ['intervenciones']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Intervencione id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit()
    {

        $data_url = $this->request->query;

        $action = $data_url['Accion'];
        $categoria= $data_url['Categoria'];
        $id = $data_url['id'];
        $id_rodal = $data_url['id_rodal'];

        $this->set('action', $action);
        $this->set('categoria', $categoria);
        $this->set('id_rodal', $id_rodal);

        $intervenciones = $this->Intervenciones->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $intervenciones = $this->Intervenciones->patchEntity($intervenciones, $this->request->data);
            if ($this->Intervenciones->save($intervenciones)) {

                return $this->redirect(['controller' => 'Rodales', 'action' => 'view', '?' => ['Accion' => 'Ver Rodales', 'Categoria' => 'Rodales', 'id' => $id_rodal]]);

            }
            $this->Flash->error(__('The intervencione could not be saved. Please, try again.'));
        }
        $this->set(compact('intervenciones'));
        $this->set('_serialize', ['intervenciones']);

         //Traigo el modelo de Emsefor
        $tablaEmsefor = $this->loadModel('Emsefor');

        $emsefor = $tablaEmsefor->find('list', [
                'keyField' => 'idemsefor',
                'valueField' => 'nombre'
            ])->toArray();

        $this->set('emsefor', $emsefor);
    }

    /**
     * Delete method
     *
     * @param string|null $id Intervencione id.
     * @return \Cake\Http\Response
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $data_url = $this->request->query;
        $action = $data_url['Accion'];
        $categoria= $data_url['Categoria'];
        $id_rodal = $data_url['id_rodal'];

        $this->set('action', $action);
        $this->set('categoria', $categoria);
        $this->set('id_rodal', $id_rodal);

        $this->request->allowMethod(['post', 'delete', 'get']);
        $intervencione = $this->Intervenciones->get($id);
        if ($this->Intervenciones->delete($intervencione)) {

                $this->Flash->success(__('La Intervención ha sido eliminada.'));

              return $this->redirect(['controller' => 'Rodales', 'action' => 'view', '?' => ['Accion' => 'Ver Rodales', 'Categoria' => 'Rodales', 'id' => $id_rodal]]);
        } else {
            $this->Flash->error(__('The intervencione could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function addInfoIntervencion()
    {
        $data_url = $this->request->query;

        $action = $data_url['Accion'];
        $categoria= $data_url['Categoria'];
        $id_inter = $data_url['id'];
        $id_rodal = $data_url['id_rodal'];

        $this->set('action', $action);
        $this->set('categoria', $categoria);
        $this->set('id_rodal', $id_rodal);

        //Traigo el modelo de Rodales para obtener el codigo SAP
        $tablaRodales = $this->loadModel('Rodales');
        $rodales =$tablaRodales->get($id_rodal, [
            'contain' => []
        ]);

        $cod_sap = $rodales->cod_sap;
        $this->set('cod_sap', $cod_sap);

        //Traigo el modelo de InfoIntervencion
        $tablaInfoIntervencion = $this->loadModel('InfoIntervencion');

        $infoIntervenciones = $tablaInfoIntervencion->newEntity();

          if ($this->request->is(['patch', 'post', 'put'])) {
            $infoIntervenciones = $tablaInfoIntervencion->patchEntity($infoIntervenciones, $this->request->data);
            $infoIntervenciones->intervencion_idintervencion = $id_inter;
            $infoIntervenciones->cod_sap = $cod_sap;

            if ($tablaInfoIntervencion->save($infoIntervenciones)) {

                $this->Flash->success(__('La Información de la Intervención ha sido Guardada.'));

                return $this->redirect(['controller' => 'Rodales', 'action' => 'view', '?' => ['Accion' => 'Ver Rodales', 'Categoria' => 'Rodales', 'id' => $id_rodal]]);
            }
            $this->Flash->error(__('The intervencione could not be saved. Please, try again.'));
        }
        $this->set(compact('infoIntervenciones'));
        $this->set('_serialize', ['infoIntervenciones']);

    }

    public function verInfoIntervencion()
    {

        $data_url = $this->request->query;

        $action = $data_url['Accion'];
        $categoria= $data_url['Categoria'];
        $id_inter = $data_url['id'];
        $id_rodal = $data_url['id_rodal'];

        $this->set('action', $action);
        $this->set('categoria', $categoria);
        $this->set('id_inter', $id_inter);
        $this->set('id_rodal', $id_rodal);
        //Traigo la información de la Intervención También y la muestro
        $intervenciones = $this->Intervenciones->find('all',[
            'conditions' => ['Intervenciones.rodales_idrodales' => $id_rodal, 'Intervenciones.idintervencion' => $id_inter]
        ]);

        $this->set('intervenciones', $intervenciones);
        $this->set('_serialize', ['intervenciones']);


        //Traigo el modelo de InfoIntervencion
        $tablaInfoIntervencion = $this->loadModel('InfoIntervencion');
        $infoIntervencion = $tablaInfoIntervencion->find('all', [
            'conditions' => ['intervencion_idintervencion' => $id_inter]
        ]);

        $this->set('infoIntervencion', $infoIntervencion);
        $this->set('_serialize', ['infoIntervencion']);

    }

    public function editInfoIntervencion()
    {
        $data_url = $this->request->query;

        $action = $data_url['Accion'];
        $categoria= $data_url['Categoria'];
        $id_inter = $data_url['id'];
        $id_rodal = $data_url['id_rodal'];

        $this->set('action', $action);
        $this->set('categoria', $categoria);
        $this->set('id_inter', $id_inter);
        $this->set('id_rodal', $id_rodal);

        //Traigo el modelo de InfoIntervencion
        $tablaInfoIntervencion = $this->loadModel('InfoIntervencion');

        $infoIntervenciones = $tablaInfoIntervencion->get($id_inter, [
            'contain' => []
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $infoIntervenciones = $tablaInfoIntervencion->patchEntity($infoIntervenciones, $this->request->data);
            $infoIntervenciones->intervencion_idintervencion = $id_inter;

            if ($tablaInfoIntervencion->save($infoIntervenciones)) {
                $this->Flash->success(__('La Información de la Intervención ha sido Guardada.'));

                return $this->redirect(['action' => 'verInfoIntervencion', '?' => ['Accion' => 'Ver Intervención', 'Categoria' => 'Rodales', 'id' => $id_inter, 'id_rodal' => $id_rodal]]);
            }
            $this->Flash->error(__('The intervencione could not be saved. Please, try again.'));
        }
        $this->set(compact('infoIntervenciones'));
        $this->set('_serialize', ['infoIntervenciones']);




    }

}
