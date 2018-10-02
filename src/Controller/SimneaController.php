<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Model\Entity\MaqespCatop;
use Cake\I18n\Time;


/**
 * Simnea Controller
 *
 */
class SimneaController extends AppController
{


    //Metodo que permite simular

    public function isAuthorized($user)
    {
        if(isset($user['role']) and $user['role'] === 'user')
        {
            if(in_array($this->request->action, ['simular',]))
            {
                return true;
            }
        }

        return parent::isAuthorized($user);
    }


    public function simular()
    {
        $data_url = $this->request->query;
        $action = $data_url['Accion'];
        $categoria= $data_url['Categoria'];

        $this->set('action', $action);
        $this->set('categoria', $categoria);

        //1ro verifico que los parametos Insumos se hayan cargado
        $varInsumosTable = $this->loadModel('Insumos');

        $varInsumoa = $varInsumosTable->find('all', [
            'contain' => []
        ])->toArray();

        $is_insumos = false;

        if (!empty($varInsumoa)){
            $is_insumos = true;
        }

        $this->set('is_insumos', $is_insumos);

        //Consulto que existan Modelos Disponibles
        $is_modelos = false;

        $modelosTable = $this->loadModel('Modelos');
        $varModelos = $modelosTable->find('all',[
            'contain' => []
        ])->toArray();

        if (!empty($varModelos)){
            $is_modelos = true;
        }
        $this->set('is_modelos', $is_modelos);


        //1ro seleccionar el Rodal, por ello obtengo la tabla Rodal
        $tablaRodales = $this->loadModel('Rodales');

        //Tengo que verificar que los rodales tengan toda la información necesaria para ingresar al simulador
        $rodales = $tablaRodales->find('all',[
            'conditions' => ['finalizado' => false]
        ])->contain(['Empresa', 'Plantaciones']);

        $this->set('rodales', $rodales);




    }

    public function sitio($idrodal = null)
    {

        $data_url = $this->request->query;
        $action = $data_url['Accion'];
        $categoria= $data_url['Categoria'];

        $this->set('action', $action);
        $this->set('categoria', $categoria);
        $this->set('idrodal', $idrodal);

        //1ro seleccionar el Rodal, por ello obtengo la tabla Rodal
        $tablaRodales = $this->loadModel('Rodales');

        $rodales = $tablaRodales->get($idrodal, [
            'contain' => ['Plantaciones' => ['Procedencias']]
        ]);

        //Traigo la tabla Inventario


        $inventario = $tablaRodales->Inventario->find('all', [
            'conditions' => ['rodales_idrodales' => $idrodal],
            'limit' => 1,
            'order' => ['idinventario' => 'DESC']
        ])->toArray();


        //Le paso el primer objeto obtenido de la consulta
        if (isset($inventario)) {

            if (array_key_exists(0, $inventario)){
                $inventario = $inventario[0];
            }

        }



        $this->set('inventario', $inventario);
        $this->set('rodales', $rodales);

        //ENVIAR LA ESPECIE GUARDADA EN PROCEDENCIAS  RODALES->PLANTACIONES->PROCEDENCIAS

        if ($this->request->is('post')){

            //Guardo los datos del sitio en la session
            $session = $this->request->session();
            $session->write([
                'Datos.sitio' => $this->request->data,
                'Datos.sitio.idrodal' => $idrodal
            ]);

            //Me dirijo a la siguiente URL que me permite seleccionar el Modo de Produccion
            return $this->redirect(['action' => 'sistemaCosecha', '?' => ['Accion' => 'Simular', 'Categoria' => 'SIMNEA']]);

        }

    }

    public function sistemaCosecha()
    {
        $data_url = $this->request->query;
        $action = $data_url['Accion'];
        $categoria= $data_url['Categoria'];

        $this->set('action', $action);
        $this->set('categoria', $categoria);

        $session = $this->request->session();
        $datos_sitio = $session->read('Datos.sitio');

        //compruebo que los datos de la session no esten vacios
        if (empty($datos_sitio)){

            $this->Flash->error(__('Debido al tiempo de Inactividad, se ha cerrado la Sesión y sus datos temporales de simulación han sido eliminados. Vuelva a repetir los pasos.'));
            return $this->redirect(['action' => 'simular', '?' => ['Accion' => 'Simular', 'Categoria' => 'SIMNEA']]);
        }



        //Consultar la Tabla modelos y obtener solo las operaciones no agrupadas
        $tablaModelos = $this->loadModel('Modelos');

        $sistemas_cosecha = $tablaModelos->find('list', [
            'keyField' => 'operacion',
            'valueField' => 'operacion',
            'group' => 'operacion',
            'order' => ['operacion' => 'ASC']
        ])->toArray();

        $this->set('sistemas_cosecha', $sistemas_cosecha);

        if ($this->request->is('post')){

            //Guardo los datos del sitio en la session
            $session = $this->request->session();
            $session->write([
                'Datos.sistema_cosecha' => $this->request->data
            ]);

            //Me dirijo a la siguiente URL que me permite seleccionar el Modo de Produccion
            //Siguiente seroa elegir las EMSEFOR a SIMULAR
            return $this->redirect(['action' => 'emseforSelect', '?' => ['Accion' => 'Simular', 'Categoria' => 'SIMNEA']]);

        }

    }

    public function emseforSelect()
    {

        $data_url = $this->request->query;
        $action = $data_url['Accion'];
        $categoria= $data_url['Categoria'];

        $this->set('action', $action);
        $this->set('categoria', $categoria);

        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        $session = $this->request->session();
        $datos_sitio = $session->read('Datos.sitio');

        //compruebo que los datos de la session no esten vacios
        if (empty($datos_sitio)){

            $this->Flash->error(__('Debido al tiempo de Inactividad, se ha cerrado la Sesión y sus datos temporales de simulación han sido eliminados. Vuelva a repetir los pasos.'));
            return $this->redirect(['action' => 'simular', '?' => ['Accion' => 'Simular', 'Categoria' => 'SIMNEA']]);
        }
        //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

        //Accedo a las EMSEFOR

        $tablaEmsefor = $this->loadModel('Emsefor');
        $query = $tablaEmsefor->find();
        /*$query = $tablaEmsefor->find();
        $resulEmsefor = $query->select([
            'count' => $query->func()->count('*'),
            'nombre' => 'nombre'
        ])->innerJoinWith('EmsMaq')
            ->group('nombre')->toArray();*/

        $emsefor = $tablaEmsefor->find('all', [

            'count' => $query->func()->count('*'),
            'idemsefor' => 'idemsefor'

        ])->innerJoinWith('EmsMaq')
            ->group('idemsefor')
            ->order('idemsefor');


        $this->set('emsefor', $emsefor);


        if ($this->request->is('post')){
            if (!empty($this->request->data)){

                //debug($this->request->data);
                $arreglo_ems = [];
                $id_emsefor = null;
                //recorro el reques data y guardo en la session solo 1 emsefor
                foreach ($this->request->data as $data){
                    if ($data != 0){
                        $arreglo_ems["ems_check"] = $data;
                        $id_emsefor = $data;
                    }
                }

                $session = $this->request->session();
                $session->write([
                    'Datos.emsefor' => $arreglo_ems
                ]);


                //Dependiendo de Cosecha voy a un metodo u otro
                $cosecha = $session->read('Datos.sistema_cosecha.cosecha');

                if (!is_null($cosecha)){

                    if ($cosecha === 'Cut to lenght'){
                        return $this->redirect(['action' => 'maquinaSelectCut',$id_emsefor, '?' => ['Accion' => 'Simular', 'Categoria' => 'SIMNEA']]);
                    } elseif ($cosecha === 'Full-tree'){
                        return $this->redirect(['action' => 'maquinaSelectFull',$id_emsefor, '?' => ['Accion' => 'Simular', 'Categoria' => 'SIMNEA']]);
                    }


                }
            } else {
                $this->Flash->error(__('Seleccione al menos 1 Emsefor'));
                return $this->redirect(['action' => 'emseforSelect', '?' => ['Accion' => 'Simular', 'Categoria' => 'SIMNEA']]);
            }

            //return $this->redirect(['action' => 'emseforSelect', '?' => ['Accion' => 'Simular', 'Categoria' => 'SIMNEA']]);

        }




    }


