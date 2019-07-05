<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Layersconfigstyle Controller
 *
 * @property \App\Model\Table\LayersconfigstyleTable $Layersconfigstyle
 */
class LayersconfigstyleController extends AppController
{

    public function isAuthorized($user)
    {
        if(isset($user['role']) and $user['role'] === 'user')
        {
            if(in_array($this->request->action, ['index', 'getCountLayers']))
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
        //Obtengo los datos de la tabla
        $action = $data_url['Accion'];
        $categoria = $data_url['Categoria'];

        $layersconfig = $this->Layersconfigstyle->find('all', []);

        $this->set(compact('layersconfig'));
        $this->set('_serialize', ['layersconfig']);
        $this->set('action', $action);
        $this->set('categoria', $categoria);


    }

    public function add()
    {
        //Recupero los datos de la URL
        $data_url = $this->request->query;
        //Obtengo los datos de la tabla
        $action = $data_url['Accion'];
        $categoria = $data_url['Categoria'];

        //$seccion = ['index' => 'index', 'otro' => 'otro'];
        //$clasificacion = ['unico' => 'unico', 'clasificado' => 'clasificado'];
        $paleta = ['aleatorio' => 'aleatorio'];

        $layersconfig = $this->Layersconfigstyle->newEntity();

        //Creo un array donde se va a especificar el tipo de variable a elegir para clasificar
        $array_var_rodal = ['cod_sap' => 'cod_sap', 'campo' => 'campo', 'uso' => 'uso', 'finalizado' => 'finalizado', 'empresa' => 'empresa',
            'procedencia' => 'procedencia', 'sagpya' => 'sagpya'];

        //Obtengo las configuraciones ya cargadas y elimino el ya usado
        $layerconf_table = $this->Layersconfigstyle->find('all');

        $new_array_to_mostrar = [];

        foreach ($array_var_rodal as $arr_var){
            $exist_var = false;

            foreach ($layerconf_table as $ltable){

                if($ltable->campo_clasified === $arr_var){
                    $exist_var = true;
                }
            }

            if($exist_var === false){
                $new_array_to_mostrar[strval($arr_var)] = $arr_var;

            }

        }

        if ($this->request->is('post')) {
            $layersconfig = $this->Layersconfigstyle->patchEntity($layersconfig, $this->request->data);



            if ($this->Layersconfigstyle->save($layersconfig)) {


                return $this->redirect(['action' => 'index', '?' => ['Accion' => 'Ver Configuracion Layers', 'Categoria' => 'Mapa']]);
            }
            $this->Flash->error(__('La Configuración no se pudo guardar. Intente nuevamente.'));
        }



        $this->set('action', $action);
        $this->set('categoria', $categoria);
        $this->set('paleta', $paleta);
        $this->set('var_class', $new_array_to_mostrar);
    }


    public function edit()
    {
        //Recupero los datos de la URL
        $data_url = $this->request->query;
        //Obtengo los datos de la tabla
        $action = $data_url['Accion'];
        $categoria = $data_url['Categoria'];
        $id = $data_url['id'];

        //$seccion = ['index' => 'index', 'otro' => 'otro'];
        //$clasificacion = ['unico' => 'unico', 'clasificado' => 'clasificado'];
        $paleta = ['aleatorio' => 'aleatorio'];

        $layersconfig = $this->Layersconfigstyle->get($id, [
            'contain' => []
        ]);

        //Creo un array donde se va a especificar el tipo de variable a elegir para clasificar
        $array_var_rodal = ['cod_sap' => 'cod_sap', 'campo' => 'campo', 'uso' => 'uso', 'finalizado' => 'finalizado', 'empresa' => 'empresa',
            'procedencia' => 'procedencia', 'sagpya' => 'sagpya'];

        //Obtengo las configuraciones ya cargadas y elimino el ya usado
        $layerconf_table = $this->Layersconfigstyle->find('all');


        if ($this->request->is(['patch', 'post', 'put'])) {

            $layersconfig = $this->Layersconfigstyle->patchEntity($layersconfig, $this->request->data);


            if ($this->Layersconfigstyle->save($layersconfig)) {


                return $this->redirect(['action' => 'index', '?' => ['Accion' => 'Ver Configuracion Layers', 'Categoria' => 'Mapa']]);
            }
            $this->Flash->error(__('La Configuración no se pudo guardar. Intente nuevamente.'));
        }


        $this->set('action', $action);
        $this->set('categoria', $categoria);
        $this->set('paleta', $paleta);
        $this->set('layersconfig', $layersconfig);
        $this->set('var_class', $array_var_rodal);
    }


    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $layersconfig = $this->Layersconfigstyle->get($id);

        try{
            if ($this->Layersconfigstyle->delete($layersconfig)) {
                $this->Flash->success(__('La Configuración ha sido eliminada.'));
                return $this->redirect(['action' => 'index', '?' => ['Accion' => 'Ver Configuracion Layers', 'Categoria' => 'Mapa']]);
            } else {
                $this->Flash->error(__('La Ver Configuracion Layers no pudo ser eliminada. Intente nuevamente.'));
            }
        }catch(\PDOException $e){
            $this->Flash->error(__($e->getMessage()));
            $this->Flash->error(__('La Configuración no pudo ser eliminada. Intente nuevamente.'));
            return $this->redirect(['action' => 'index', '?' => ['Accion' => 'Ver Configuracion Layers', 'Categoria' => 'Mapa']]);
        }
    }


    public function getCountLayers()
    {

    }

}
