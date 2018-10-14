<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\Exception\RecordNotFoundException;

/**
 * Rodales Controller
 *
 * @property \App\Model\Table\RodalesTable $Rodales
 */
class RodalesController extends AppController
{


        //Recibe como parametro el usuario autentifiado
    //En cada controlador, vuelvo a crear este metodo y le paso los permisos a las acciones que uiero

    public function isAuthorized($user)
    {
        if(isset($user['role']) and $user['role'] === 'user')
        {
            if(in_array($this->request->action, ['index', 'add', 'edit', 'view']))
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
        $rodales = $this->Rodales->find('all')->contain(['Empresa'])->order(['idrodales' => 'ASC']);

        //debug($rodales);


        //Recupero los datos de la URL
        $data_url = $this->request->query;

        $action = $data_url['Accion'];
        $categoria= $data_url['Categoria'];

        $this->set(compact('rodales'));


        $this->set('action', $action);
        $this->set('categoria', $categoria);
    }





    /**
     * View method
     *
     * @param string|null $id Rodale id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view()
    {

        $data_url = $this->request->query;

        $action = $data_url['Accion'];
        $categoria= $data_url['Categoria'];
        $id = $data_url['id'];

        $this->set('action', $action);
        $this->set('categoria', $categoria);
        $this->set('id_rodal', $id);




        /*$rodale = $this->Rodales->find('all', [
        ])->where(['idrodales' => $id]);*/

        $rodale = $this->Rodales->get($id, []);

        $empresa = $this->Rodales->Empresa->get($rodale->empresa_idempresa, [
            'contain' => []
        ]);



        $this->set('rodale', $rodale);
        $this->set('_serialize', ['rodale']);

        $this->set('empresa', $empresa);

        //Plantación debo condicionar si existe para traer las demas

        /*$plantaciones = $this->Rodales->Plantaciones->find('all', [
            'contain' => []
        ])->toArray();*/

        try{
            $plantaciones = $this->Rodales->get($id, [
                'contain' => ['Plantaciones']
            ]);
        } catch (RecordNotFoundException $e){
            $plantaciones = null;
        }


        /*$plantaciones = $this->Rodales->find('all', [])
            ->where(['idrodales' => $id])
            ->contain(['Plantaciones'])->toArray();*/



        $plant_count = 0;
        if (isset($plantaciones->plantacione)) {
            $array = (array) $plantaciones->plantacione;

            $plant_count = count($array);
        }


        $this->set('plant_count', $plant_count);


        $this->set('plantaciones', $plantaciones);
        $this->set('_serialize', ['plantaciones']);

        if($plant_count > 0)
        {

             //Recupero los datos de las procedencias
             //Ingreso al primer objeto para obtener los resultados
            $procedencias = $this->Rodales->Plantaciones->Procedencias->get($plantaciones->plantacione->procedencias_idprocedencias, [
                'contain' => ['Plantaciones']
            ]);

            //debug($procedencias);

            $this->set('procedencias', $procedencias);

            $this->set('_serialize', ['procedencias']);

            //Obtengo los datos de la emsefor

            $emsefor = $this->Rodales->Plantaciones->Emsefor->get($plantaciones->plantacione->emsefor_idemsefor);
            $this->set('emsefor', $emsefor);

            $this->set('_serialize', ['emsefor']);

            //Obtengo las Intervenciones y se la mando
            /**$intervencion = $this->Rodales->get($id, [
                'contain' => ['Intervenciones']
            ]);*/
            $IntervencionTable = $this->loadModel('Intervenciones');

            $intervencion = $IntervencionTable->find('all',[
                'conditions' => ['Intervenciones.rodales_idrodales' => $id]])
            ->contain('Emsefor');



            $this->set('intervencion', $intervencion);

            $this->set('_serialize', ['intervencion']);

            //Traer los Inventarios del actual Rodal

            //Obtengo las Intervenciones y se la mando
            $inventario = $this->Rodales->get($id, [
                'contain' => ['Inventario' => ['Emsefor', 'Intervenciones']]
            ]);

            //debug($inventario);

            $this->set('inventario', $inventario);

            $this->set('_serialize', ['inventario']);



        } else {
            $intervencion = null;
            $this->set('intervencion', $intervencion);
            $this->set('_serialize', ['intervencion']);

            $inventario = null;
            $this->set('inventario', $inventario);
            $this->set('_serialize', ['inventario']);

        }







       // debug($emsefor);

        //Con el COUNT puedo saber si el arreglo no esta vacio
        //debug(count($plantaciones));
        //debug($plantaciones);

    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        //Traigo el modelo de EMPRESA
        //$empre = $this->loadModel('Empresa');


          //Recupero los datos de la URL
        $data_url = $this->request->query;

        $action = $data_url['Accion'];
        $categoria= $data_url['Categoria'];

        $this->set('action', $action);
        $this->set('categoria', $categoria);

        $rodale = $this->Rodales->newEntity();


        if ($this->request->is('post')) {
            $rodale = $this->Rodales->patchEntity($rodale, $this->request->data);


            if ($this->Rodales->save($rodale)) {


                return $this->redirect(['action' => 'index', '?' => ['Accion' => 'Ver Rodales', 'Categoria' => 'Rodales']]);
            }
            $this->Flash->error(__('The rodale could not be saved. Please, try again.'));
        }


        $empresa = $this->Rodales->Empresa->find('list', [
                'keyField' => 'idempresa',
                'valueField' => 'nombre'
            ])->toArray();

        //$empresa = $empre->find('all')->select(['idempresa, nombre'])->toArray();

       /* $query = $empre->find('list', [
                'keyField' => 'idempresa',
                'valueField' => 'nombre'

            ]);

        $empresa = $query->toArray();*/
        $this->set('empresa', $empresa);

    }

    /**
     * Edit method
     *
     * @param string|null $id Rodale id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit()
    {
        //Traigo el modelo de EMPRESA
        $empre = $this->loadModel('Empresa');
        //Recupero los datos de la URL
        $data_url = $this->request->query;

        $action = $data_url['Accion'];
        $categoria= $data_url['Categoria'];
        $id = $data_url['id'];

        $this->set('action', $action);
        $this->set('categoria', $categoria);


        $rodale = $this->Rodales->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $rodale = $this->Rodales->patchEntity($rodale, $this->request->data);
            if ($this->Rodales->save($rodale)) {

                 $this->Flash->set('/pindo_project/Rodales?Accion=Ver+Rodales&Categoria=Rodales', ['element' => 'success_2']);


                //return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The empresa could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('rodale'));
        $this->set('_serialize', ['rodale']);

        $query = $empre->find('list', [
                'keyField' => 'idempresa',
                'valueField' => 'nombre'

            ]);

        $empresa = $query->toArray();
        $this->set('empresa', $empresa);

    }

    /**
     * Delete method
     *
     * @param string|null $id Rodale id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $rodale = $this->Rodales->get($id);
        if ($this->Rodales->delete($rodale)) {
            $this->Flash->success(__('The rodale has been deleted.'));
        } else {
            $this->Flash->error(__('The rodale could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