    public function maquinaSelectCut($id_emsefor = null)
    {
        $data_url = $this->request->query;
        $action = $data_url['Accion'];
        $categoria= $data_url['Categoria'];

        $this->set('action', $action);
        $this->set('categoria', $categoria);

        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        $session = $this->request->session();
        $emsefor_select = $session->read('Datos.emsefor');
        $datos_sitio = $session->read('Datos.sitio');

        //compruebo que los datos de la session no esten vacios
        if (empty($datos_sitio)){

            $this->Flash->error(__('Debido al tiempo de Inactividad, se ha cerrado la Sesión y sus datos temporales de simulación han sido eliminados. Vuelva a repetir los pasos.'));
            return $this->redirect(['action' => 'simular', '?' => ['Accion' => 'Simular', 'Categoria' => 'SIMNEA']]);
        }
        //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

        $id_emsefor = [];

        $tablaEmsefor = $this->loadModel('Emsefor');

        foreach ($emsefor_select as $ems){

            $array['idemsefor'] = $ems;
            array_push($id_emsefor, $array);
        }


        //Traigo todos lo datos Asociados
        $emsefor_data_maq = $tablaEmsefor->find('all', [
            'conditions' => ['OR' => $id_emsefor]
        ])->contain(
            'EmsMaq', function ($q) {
            return $q
                ->contain('MaquinaEspecifica')
                ->where(['EmsMaq.tiene_datos' => true]);
        });

        //debug($emsefor_data_maq->toArray());

       //Recorro el emsefor_select con un foreach
        $this->set('emsefor_data_maq', $emsefor_data_maq);


        //Traigo la Tabla MaqespCatop y combrebo que se hayan cargado valores para la maquina especifica
        $maqespCatopTable = $this->loadModel('MaqespCatop');

        $varMaqespCatop = $maqespCatopTable->find('all', []);
        $this->set('varMaqespCatop', $varMaqespCatop);


        if($this->request->is('post')){

            //Recorro el request data
            $request_data = $this->request->data;
            $flag = false;

            //debug($request_data);

            $array_maquinas_sel = [];

            foreach ($request_data as $req){

                if($req !== '0'){
                    $flag = true;

                    //Cargar la maquina
                    array_push($array_maquinas_sel, $req);
                }
            }

            if ($flag == false){
                $this->Flash->error(__('Seleccione al menos 1 Maquina'));
            } else {

                //Agrego las maquinas a la Session
                $session = $this->request->session();
                $session->write([
                    'Datos.maquinas_select' => $array_maquinas_sel]);
                return $this->redirect(['action' => 'modeloSelect', '?' => ['Accion' => 'Simular', 'Categoria' => 'SIMNEA']]);

            }


        }

    }

    public function maquinaSelectFull($id_emsefor = null){
        $data_url = $this->request->query;
        $action = $data_url['Accion'];
        $categoria= $data_url['Categoria'];

        $this->set('action', $action);
        $this->set('categoria', $categoria);

        $session = $this->request->session();
        $emsefor_select = $session->read('Datos.emsefor');
        $datos_sitio = $session->read('Datos.sitio');

        //compruebo que los datos de la session no esten vacios
        if (empty($datos_sitio)){

            $this->Flash->error(__('Debido al tiempo de Inactividad, se ha cerrado la Sesión y sus datos temporales de simulación han sido eliminados. Vuelva a repetir los pasos.'));
            return $this->redirect(['action' => 'simular', '?' => ['Accion' => 'Simular', 'Categoria' => 'SIMNEA']]);
        }
        //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


        $id_emsefor = [];

        $tablaEmsefor = $this->loadModel('Emsefor');

        foreach ($emsefor_select as $ems){

            $array['idemsefor'] = $ems;
            array_push($id_emsefor, $array);
        }

        //Traigo todos lo datos Asociados
        $emsefor_data_maq = $tablaEmsefor->find('all', [
            'conditions' => ['OR' => $id_emsefor]
        ])->contain(
            'EmsMaq', function ($q) {
            return $q
                ->contain('MaquinaEspecifica')
                ->where(['EmsMaq.tiene_datos' => true]);
        });

        //debug($emsefor_data_maq->toArray());

        //Recorro el emsefor_select con un foreach
        $this->set('emsefor_data_maq', $emsefor_data_maq);

        //Traigo la Tabla MaqespCatop y combrebo que se hayan cargado valores para la maquina especifica
        $maqespCatopTable = $this->loadModel('MaqespCatop');

        $varMaqespCatop = $maqespCatopTable->find('all', []);
        $this->set('varMaqespCatop', $varMaqespCatop);


        if($this->request->is('post')){

            //Recorro el request data
            $request_data = $this->request->data;
            $flag = false;

            //debug($request_data);

            $array_maquinas_sel = [];

            foreach ($request_data as $req){

                if($req !== '0'){
                    $flag = true;

                    //Cargar la maquina
                    array_push($array_maquinas_sel, $req);
                }
            }

            if ($flag == false){
                $this->Flash->error(__('Seleccione al menos 1 Maquina'));
            } else {

                //Agrego las maquinas a la Session
                $session = $this->request->session();
                $session->write([
                    'Datos.maquinas_select' => $array_maquinas_sel]);
                return $this->redirect(['action' => 'modeloSelect', '?' => ['Accion' => 'Simular', 'Categoria' => 'SIMNEA']]);

            }


        }
    }

    public function modeloSelect()
    {
        //Este metodo asigna un modelo de produccion a cada maquina seleccionada
        $data_url = $this->request->query;
        $action = $data_url['Accion'];
        $categoria= $data_url['Categoria'];

        $this->set('action', $action);
        $this->set('categoria', $categoria);

        //Obtengo los id de la maquina especifica guardad en la session
        $session = $this->request->session();
        $datos_sitio = $session->read('Datos.sitio');

        //compruebo que los datos de la session no esten vacios
        if (empty($datos_sitio)){

            $this->Flash->error(__('Debido al tiempo de Inactividad, se ha cerrado la Sesión y sus datos temporales de simulación han sido eliminados. Vuelva a repetir los pasos.'));
            return $this->redirect(['action' => 'simular', '?' => ['Accion' => 'Simular', 'Categoria' => 'SIMNEA']]);
        }
        //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


        $maq_sel_select = $session->read('Datos.maquinas_select');

        $sistema_cosecha = $session->read('Datos.sistema_cosecha.sistema_cosecha');
        $cosecha = $session->read('Datos.sistema_cosecha.cosecha');

        //Si los datos de la session no estan vacios
        if (!empty($maq_sel_select)){

            //Obtengo solamente los datos de la maquina especifica
            $maq_espTable = $this->loadModel('MaquinaEspecifica');

            $id_maq_esp = [];

            foreach ($maq_sel_select as $maq_sel){

                $array['idmaquina_especifica'] = $maq_sel;
                array_push($id_maq_esp, $array);
            }


            $maq_esp_data = $maq_espTable->find('all', [
                'conditions' => ['OR' => $id_maq_esp]
            ]);

            //debug($maq_esp_data->toArray());
            $this->set('maquinas', $maq_esp_data);

            //Obtengo los Modelos y le envio al Formulario

            $modelosTable = $this->loadModel('Modelos');

            $modelosDataCorte = $modelosTable->find('list', [
                'conditions' => ['operacion' => $sistema_cosecha, 'cosecha' => $cosecha, 'tarea' => 'Corte'],
                'keyField' => 'idmodelos',
                'valueField' => ['tipo_maquina', 'modelo', 'modelo_algoritmo']
            ])->toArray();

            $this->set('modelos_corte', $modelosDataCorte);


            $modelosDataExtraccion = $modelosTable->find('list', [
                'conditions' => ['operacion' => $sistema_cosecha, 'cosecha' => $cosecha, 'tarea' => 'Extraccion'],
                'keyField' => 'idmodelos',
                'valueField' => ['tipo_maquina', 'modelo', 'modelo_algoritmo']
            ])->toArray();

            $this->set('modelos_extraccion', $modelosDataExtraccion);

            $modelosDataProceso = $modelosTable->find('list', [
                'conditions' => ['operacion' => $sistema_cosecha, 'cosecha' => $cosecha, 'tarea' => 'Proceso'],
                'keyField' => 'idmodelos',
                'valueField' => ['tipo_maquina', 'modelo', 'modelo_algoritmo']
            ])->toArray();

            $this->set('modelos_proceso', $modelosDataProceso);

            $modelosDataCarga = $modelosTable->find('list', [
                'conditions' => ['operacion' => $sistema_cosecha, 'cosecha' => $cosecha, 'tarea' => 'Carga'],
                'keyField' => 'idmodelos',
                'valueField' => ['tipo_maquina', 'modelo', 'modelo_algoritmo']
            ])->toArray();

            $this->set('modelos_carga', $modelosDataCarga);


            //procedo a consultar por el tipo de consulta y guardar los modelos

            if($this->request->is('post')){
                $array_maq_mol = $this->request->data;

                $session->write([
                    'Datos.maquina_modelo' => $array_maq_mol]);

                //Consulto por el tipo de cosecha
                if ($cosecha == "Cut to lenght"){
                    return $this->redirect(['action' => 'simularCut', '?' => ['Accion' => 'Simular', 'Categoria' => 'SIMNEA']]);

                } elseif ($cosecha == "Full-tree"){
                    return $this->redirect(['action' => 'simularFull', '?' => ['Accion' => 'Simular', 'Categoria' => 'SIMNEA']]);
                }



            }

        }
    }


    public function simularCut()
    {
        //Este metodo asigna un modelo de produccion a cada maquina seleccionada
        $data_url = $this->request->query;
        $action = $data_url['Accion'];
        $categoria= $data_url['Categoria'];

        $this->set('action', $action);
        $this->set('categoria', $categoria);

        //$this->calcularCostos();
        $session = $this->request->session();
        $sitio = $session->read('Datos.sitio');

        $superficie = $sitio['superficie'];
        $vol_medio = $sitio['vol_medio'];
        $dme = $sitio['dme'];

        $maquinasSel = $session->read('Datos.maquinas_select');
        $modsel = $session->read('Datos.maquina_modelo');

        $modelTabla = $this->loadModel('Modelos');

        $parametrosGlobalesTable = $this->loadModel('VariablesGlobales');
        $insumosTable = $this->loadModel('Insumos');
        $varGlobalesData = $parametrosGlobalesTable->find('all', [])->first();
        $insumosData = $insumosTable->find('all', [])->first();

        $array_result = $this->calcularCostos();

        //WNVIO ARRAY RESULT QUE CONTIENE LAS SIMULACIONES DE LAS MAQUINAS
        $this->set('array_result', $array_result);




        $PRODUCCION_MES_CORTE = 0;
        $PRODUCCION_MES_EXTRACCION = 0;
        $PRODUCCION_MES_PROCESO = 0;
        $PRODUCCION_MES_CARGA = 0;

        $COSTO_TOTAL_CORTE = null;
        $COSTO_TOTAL_EXTRACCION = null;
        $COSTO_TOTAL_CARGA = null;
        $COSTO_TOTAL_PROCESO = null;

        $SUMA_COSTO_TOTAL = 0;
        $SUMA_COSTO_FIJO = 0;
        $SUMA_COSTO_VARIABLE_TOTAL = 0;

        $SUMA_COSTO_MES = 0;
        $SUMA_COSTO_VARIABLE_MES = 0;



        foreach ($array_result as $result){

            if ($result['tarea'] == 'Corte'){
                $PRODUCCION_MES_CORTE = $PRODUCCION_MES_CORTE + $result['PRODUCCION_MES'];
                $COSTO_TOTAL_CORTE = $COSTO_TOTAL_CORTE + $result['COSTO_TOTAL'];

            } elseif ($result['tarea'] == 'Extraccion'){
                $PRODUCCION_MES_EXTRACCION = $PRODUCCION_MES_EXTRACCION + $result['PRODUCCION_MES'];
                $COSTO_TOTAL_EXTRACCION = $COSTO_TOTAL_EXTRACCION + $result['COSTO_TOTAL'];
            } elseif ($result['tarea'] == 'Proceso'){
                $PRODUCCION_MES_PROCESO = $PRODUCCION_MES_PROCESO + $result['PRODUCCION_MES'];
                $COSTO_TOTAL_CARGA = $COSTO_TOTAL_CARGA + $result['COSTO_TOTAL'];
            } elseif ($result['tarea'] == 'Carga'){
                $PRODUCCION_MES_CARGA = $PRODUCCION_MES_CARGA + $result['PRODUCCION_MES'];
                $COSTO_TOTAL_PROCESO = $COSTO_TOTAL_PROCESO + $result['COSTO_TOTAL'];
            }

            $SUMA_COSTO_TOTAL = $SUMA_COSTO_TOTAL + $result['COSTO_TOTAL'];
            $SUMA_COSTO_FIJO = $SUMA_COSTO_FIJO + $result['COSTO_FIJO_MES_TOTAL'];
            $SUMA_COSTO_VARIABLE_TOTAL =  $SUMA_COSTO_VARIABLE_TOTAL + $result['COSTO_VARIABLE_MES'];

            //Sumo los costos DE LOS COSTO FIJOMES Y VARIABLE
            $SUMA_COSTO_MES = $SUMA_COSTO_MES + $result['COSTO_FIJO_MES_TOTAL'];
            $SUMA_COSTO_VARIABLE_MES = $SUMA_COSTO_VARIABLE_MES + $result['COSTO_VARIABLE_MES'];
        }

        //Obtengo la actividad Limitante
        $ACTIVIDAD_LIMITANTE_CORTE = null;
        $ACTIVIDAD_LIMITANTE_EXTRACCION  = null;
        $ACTIVIDAD_LIMITANTE_PROCESO = null;
        $ACTIVIDAD_LIMITANTE_CARGA = null;

        $array_valores = [];

        if ($PRODUCCION_MES_CORTE > 0){
            array_push($array_valores, $PRODUCCION_MES_CORTE);
        }

        if ($PRODUCCION_MES_EXTRACCION > 0){
            array_push($array_valores, $PRODUCCION_MES_EXTRACCION);
        }
        if ($PRODUCCION_MES_PROCESO > 0){
            array_push($array_valores, $PRODUCCION_MES_PROCESO);
        }
        if ($PRODUCCION_MES_CARGA > 0){
            array_push($array_valores, $PRODUCCION_MES_CARGA);
        }

        $min_value = min($array_valores);

        if ($PRODUCCION_MES_CORTE == $min_value){
            $ACTIVIDAD_LIMITANTE_CORTE = 'Limitante';
        } else if($PRODUCCION_MES_CORTE > 0) {
            $ACTIVIDAD_LIMITANTE_CORTE = 'No Limitante';
        }

        if ($PRODUCCION_MES_EXTRACCION == $min_value){
            $ACTIVIDAD_LIMITANTE_EXTRACCION = 'Limitante';
        } else if($PRODUCCION_MES_EXTRACCION > 0) {
            $ACTIVIDAD_LIMITANTE_EXTRACCION = 'No Limitante';
        }


        if ($PRODUCCION_MES_PROCESO == $min_value){
            $ACTIVIDAD_LIMITANTE_PROCESO = 'Limitante';
        } else if($PRODUCCION_MES_PROCESO > 0) {
            $ACTIVIDAD_LIMITANTE_PROCESO = 'No Limitante';
        }


        if ($PRODUCCION_MES_CARGA == $min_value){
            $ACTIVIDAD_LIMITANTE_CARGA = 'Limitante';
        } else if($PRODUCCION_MES_CARGA > 0) {
            $ACTIVIDAD_LIMITANTE_CARGA = 'No Limitante';
        }

        //Calculo el Balance

        $BALANCE_CORTE = null;
        $BALANCE_EXTRACCION = null;
        $BALANCE_PROCESO = null;
        $BALANCE_CARGA = null;

        if ($PRODUCCION_MES_CORTE > 0){
            $BALANCE_CORTE = ($min_value / $PRODUCCION_MES_CORTE) * 100;
        }
        if ($PRODUCCION_MES_EXTRACCION > 0){
            $BALANCE_EXTRACCION = ($min_value / $PRODUCCION_MES_EXTRACCION) * 100;
        }
        if ($PRODUCCION_MES_PROCESO > 0){
            $BALANCE_PROCESO = ($min_value / $PRODUCCION_MES_PROCESO) * 100;
        }
        if ($PRODUCCION_MES_CARGA > 0){
            $BALANCE_CARGA = ($min_value / $PRODUCCION_MES_CARGA) * 100;
        }


        //Equivale a produccion total en la tabla de ejemplo en el excel
        $PRODUCCION_TOTAL_LIMITANTE = $min_value;

        //Bedo extraer todos los datos del sitio para que solo remplace la formula
        $sitio = $session->read('Datos.sitio');

        $superficie = $sitio['superficie'];
        $vol_total = $sitio['vol_total'];

        $costo_admin = $session->read('Datos.costo_admin');
        $margen_ganancia = $session->read('Datos.margen_ganancia');

        $VOL_TOTAL_LOTE = $superficie * $vol_total;

        $DIAS_PARA_COSECHAR = round($VOL_TOTAL_LOTE * ($sitio['prop_vol_ap'] / 100) / $PRODUCCION_TOTAL_LIMITANTE * $session->read('Datos.dias_mes'));


        $PROD_PUNTO_EQUILIBRIO = $SUMA_COSTO_FIJO / ($sitio['precio_cont'] - ($SUMA_COSTO_VARIABLE_TOTAL / $PRODUCCION_TOTAL_LIMITANTE));


        //Nuevos calculos de Costos
        $COSTO_MOVIMIENTO_PERSONAL = $varGlobalesData->traslado_personal * $insumosData->movil_traslado_costo;
        $COSTO_DIRECTO_MES = $COSTO_MOVIMIENTO_PERSONAL + $SUMA_COSTO_MES + $SUMA_COSTO_VARIABLE_MES;
        $COSTO_ADMINISTRATIVO_MES = $COSTO_DIRECTO_MES * (($varGlobalesData->costo_administrativo + $varGlobalesData->contador_publico) / 100);
        $COSTO_TOTAL_MES = $COSTO_DIRECTO_MES + $COSTO_ADMINISTRATIVO_MES;
        $COSTO_TOTAL_CON_IMPUESTOS = $COSTO_TOTAL_MES * (1 + ($varGlobalesData->impuestos_totales / 100));
        //$TARIFA_BRUTA = $COSTO_PRODUCCION_BRUTO + $COSTO_TOTAL_CON_IMPUESTOS;


        /*$COSTO_PRODUCCION_BRUTO = $SUMA_COSTO_TOTAL / $PRODUCCION_TOTAL_LIMITANTE;
        $COSTO_PRODUCCION_ADMINISTRACION = $COSTO_PRODUCCION_BRUTO * (1 + $costo_admin / 100);
        $MARGEN_GANANCIA = $COSTO_PRODUCCION_ADMINISTRACION * ($margen_ganancia / 100);
        $TARIFA_SERVICIO = $COSTO_PRODUCCION_ADMINISTRACION + $MARGEN_GANANCIA;*/

        $COSTO_PRODUCCION_BRUTO = $COSTO_DIRECTO_MES / $PRODUCCION_TOTAL_LIMITANTE;
        $COSTO_PRODUCCION_ADMINISTRACION = $COSTO_TOTAL_MES / $PRODUCCION_TOTAL_LIMITANTE;
        $MARGEN_GANANCIA = $COSTO_PRODUCCION_ADMINISTRACION * ($margen_ganancia / 100);
        $TARIFA_SERVICIO = $COSTO_PRODUCCION_ADMINISTRACION + $MARGEN_GANANCIA;
        $TARIFA_SERVICIO_CON_IMP = $TARIFA_SERVICIO * (1 + ($varGlobalesData->impuestos_totales/100));
        $BENEFICIO = $sitio['precio_cont'] - $TARIFA_SERVICIO;


        //AGREGO LOS RESULTADOS A UN ARREGLO Y ENVIO
        $array_result_general = [];
        $array_result_general['ID_RODAL'] = $sitio['idrodal'];
        $array_result_general['COD_SAP'] = $sitio['cod_sap'];
        $array_result_general['ESPECIE'] = $sitio['especie'];
        $array_result_general['SUP'] = $sitio['superficie'];
        $array_result_general['VOL_MEDIO'] = $sitio['vol_medio'];
        $array_result_general['DME'] = $sitio['dme'];

        $array_result_general['PRODUCCION_MES_CORTE'] = $PRODUCCION_MES_CORTE;
        $array_result_general['PRODUCCION_MES_EXTRACCION'] = $PRODUCCION_MES_EXTRACCION;

        $array_result_general['ACTIVIDAD_LIMITANTE_CORTE'] = $ACTIVIDAD_LIMITANTE_CORTE;
        $array_result_general['ACTIVIDAD_LIMITANTE_EXTRACCION'] = $ACTIVIDAD_LIMITANTE_EXTRACCION;

        $array_result_general['BALANCE_CORTE'] = $BALANCE_CORTE;
        $array_result_general['BALANCE_EXTRACCION'] = $BALANCE_EXTRACCION;

        $array_result_general['COSTO_TOTAL_CORTE'] = $COSTO_TOTAL_CORTE;
        $array_result_general['COSTO_TOTAL_EXTRACCION'] = $COSTO_TOTAL_EXTRACCION;

        //produccion del equipo de cosecha
        $array_result_general['PRODUCCION_TOTAL_LIMITANTE'] = $PRODUCCION_TOTAL_LIMITANTE;
        $array_result_general['VOL_TOTAL_LOTE'] = $VOL_TOTAL_LOTE;
        $array_result_general['DIAS_PARA_COSECHAR'] = $DIAS_PARA_COSECHAR;
        $array_result_general['PROD_PUNTO_EQUILIBRIO'] = $PROD_PUNTO_EQUILIBRIO;


        /*$array_result_general['COSTO_PRODUCCION_BRUTO'] = $COSTO_PRODUCCION_BRUTO;
        $array_result_general['COSTO_PRODUCCION_ADMINISTRACION'] = $COSTO_PRODUCCION_ADMINISTRACION;
        $array_result_general['MARGEN_GANANCIA'] = $MARGEN_GANANCIA;
        $array_result_general['TARIFA_SERVICIO'] = $TARIFA_SERVICIO;*/

        $array_result_general['COSTO_PRODUCCION_BRUTO'] = $COSTO_PRODUCCION_BRUTO;
        $array_result_general['COSTO_PRODUCCION_ADMINISTRACION'] = $COSTO_PRODUCCION_ADMINISTRACION;
        $array_result_general['MARGEN_GANANCIA'] = $MARGEN_GANANCIA;
        $array_result_general['TARIFA_SERVICIO'] = $TARIFA_SERVICIO;
        $array_result_general['TARIFA_SERVICIO_CON_IMP'] = $TARIFA_SERVICIO_CON_IMP;
        $array_result_general['BENEFICIO'] = $BENEFICIO;

        $this->set('array_result_general', $array_result_general);


        //debug($array_result);
        //debug($array_result_general);


    }

    public function simularFull(){
        //Este metodo asigna un modelo de produccion a cada maquina seleccionada
        $data_url = $this->request->query;
        $action = $data_url['Accion'];
        $categoria= $data_url['Categoria'];

        $this->set('action', $action);
        $this->set('categoria', $categoria);

        //Obtengo los id de la maquina especifica guardad en la session
        $session = $this->request->session();
        $sitio = $session->read('Datos.sitio');

        //compruebo que los datos de la session no esten vacios
        if (empty($sitio)){

            $this->Flash->error(__('Debido al tiempo de Inactividad, se ha cerrado la Sesión y sus datos temporales de simulación han sido eliminados. Vuelva a repetir los pasos.'));
            return $this->redirect(['action' => 'simular', '?' => ['Accion' => 'Simular', 'Categoria' => 'SIMNEA']]);
        }
        //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


        $superficie = $sitio['superficie'];
        $vol_medio = $sitio['vol_medio'];
        $dme = $sitio['dme'];

        $maquinasSel = $session->read('Datos.maquinas_select');
        $modsel = $session->read('Datos.maquina_modelo');

        $modelTabla = $this->loadModel('Modelos');

        $parametrosGlobalesTable = $this->loadModel('VariablesGlobales');
        $insumosTable = $this->loadModel('Insumos');

        $varGlobalesData = $parametrosGlobalesTable->find('all', [])->first();
        $insumosData = $insumosTable->find('all', [])->first();


        $array_result = $this->calcularCostos();

        //WNVIO ARRAY RESULT QUE CONTIENE LAS SIMULACIONES DE LAS MAQUINAS
        $this->set('array_result', $array_result);



        $PRODUCCION_MES_CORTE = 0;
        $PRODUCCION_MES_EXTRACCION = 0;
        $PRODUCCION_MES_PROCESO = 0;
        $PRODUCCION_MES_CARGA = 0;

        $COSTO_TOTAL_CORTE = null;
        $COSTO_TOTAL_EXTRACCION = null;
        $COSTO_TOTAL_CARGA = null;
        $COSTO_TOTAL_PROCESO = null;

        $SUMA_COSTO_TOTAL = 0;
        $SUMA_COSTO_FIJO = 0;
        $SUMA_COSTO_VARIABLE_TOTAL = 0;
        $SUMA_COSTO_MES = 0;
        $SUMA_COSTO_VARIABLE_MES = 0;



        foreach ($array_result as $result){

            if ($result['tarea'] == 'Corte'){
                $PRODUCCION_MES_CORTE = $PRODUCCION_MES_CORTE + $result['PRODUCCION_MES'];
                $COSTO_TOTAL_CORTE = $COSTO_TOTAL_CORTE + $result['COSTO_TOTAL'];

            } elseif ($result['tarea'] == 'Extraccion'){
                $PRODUCCION_MES_EXTRACCION = $PRODUCCION_MES_EXTRACCION + $result['PRODUCCION_MES'];
                $COSTO_TOTAL_EXTRACCION = $COSTO_TOTAL_EXTRACCION + $result['COSTO_TOTAL'];
            } elseif ($result['tarea'] == 'Proceso'){
                $PRODUCCION_MES_PROCESO = $PRODUCCION_MES_PROCESO + $result['PRODUCCION_MES'];
                $COSTO_TOTAL_PROCESO = $COSTO_TOTAL_PROCESO + $result['COSTO_TOTAL'];
            } elseif ($result['tarea'] == 'Carga'){
                $PRODUCCION_MES_CARGA = $PRODUCCION_MES_CARGA + $result['PRODUCCION_MES'];
                $COSTO_TOTAL_CARGA = $COSTO_TOTAL_CARGA + $result['COSTO_TOTAL'];
            }

            $SUMA_COSTO_TOTAL = $SUMA_COSTO_TOTAL + $result['COSTO_TOTAL'];
            $SUMA_COSTO_FIJO = $SUMA_COSTO_FIJO + $result['COSTO_FIJO_MES_TOTAL'];
            $SUMA_COSTO_VARIABLE_TOTAL =  $SUMA_COSTO_VARIABLE_TOTAL + $result['COSTO_VARIABLE_MES'];

            //Sumo los costos DE LOS COSTO FIJOMES Y VARIABLE
            $SUMA_COSTO_MES = $SUMA_COSTO_MES + $result['COSTO_FIJO_MES_TOTAL'];
            $SUMA_COSTO_VARIABLE_MES = $SUMA_COSTO_VARIABLE_MES + $result['COSTO_VARIABLE_MES'];
        }

        //Obtengo la actividad Limitante
        $ACTIVIDAD_LIMITANTE_CORTE = null;
        $ACTIVIDAD_LIMITANTE_EXTRACCION  = null;
        $ACTIVIDAD_LIMITANTE_PROCESO = null;
        $ACTIVIDAD_LIMITANTE_CARGA = null;

        $array_valores = [];

        if ($PRODUCCION_MES_CORTE > 0){
            array_push($array_valores, $PRODUCCION_MES_CORTE);
        }

        if ($PRODUCCION_MES_EXTRACCION > 0){
            array_push($array_valores, $PRODUCCION_MES_EXTRACCION);
        }
        if ($PRODUCCION_MES_PROCESO > 0){
            array_push($array_valores, $PRODUCCION_MES_PROCESO);
        }
        if ($PRODUCCION_MES_CARGA > 0){
            array_push($array_valores, $PRODUCCION_MES_CARGA);
        }

        $min_value = min($array_valores);

        if ($PRODUCCION_MES_CORTE == $min_value){
            $ACTIVIDAD_LIMITANTE_CORTE = 'Limitante';
        } else if($PRODUCCION_MES_CORTE > 0) {
            $ACTIVIDAD_LIMITANTE_CORTE = 'No Limitante';
        }

        if ($PRODUCCION_MES_EXTRACCION == $min_value){
            $ACTIVIDAD_LIMITANTE_EXTRACCION = 'Limitante';
        } else if($PRODUCCION_MES_EXTRACCION > 0) {
            $ACTIVIDAD_LIMITANTE_EXTRACCION = 'No Limitante';
        }


        if ($PRODUCCION_MES_PROCESO == $min_value){
            $ACTIVIDAD_LIMITANTE_PROCESO = 'Limitante';
        } else if($PRODUCCION_MES_PROCESO > 0) {
            $ACTIVIDAD_LIMITANTE_PROCESO = 'No Limitante';
        }


        if ($PRODUCCION_MES_CARGA == $min_value){
            $ACTIVIDAD_LIMITANTE_CARGA = 'Limitante';
        } else if($PRODUCCION_MES_CARGA > 0) {
            $ACTIVIDAD_LIMITANTE_CARGA = 'No Limitante';
        }

        //Calculo el Balance

        $BALANCE_CORTE = null;
        $BALANCE_EXTRACCION = null;
        $BALANCE_PROCESO = null;
        $BALANCE_CARGA = null;

        if ($PRODUCCION_MES_CORTE > 0){
            $BALANCE_CORTE = ($min_value / $PRODUCCION_MES_CORTE) * 100;
        }
        if ($PRODUCCION_MES_EXTRACCION > 0){
            $BALANCE_EXTRACCION = ($min_value / $PRODUCCION_MES_EXTRACCION) * 100;
        }
        if ($PRODUCCION_MES_PROCESO > 0){
            $BALANCE_PROCESO = ($min_value / $PRODUCCION_MES_PROCESO) * 100;
        }
        if ($PRODUCCION_MES_CARGA > 0){
            $BALANCE_CARGA = ($min_value / $PRODUCCION_MES_CARGA) * 100;
        }


        //Equivale a produccion total en la tabla de ejemplo en el excel
        $PRODUCCION_TOTAL_LIMITANTE = $min_value;

        //Bedo extraer todos los datos del sitio para que solo remplace la formula
        $sitio = $session->read('Datos.sitio');

        $superficie = $sitio['superficie'];
        $vol_total = $sitio['vol_total'];

        $costo_admin = $session->read('Datos.costo_admin');
        $margen_ganancia = $session->read('Datos.margen_ganancia');

        $VOL_TOTAL_LOTE = $superficie * $vol_total;

        $DIAS_PARA_COSECHAR = round($VOL_TOTAL_LOTE * ($sitio['prop_vol_ap'] / 100) / $PRODUCCION_TOTAL_LIMITANTE * $session->read('Datos.dias_mes'));


        $PROD_PUNTO_EQUILIBRIO = $SUMA_COSTO_FIJO / ($sitio['precio_cont'] - ($SUMA_COSTO_VARIABLE_TOTAL / $PRODUCCION_TOTAL_LIMITANTE));



        //Nuevos calculos de Costos
        $COSTO_MOVIMIENTO_PERSONAL = $varGlobalesData->traslado_personal * $insumosData->movil_traslado_costo;
        $COSTO_DIRECTO_MES = $COSTO_MOVIMIENTO_PERSONAL + $SUMA_COSTO_MES + $SUMA_COSTO_VARIABLE_MES;
        $COSTO_ADMINISTRATIVO_MES = $COSTO_DIRECTO_MES * (($varGlobalesData->costo_administrativo + $varGlobalesData->contador_publico) / 100);
        $COSTO_TOTAL_MES = $COSTO_DIRECTO_MES + $COSTO_ADMINISTRATIVO_MES;
        $COSTO_TOTAL_CON_IMPUESTOS = $COSTO_TOTAL_MES * (1 + ($varGlobalesData->impuestos_totales / 100));
        //$TARIFA_BRUTA = $COSTO_PRODUCCION_BRUTO + $COSTO_TOTAL_CON_IMPUESTOS;


        /*$COSTO_PRODUCCION_BRUTO = $SUMA_COSTO_TOTAL / $PRODUCCION_TOTAL_LIMITANTE;
        $COSTO_PRODUCCION_ADMINISTRACION = $COSTO_PRODUCCION_BRUTO * (1 + $costo_admin / 100);
        $MARGEN_GANANCIA = $COSTO_PRODUCCION_ADMINISTRACION * ($margen_ganancia / 100);
        $TARIFA_SERVICIO = $COSTO_PRODUCCION_ADMINISTRACION + $MARGEN_GANANCIA;
        $BENEFICIO = $sitio['precio_cont'] - $TARIFA_SERVICIO;*/

        $COSTO_PRODUCCION_BRUTO = $COSTO_DIRECTO_MES / $PRODUCCION_TOTAL_LIMITANTE;
        $COSTO_PRODUCCION_ADMINISTRACION = $COSTO_TOTAL_MES / $PRODUCCION_TOTAL_LIMITANTE;
        $MARGEN_GANANCIA = $COSTO_PRODUCCION_ADMINISTRACION * ($margen_ganancia / 100);
        $TARIFA_SERVICIO = $COSTO_PRODUCCION_ADMINISTRACION + $MARGEN_GANANCIA;
        $TARIFA_SERVICIO_CON_IMP = $TARIFA_SERVICIO * (1 + ($varGlobalesData->impuestos_totales/100));
        $BENEFICIO = $sitio['precio_cont'] - $TARIFA_SERVICIO;


        //AGREGO LOS RESULTADOS A UN ARREGLO Y ENVIO
        $array_result_general = [];
        $array_result_general['ID_RODAL'] = $sitio['idrodal'];
        $array_result_general['COD_SAP'] = $sitio['cod_sap'];
        $array_result_general['ESPECIE'] = $sitio['especie'];
        $array_result_general['SUP'] = $sitio['superficie'];
        $array_result_general['VOL_MEDIO'] = $sitio['vol_medio'];
        $array_result_general['DME'] = $sitio['dme'];

        $array_result_general['PRODUCCION_MES_CORTE'] = $PRODUCCION_MES_CORTE;
        $array_result_general['PRODUCCION_MES_EXTRACCION'] = $PRODUCCION_MES_EXTRACCION;
        $array_result_general['PRODUCCION_MES_PROCESO'] = $PRODUCCION_MES_PROCESO;
        $array_result_general['PRODUCCION_MES_CARGA'] = $PRODUCCION_MES_CARGA;

        $array_result_general['ACTIVIDAD_LIMITANTE_CORTE'] = $ACTIVIDAD_LIMITANTE_CORTE;
        $array_result_general['ACTIVIDAD_LIMITANTE_EXTRACCION'] = $ACTIVIDAD_LIMITANTE_EXTRACCION;
        $array_result_general['ACTIVIDAD_LIMITANTE_PROCESO'] = $ACTIVIDAD_LIMITANTE_PROCESO;
        $array_result_general['ACTIVIDAD_LIMITANTE_CARGA'] = $ACTIVIDAD_LIMITANTE_CARGA;

        $array_result_general['BALANCE_CORTE'] = $BALANCE_CORTE;
        $array_result_general['BALANCE_EXTRACCION'] = $BALANCE_EXTRACCION;
        $array_result_general['BALANCE_PROCESO'] = $BALANCE_PROCESO;
        $array_result_general['BALANCE_CARGA'] = $BALANCE_CARGA;

        $array_result_general['COSTO_TOTAL_CORTE'] = $COSTO_TOTAL_CORTE;
        $array_result_general['COSTO_TOTAL_EXTRACCION'] = $COSTO_TOTAL_EXTRACCION;
        $array_result_general['COSTO_TOTAL_PROCESO'] = $COSTO_TOTAL_PROCESO;
        $array_result_general['COSTO_TOTAL_CARGA'] = $COSTO_TOTAL_CARGA;

        //produccion del equipo de cosecha
        $array_result_general['PRODUCCION_TOTAL_LIMITANTE'] = $PRODUCCION_TOTAL_LIMITANTE;
        $array_result_general['VOL_TOTAL_LOTE'] = $VOL_TOTAL_LOTE;
        $array_result_general['DIAS_PARA_COSECHAR'] = $DIAS_PARA_COSECHAR;
        $array_result_general['PROD_PUNTO_EQUILIBRIO'] = $PROD_PUNTO_EQUILIBRIO;


        $array_result_general['COSTO_PRODUCCION_BRUTO'] = $COSTO_PRODUCCION_BRUTO;
        $array_result_general['COSTO_PRODUCCION_ADMINISTRACION'] = $COSTO_PRODUCCION_ADMINISTRACION;
        $array_result_general['MARGEN_GANANCIA'] = $MARGEN_GANANCIA;
        $array_result_general['TARIFA_SERVICIO'] = $TARIFA_SERVICIO;
        $array_result_general['TARIFA_SERVICIO_CON_IMP'] = $TARIFA_SERVICIO_CON_IMP;
        $array_result_general['BENEFICIO'] = $BENEFICIO;

        $this->set('array_result_general', $array_result_general);

        $session->write([
            'ResSimulacion' => $array_result_general
        ]);



    }

    public function calcularCostos()
    {


        //Obtengo los id de la maquina especifica guardad en la session
        $session = $this->request->session();
        $maq_sel_select = $session->read('Datos.maquinas_select');

        $id_maq_esp = [];

        foreach ($maq_sel_select as $maq_sel){

            $array['idmaquina_especifica'] = $maq_sel;
            array_push($id_maq_esp, $array);
        }


        //Obtengo la maquina especifica

        $maqEspTable = $this->loadModel('MaquinaEspecifica');

        $maquina_especifica = $maqEspTable->find('all', [
            'conditions' => ['OR' => $id_maq_esp],
            'order' => ['idmaquina_especifica' => 'ASC'],
            'contain' => ['EmsMaq' => ['Emsefor' => ['VariablesGlobales']]]
        ])->toArray();

        $insumos_table = $this->loadModel('Insumos');
        $insumosData = $insumos_table->find('all', [])->first();

        //debug($maquina_especifica);


        $array_result = [];

        //Variablles
        $FACT_CORR_INT = 0.6;

        //Bedo extraer todos los datos del sitio para que solo remplace la formula
        $sitio = $session->read('Datos.sitio');

        $superficie = $sitio['superficie'];
        $vol_medio = $sitio['vol_medio'];
        $dme = $sitio['dme'];
        $dist_lineas = $sitio['dist_lineas'];
        $dist_vias = $sitio['dist_vias'];
        $num_arboles = $sitio['num_arboles'];
        $vol_total = $sitio['vol_total'];
        $dap = $sitio['dap'];
        $altura = $sitio['altura'];
        $area_basal = $sitio['area_basal'];
        $dhp = $sitio['dhp'];
        $pendiente = $sitio['pendiente'];
        $vol_cos = $sitio['vol_cos'];
        $intensidad_v = $sitio['intensidad_v'];
        $precio_cont = $sitio['precio_cont'];
        $prop_vol_ap = $sitio['prop_vol_ap'];

        $maquinasSel = $session->read('Datos.maquinas_select');
        $modsel = $session->read('Datos.maquina_modelo');

        $modelTabla = $this->loadModel('Modelos');

        $session = $this->request->session();





        $i_ = 0;
        //debug($maquina_especifica);
        //Recorro las maquinas y calculo los parametros
        foreach ($maquina_especifica as $maq_esp){


            if ($i_ == 0){
                $session->write([
                    'Datos.costo_admin' => $maq_esp->ems_maq->emsefor[0]->variables_globale->costo_administrativo]);

                $session->write([
                    'Datos.margen_ganancia' => $maq_esp->ems_maq->emsefor[0]->variables_globale->margen_ganancia]);

                $session->write([
                    'Datos.dias_mes' => $maq_esp->ems_maq->emsefor[0]->variables_globale->dias_mes]);
            }
            $i_ = $i_ + 1;


            $array_maquina = [];

            $array_maquina['idemsefor'] = $maq_esp->ems_maq->emsefor[0]->variables_globale->emsefor_idemsefor;



            $model_id = $modsel[$maq_esp->idmaquina_especifica];

            $model_data = $modelTabla->get($model_id, [
                    'contain' => []
                ])->toArray();

            $algoritmo = $model_data['modelo_algoritmo'];

            $res = eval('return '.$algoritmo.';');

            $PRODUCTIVIDAD = $res;
            $PRODUCTIVIDAD_REAL = $PRODUCTIVIDAD * $maq_esp->eficiencia / 100;
            $PRODUCCION_MES = $PRODUCTIVIDAD_REAL * $maq_esp->n_turnos * $maq_esp->horas_dia * $maq_esp->ems_maq->emsefor[0]->variables_globale->dias_mes;

            $array_maquina['PRODUCTIVIDAD'] = $PRODUCTIVIDAD;
            $array_maquina['PRODUCTIVIDAD_REAL'] = $PRODUCTIVIDAD_REAL;
            $array_maquina['PRODUCCION_MES'] = $PRODUCCION_MES;


            //Cargo datos al arreglo
            $array_maquina['id'] = $maq_esp->idmaquina_especifica;
            $array_maquina['nombre'] = $maq_esp->nombre;
            $array_maquina['modelo'] = $maq_esp->modelo;
            $array_maquina['tarea'] = $maq_esp->tarea;

            $HORASusosMES = 0;

            $CUOTA_LEASING_CREDITO_MENSUAL = 0;
            $CUOTA_LEASING_IMP_MENSUAL = 0;
            $interes_maq_mes = 0;
            $interes_imp_mes = 0;
            $seguro_maq_mes = 0;
            $seguro_imp_mes = 0;
            $DEPRE_MAQ_MES_vida = 0;
            $DEPRE_IMP_MES_vida = 0;
            $DEPRE_MAQ_MES_uso = 0;
            $DEPRE_IMP_MES_uso = 0;


            $HORASusosMES = $maq_esp->ems_maq->emsefor[0]->variables_globale->dias_mes * $maq_esp->n_turnos * $maq_esp->horas_dia;

            if ($maq_esp->leasing_credito == true){
                $CUOTA_LEASING_CREDITO_MENSUAL = $maq_esp->cuota_maq_mes;
            }

            if ($maq_esp->leas_imp == true){
                $CUOTA_LEASING_IMP_MENSUAL = $maq_esp->cuota_mes_imp;
            }

            if($maq_esp->leasing_credito == false){
                $interes_maq_mes = $maq_esp->valor_maquina *  $FACT_CORR_INT * ($maq_esp->ems_maq->emsefor[0]->variables_globale->tasa_int_cap_propio / 100) / 12;
                $seguro_maq_mes = ($maq_esp->valor_maquina * $maq_esp->ems_maq->emsefor[0]->variables_globale->tasa_seguro / 100) / 12;

            }

            if ($maq_esp->leas_imp == false){
                $interes_imp_mes = $maq_esp->va_imp * $FACT_CORR_INT * ($maq_esp->ems_maq->emsefor[0]->variables_globale->tasa_int_cap_propio / 100) / 12;
                $seguro_imp_mes = ($maq_esp->va_imp * $maq_esp->ems_maq->emsefor[0]->variables_globale->tasa_seguro / 100) / 12;
            }

            ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

            if($maq_esp->vida_util_maq_year > 0 and $maq_esp->leasing_credito == false){
                $DEPRE_MAQ_MES_vida = (($maq_esp->valor_maquina - ($maq_esp->valor_maquina * $maq_esp->fac_var_res / 100) - $maq_esp->va_sis_rod_maq) / $maq_esp->vida_util_maq_year) / 12;
            }

            if($maq_esp->vida_util_imp_year > 0 and $maq_esp->leas_imp == false){
                $DEPRE_IMP_MES_vida = (($maq_esp->va_imp - ($maq_esp->va_imp * $maq_esp->fac_var_res / 100) - $maq_esp->va_sis_rod_imp) / $maq_esp->vida_util_imp_year) / 12;
            }

            ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

            if($maq_esp->leasing_credito == false && $maq_esp->vida_util_maq > 0){
                $DEPRE_MAQ_MES_uso = (($maq_esp->valor_maquina - ($maq_esp->valor_maquina * $maq_esp->fac_var_res / 100) - $maq_esp->va_sis_rod_maq) / $maq_esp->vida_util_maq) * $HORASusosMES;
            }

            if ($maq_esp->leas_imp == false && $maq_esp->vida_util_imp > 0){
                $DEPRE_IMP_MES_uso = (($maq_esp->va_imp - ($maq_esp->va_imp * $maq_esp->fac_var_res / 100) - $maq_esp->va_sis_rod_imp) / $maq_esp->vida_util_imp)* $HORASusosMES;
            }

            ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

            //Vuelvo a agregar datos al arreglo
            $array_maquina['HORASusosMES'] = $HORASusosMES;
            $array_maquina['CUOTA_LEASING_CREDITO_MENSUAL'] = $CUOTA_LEASING_CREDITO_MENSUAL;
            $array_maquina['CUOTA_LEASING_IMP_MENSUAL'] = $CUOTA_LEASING_IMP_MENSUAL;
            $array_maquina['interes_maq_mes'] = $interes_maq_mes;
            $array_maquina['seguro_maq_mes'] = $seguro_maq_mes;
            $array_maquina['interes_imp_mes'] = $interes_imp_mes;
            $array_maquina['seguro_imp_mes'] = $seguro_imp_mes;
            $array_maquina['DEPRE_MAQ_MES_vida'] = $DEPRE_MAQ_MES_vida;
            $array_maquina['DEPRE_IMP_MES_vida'] = $DEPRE_IMP_MES_vida;
            $array_maquina['DEPRE_MAQ_MES_uso'] = $DEPRE_MAQ_MES_uso;
            $array_maquina['DEPRE_IMP_MES_uso'] = $DEPRE_IMP_MES_uso;

            $DEPRE_SROD_MAQ_HORAS = 0;
            $DEPRE_SROD_IMP_HORAS = 0;


            if($maq_esp->vida_util_srod_maq > 0){
                $DEPRE_SROD_MAQ_HORAS = $maq_esp->va_sis_rod_maq / $maq_esp->vida_util_srod_maq;
            }

            if($maq_esp->vida_util_srod_imp > 0){
                $DEPRE_SROD_IMP_HORAS = $maq_esp->va_sis_rod_imp / $maq_esp->vida_util_srod_imp;
            }
            $REP_MAQ_HORA = ($DEPRE_MAQ_MES_uso/$HORASusosMES) * ($maq_esp->fac_arreglo_mec/100);
            $REP_IMP_HORA = ($DEPRE_IMP_MES_uso/$HORASusosMES) * ($maq_esp->fac_arreglo_mec/100);

            //Vuelvo a cargar
            $array_maquina['DEPRE_SROD_MAQ_HORAS'] = $DEPRE_SROD_MAQ_HORAS;
            $array_maquina['DEPRE_SROD_IMP_HORAS'] = $DEPRE_SROD_IMP_HORAS;
            $array_maquina['REP_MAQ_HORA'] = $REP_MAQ_HORA;
            $array_maquina['REP_IMP_HORA'] = $REP_IMP_HORA;

            //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            //Calculo de los Sueldos a partir de los cambios sugeridos por Hugo
            //Traigo la tabla MAQESP_CATOP
            $maqespCatopTable = $this->loadModel('MaqespCatop');
            $maqespCatopData = $maqespCatopTable->find('all', [])
                ->contain('CatOperarios')
                ->where(['maquina_especifica_idmaquina_especifica' => $maq_esp->idmaquina_especifica])
                ->first();

            //Traigo la Tabla Laboral
            $laboralTable = $this->loadModel('Laboral');
            $laboralData = $laboralTable->find('all', [])
                ->first();



            $HABERES = $maqespCatopData->sal_basico_mes * (1 + ($laboralData->aguinaldo + $laboralData->feriado + $laboralData->vacaciones + ($maq_esp->ant_operario * $laboralData->ant_sup)) / 100
                ) * (1 + $laboralData->presentismo / 100);

            $CONTRIBUCIONES_EMPLEADOR = $HABERES * (1 + ($laboralData->empleador_jub + $laboralData->empleador_asignacion + $laboralData->empleador_fondo_des + $laboralData->empleador_inssjp +
                        $laboralData->empleador_obra_social + $laboralData->empleador_seguro_vida + $laboralData->empleador_renatea + $laboralData->art_prop) / 100) + $laboralData->art_fijo;

            $PREVISIONES = $HABERES * (1 + ($laboralData->prev_enfermedad + $laboralData->prev_despido + $laboralData->exam_preocup + $laboralData->seguro_colectivo) / 100) ;

            //Calculo de la tabla 3
            $N_operarios = $maq_esp->n_turnos;

            $SALARIO_CON_CARGAS_MES = ($HABERES + $CONTRIBUCIONES_EMPLEADOR + $PREVISIONES) * $N_operarios;
            ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            /// si el operador es igual a motosierra

            $COSTO_VESTIMENTA_MES = 0;

            $N_DIAS_MES = $maq_esp->ems_maq->emsefor[0]->variables_globale->dias_mes;

            if ($maqespCatopData->cat_operario->categoria == "Motosierrista"){
                $COSTO_VESTIMENTA_MES = $N_operarios * (($insumosData->uniforme + $insumosData->botin_seguridad + $insumosData->guante + $insumosData->protector_auditivo +
                        $insumosData->casco_chaleco + $insumosData->pantalon_seguridad) / 6);
            } else {
                $COSTO_VESTIMENTA_MES = $N_operarios * (($insumosData->uniforme + $insumosData->botin_seguridad + $insumosData->guante + $insumosData->protector_auditivo +
                            $insumosData->casco_chaleco) / 6);
            }


            $COSTO_MES_COMIDA_ALOJAMIENTO = $N_DIAS_MES * $N_operarios * ($insumosData->alojamiento_dia_persona + $insumosData->vianda_dia);

            $array_maquina['N_operarios'] = $N_operarios;
            $array_maquina['SALARIO_CON_CARGAS_MES'] = $SALARIO_CON_CARGAS_MES;
            $array_maquina['COSTO_VESTIMENTA_MES'] = $COSTO_VESTIMENTA_MES;
            $array_maquina['N_DIAS_MES'] = $N_DIAS_MES;
            $array_maquina['COSTO_MES_COMIDA_ALOJAMIENTO'] = $COSTO_MES_COMIDA_ALOJAMIENTO;

            ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

            //Calculo de la tabla 4

            $COST_COMB_HORA = $maq_esp->cons_comb * $insumosData->pres_comb_siva;
            $MOTOR_HORA = $maq_esp->con_aceite_motor * $insumosData->pres_aceite_motor;
            $TANSMISION_HORA = $maq_esp->con_aceite_trans * $insumosData->pres_aceite_trans;
            $SISTEMA_HIDRAULICO_HORA = $maq_esp->con_aceite_hidra * $insumosData->pres_aceite_hidra;
            $GRASAS_HORA = $maq_esp->con_grasa * $insumosData->pres_grasa;
            $ACEITE_CADENA_HORA = $maq_esp->aceite_cadena_hora * $insumosData->precio_aceite_cadena;
            //Estos costos se agregan
            $COSTO_HORA_FILTROS = $maq_esp->costo_hora_filtros;
            $ESPADA_HORA = $maq_esp->espada_hora * $insumosData->precio_espada;
            $CADENA_HORA = $maq_esp->cadena_hora + $insumosData->precio_cadena;
            $MANGUERAS_HORA = $maq_esp->mangueras_horas;


            $array_maquina['COST_COMB_HORA'] = $COST_COMB_HORA;
            $array_maquina['MOTOR_HORA'] = $MOTOR_HORA;
            $array_maquina['TANSMISION_HORA'] = $TANSMISION_HORA;
            $array_maquina['SISTEMA_HIDRAULICO_HORA'] = $SISTEMA_HIDRAULICO_HORA;
            $array_maquina['GRASAS_HORA'] = $GRASAS_HORA;
            $array_maquina['ACEITE_CADENA_HORA'] = $ACEITE_CADENA_HORA;

            $array_maquina['COSTO_HORA_FILTROS'] = $COSTO_HORA_FILTROS;
            $array_maquina['ESPADA_HORA'] = $ESPADA_HORA;
            $array_maquina['CADENA_HORA'] = $CADENA_HORA;
            $array_maquina['MANGUERAS_HORA'] = $MANGUERAS_HORA;

            //////////////////////////////////////////////////////////////////////////////////////////////////////

            $COSTO_VARIABLE_HORA_TOTAL = $DEPRE_SROD_MAQ_HORAS + $DEPRE_SROD_IMP_HORAS + $REP_MAQ_HORA + $REP_IMP_HORA + $COST_COMB_HORA + $MOTOR_HORA + $TANSMISION_HORA + $SISTEMA_HIDRAULICO_HORA
                + $GRASAS_HORA + $COSTO_HORA_FILTROS + $ACEITE_CADENA_HORA + $ESPADA_HORA + $CADENA_HORA + $MANGUERAS_HORA;

            //CALCULO DEL COSTO FIJO

            $COSTO_FIJO_MES_TOTAL = 0;

            if ($maq_esp->leasing_credito == false && $maq_esp->leas_imp == false){

                $COSTO_FIJO_MES_TOTAL = $interes_maq_mes + $interes_imp_mes + $seguro_maq_mes + $seguro_imp_mes + $DEPRE_MAQ_MES_vida +
                    $DEPRE_IMP_MES_vida + $SALARIO_CON_CARGAS_MES + $COSTO_VESTIMENTA_MES + $COSTO_MES_COMIDA_ALOJAMIENTO;

            } elseif ($maq_esp->leasing_credito == true && $maq_esp->leas_imp == false){
                $COSTO_FIJO_MES_TOTAL = $CUOTA_LEASING_CREDITO_MENSUAL + $interes_imp_mes + $seguro_maq_mes + $seguro_imp_mes + $DEPRE_IMP_MES_vida +
                    $SALARIO_CON_CARGAS_MES + $COSTO_VESTIMENTA_MES + $COSTO_MES_COMIDA_ALOJAMIENTO;

            } elseif ($maq_esp->leasing_credito == false && $maq_esp->leas_imp == true){
                $COSTO_FIJO_MES_TOTAL = $CUOTA_LEASING_IMP_MENSUAL + $interes_maq_mes + $seguro_maq_mes + $seguro_imp_mes + $DEPRE_MAQ_MES_vida +
                    $SALARIO_CON_CARGAS_MES + $COSTO_VESTIMENTA_MES + $COSTO_MES_COMIDA_ALOJAMIENTO;

            } elseif ($maq_esp->leasing_credito == true && $maq_esp->leas_imp == true){
                $COSTO_FIJO_MES_TOTAL = $CUOTA_LEASING_CREDITO_MENSUAL + $CUOTA_LEASING_IMP_MENSUAL + $seguro_maq_mes + $seguro_imp_mes +
                    $SALARIO_CON_CARGAS_MES + $COSTO_VESTIMENTA_MES + $COSTO_MES_COMIDA_ALOJAMIENTO;

            }

            $array_maquina['COSTO_VARIABLE_HORA_TOTAL'] = $COSTO_VARIABLE_HORA_TOTAL;
            $array_maquina['COSTO_FIJO_MES_TOTAL'] = $COSTO_FIJO_MES_TOTAL;

            ///////////////////////////////////////////////////////////////////////////////////////////////////

            $COSTO_VARIABLE_MES = $COSTO_VARIABLE_HORA_TOTAL * $N_DIAS_MES * $maq_esp->n_turnos * $maq_esp->horas_dia;

            $array_maquina['COSTO_VARIABLE_MES'] = $COSTO_VARIABLE_MES;

            $COSTO_TOTAL = $COSTO_FIJO_MES_TOTAL + $COSTO_VARIABLE_MES;
            $array_maquina['COSTO_TOTAL'] = $COSTO_TOTAL;

            //Agrego array_maquina que contiene los datos al arreglo que agrupa
            array_push ($array_result, $array_maquina);


        }
        //Guardar en la variable session
        $session->write([
            'Maquinas' => $array_result
        ]);

        return $array_result;


    }


    public function getdataforsitio($id)
    {

        $this->autoRender = false;
        $this->request->allowMethod(['ajax']);

        //1ro seleccionar el Rodal, por ello obtengo la tabla Rodal
        $tablaRodales = $this->loadModel('Rodales');

        $rodales_data = $tablaRodales->get($id, [
            'contain' => []
        ]);

        $this->set('cod_sap', $rodales_data->cod_sap);
        //return the message to js function
        $this->response->body(json_encode($rodales_data->cod_sap));

    }


    public function saved(){

        $this->autoRender = false;
        $this->viewBuilder()->setLayout(false);
        $this->render(false);


        //Obtengo los id de la maquina especifica guardad en la session
        $session = $this->request->session();
        $sitio = $session->read('Datos.sitio');

        //compruebo que los datos de la session no esten vacios
        if (empty($sitio)){

            $this->Flash->error(__('Debido al tiempo de Inactividad, se ha cerrado la Sesión y sus datos temporales de simulación han sido eliminados. Vuelva a repetir los pasos.'));
            return $this->redirect(['action' => 'simular', '?' => ['Accion' => 'Simular', 'Categoria' => 'SIMNEA']]);
        }
        //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


        $data_url = $this->request->data;

        //Instancio las Tablas para guardar la simulacion
        $tablaSimulaciones = $this->loadModel('Simulaciones');
        $tablaSimulacionMaqesp = $this->loadModel('SimulacionesMaqesp');
        $tablaSimulacionResumen = $this->loadModel('SimulacionResumen');

        $datos = $session->read('Datos');
        $res_simunlacion = $session->read('ResSimulacion');


        //Creo las entidades para guardar los datos
        $simulaciones_entity = $tablaSimulaciones->newEntity();

        //Cargo la entidad simulaciones
        $simulaciones_entity->fecha = Time::now();
        $simulaciones_entity->rodales_idrodales = $res_simunlacion['ID_RODAL'];
        $simulaciones_entity->tipo_simulacion = $data_url['tipo_simulacion'];
        $simulaciones_entity->sistema_cosecha = $datos['sistema_cosecha']['cosecha'];
        $simulaciones_entity->superficie = $datos['sitio']['superficie'];
        $simulaciones_entity->vol_medio = $datos['sitio']['vol_medio'];
        $simulaciones_entity->dist_extraccion = $datos['sitio']['dist_vias'];
        $simulaciones_entity->produccion_total = $res_simunlacion['PRODUCCION_TOTAL_LIMITANTE'];
        $simulaciones_entity->vol_total = $res_simunlacion['VOL_TOTAL_LOTE'];
        $simulaciones_entity->dias_cosecha = $res_simunlacion['DIAS_PARA_COSECHAR'];
        $simulaciones_entity->produccion_equilibrio = $res_simunlacion['PROD_PUNTO_EQUILIBRIO'];
        $simulaciones_entity->costo_prod_bruta = $res_simunlacion['COSTO_PRODUCCION_BRUTO'];
        $simulaciones_entity->costo_prod_admin = $res_simunlacion['COSTO_PRODUCCION_ADMINISTRACION'];
        $simulaciones_entity->margen_ganancia = $res_simunlacion['MARGEN_GANANCIA'];
        $simulaciones_entity->tarifa_sin_imp = $res_simunlacion['TARIFA_SERVICIO'];
        $simulaciones_entity->tarifa_con_imp = $res_simunlacion['TARIFA_SERVICIO_CON_IMP'];
        $simulaciones_entity->beneficio = $res_simunlacion['BENEFICIO'];



        if($this->request->is('post')){

            if($tablaSimulaciones->save($simulaciones_entity)){

                $maquinas = $session->read('Maquinas');

                if (empty($maquinas)){

                    $this->Flash->error(__('Debido al tiempo de Inactividad, se ha cerrado la Sesión y sus datos temporales de simulación han sido eliminados. Vuelva a repetir los pasos.'));
                    return $this->redirect(['action' => 'simular', '?' => ['Accion' => 'Simular', 'Categoria' => 'SIMNEA']]);
                }

                //Ultimo registro agregado
                $last_id_sim_add = $tablaSimulaciones->find('all',array('order'=>'idsimulaciones DESC'))->first();

                //Variable flags
                $flags = true;

                foreach ($maquinas as $maq){

                    //Guardo las maquinas que intervinieron
                    //Creo la entidad con los datos de la simulacion para guardar en la otra tabla
                    $simulaciones_maqesp_entity = $tablaSimulacionMaqesp->newEntity();
                    $simulaciones_maqesp_entity->simulaciones_idsimulaciones = $last_id_sim_add->idsimulaciones;
                    $simulaciones_maqesp_entity->idmaquina_especifica = $maq['id'];
                    $simulaciones_maqesp_entity->actividad = $maq['tarea'];
                    $simulaciones_maqesp_entity->productividad = $maq['PRODUCTIVIDAD'];
                    $simulaciones_maqesp_entity->productividad_real = $maq['PRODUCTIVIDAD_REAL'];
                    $simulaciones_maqesp_entity->produccion_mes = $maq['PRODUCCION_MES'];
                    $simulaciones_maqesp_entity->costo_fijo = $maq['COSTO_FIJO_MES_TOTAL'];
                    $simulaciones_maqesp_entity->costo_variable = $maq['COSTO_VARIABLE_MES'];
                    $simulaciones_maqesp_entity->costo_total = $maq['COSTO_TOTAL'];

                    //Guardo la entidad

                    if($tablaSimulacionMaqesp->save($simulaciones_maqesp_entity)){
                        //No hago nada porque se guardo igual

                    } else {

                        $flags = false;
                        //Deberia volver a los resultados de la simulacion y eliminar todo el contenido
                        break;
                    }
                }

                $flags_resumen = true;

                //Guardo el Resumen de la simulacion
                if ($flags){
                    $sim_resumen_corte = null;
                    $sim_resumen_extraccion = null;
                    $sim_resumen_proceso = null;
                    $sim_resumen_carga = null;
                    //Proceso corte
                    if ($res_simunlacion['ACTIVIDAD_LIMITANTE_CORTE'] != null){

                        $sim_resumen_corte = $tablaSimulacionResumen->newEntity();
                        $sim_resumen_corte->idsimulacion = $last_id_sim_add->idsimulaciones;
                        $sim_resumen_corte->tarea = "Corte";
                        $sim_resumen_corte->produccion_mes = $res_simunlacion['PRODUCCION_MES_CORTE'];
                        $sim_resumen_corte->actividad_lim = $res_simunlacion['ACTIVIDAD_LIMITANTE_CORTE'];
                        $sim_resumen_corte->balance = $res_simunlacion['BALANCE_CORTE'];
                        $sim_resumen_corte->costo_total = $res_simunlacion['COSTO_TOTAL_CORTE'];
                    }

                    if ($res_simunlacion['ACTIVIDAD_LIMITANTE_EXTRACCION'] != null){

                        $sim_resumen_extraccion = $tablaSimulacionResumen->newEntity();
                        $sim_resumen_extraccion->idsimulacion = $last_id_sim_add->idsimulaciones;
                        $sim_resumen_extraccion->tarea = "Extracción";
                        $sim_resumen_extraccion->produccion_mes = $res_simunlacion['PRODUCCION_MES_EXTRACCION'];
                        $sim_resumen_extraccion->actividad_lim = $res_simunlacion['ACTIVIDAD_LIMITANTE_EXTRACCION'];
                        $sim_resumen_extraccion->balance = $res_simunlacion['BALANCE_EXTRACCION'];
                        $sim_resumen_extraccion->costo_total = $res_simunlacion['COSTO_TOTAL_EXTRACCION'];
                    }

                    if ($res_simunlacion['ACTIVIDAD_LIMITANTE_PROCESO'] != null){

                        $sim_resumen_proceso = $tablaSimulacionResumen->newEntity();
                        $sim_resumen_proceso->idsimulacion = $last_id_sim_add->idsimulaciones;
                        $sim_resumen_proceso->tarea = "Proceso";
                        $sim_resumen_proceso->produccion_mes = $res_simunlacion['PRODUCCION_MES_PROCESO'];
                        $sim_resumen_proceso->actividad_lim = $res_simunlacion['ACTIVIDAD_LIMITANTE_PROCESO'];
                        $sim_resumen_proceso->balance = $res_simunlacion['BALANCE_PROCESO'];
                        $sim_resumen_proceso->costo_total = $res_simunlacion['COSTO_TOTAL_PROCESO'];
                    }

                    if ($res_simunlacion['ACTIVIDAD_LIMITANTE_CARGA'] != null){

                        $sim_resumen_carga = $tablaSimulacionResumen->newEntity();
                        $sim_resumen_carga->idsimulacion = $last_id_sim_add->idsimulaciones;
                        $sim_resumen_carga->tarea = "Proceso";
                        $sim_resumen_carga->produccion_mes = $res_simunlacion['PRODUCCION_MES_CARGA'];
                        $sim_resumen_carga->actividad_lim = $res_simunlacion['ACTIVIDAD_LIMITANTE_CARGA'];
                        $sim_resumen_carga->balance = $res_simunlacion['BALANCE_CARGA'];
                        $sim_resumen_carga->costo_total = $res_simunlacion['COSTO_TOTAL_CARGA'];
                    }


                    //Guardo las entidades
                    if ($sim_resumen_corte != null){
                        if (!$tablaSimulacionResumen->save($sim_resumen_corte)){
                            $flags_resumen = false;
                        }
                    }
                    if ($sim_resumen_extraccion != null){
                        if (!$tablaSimulacionResumen->save($sim_resumen_extraccion)){
                            $flags_resumen = false;
                        }
                    }
                    if ($sim_resumen_proceso != null){
                        if (!$tablaSimulacionResumen->save($sim_resumen_proceso)){
                            $flags_resumen = false;
                        }
                    }
                    if ($sim_resumen_carga != null){
                        if (!$tablaSimulacionResumen->save($sim_resumen_carga)){
                            $flags_resumen = false;
                        }
                    }

                    $this->Flash->success(__('La Simulación ha sido guardada correctamente.'));

                    //redirecciono a la muestra de la Simulacion by ID

                    return $this->redirect(['controller' => 'Simulaciones', 'action' => 'view', '?' => ['Accion' => 'Ver Simulación', 'Categoria' => 'SIMNEA', 'id' => $last_id_sim_add->idsimulaciones]]);

                }

            } else {
                $this->Flash->error(__('La Simulación no pudo ser guardada. Intente nuevamente.'));
            }

        }





    }
}
