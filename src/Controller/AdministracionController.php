<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;
use Cake\Event\Event;

/**
 * Administracion Controller
 *
 */
class AdministracionController extends AppController
{


    public function isAuthorized($user)
    {
        if(isset($user['role']) and $user['role'] === 'user')
        {
            if(in_array($this->request->action, ['getColumnsTableSelect']))
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

        $action = $data_url['Accion'];
        $categoria= $data_url['Categoria'];

        $this->set('action', $action);
        $this->set('categoria', $categoria);

        //Traigo el nombre de una tabal y trato de acceder a sus registros
        $model_tablas_filtros = $this->loadModel('tablas_filtros');
        $tabla_filtros = $model_tablas_filtros->find('list', [
            'keyField' => 'idtablasfiltros',
            'valueField' => 'tabla_name'
        ])->toArray();


        $this->set('tabla_filtros', $tabla_filtros);


    }

    public function config()
    {
        //Recupero los datos de la URL
        $data_url = $this->request->query;

        $action = $data_url['Accion'];
        $categoria= $data_url['Categoria'];

        $this->set('action', $action);
        $this->set('categoria', $categoria);

        //Obtengo la lista de tablas del sistema y se la mando a una lista

        /*$db = ConnectionManager::get('default');
        // Create a schema collection.
        $collection = $db->schemaCollection();
        // Get the table names
        $tables = $collection->listTables();

        debug($tables);*/

        $modelTablaFiltros = $this->loadModel('tablas_filtros');

        $tabla_filtros = $modelTablaFiltros->find('all', []);

        $this->set(compact('tabla_filtros'));
        $this->set('_serialize', ['tabla_filtros']);



    }

    //vARIABLE QUE ALMACENA LAS TABLAS PERMITIDAS PARA AGREGARSE AL FILTRO
    //Debe ser este tipo de varibale así me aseguro que estan si o si relacionadas
    private $TABLAS_YES_FITROS = ['Rodales', 'Empresa', 'Plantaciones', 'Procedencias', 'Sagpyas', 'Intervenciones', 'Inventario', 'gis',
        'Info_intervencion', 'Emsefor'];

    public function addTableFiltro()
    {
        //Recupero los datos de la URL
        $data_url = $this->request->query;

        $action = $data_url['Accion'];
        $categoria= $data_url['Categoria'];

        $this->set('action', $action);
        $this->set('categoria', $categoria);

        //$db = ConnectionManager::get('default');
        // Create a schema collection.
        //$collection = $db->schemaCollection();
        // Get the table names
       // $tables = $collection->listTables();

        //Realizo la eliminacion de las tablas que ya estan seleccionadas
        $modelTablaFiltro = $this->loadModel('tablas_filtros');

        $tabla_filtros = $modelTablaFiltro->find('all',[])->toArray();

        //Recorro con un foreach

        if(empty($tabla_filtros)){
            $tabla_array = [];
            //Armo el arreglo para que quede todo ok
            foreach ($this->TABLAS_YES_FITROS as $tabla){
                $tabla_array = $tabla_array + [$tabla => $tabla];

            }
            $this->set('tables', $tabla_array);


        } else{

            $tabla_array = [];
            //Armo el arreglo para que quede todo ok
            foreach ($this->TABLAS_YES_FITROS as $tabla){
                $tabla_array = $tabla_array + [$tabla => $tabla];

            }

            foreach ($tabla_filtros as $tbl) {
                foreach ($tabla_array as $tabla) {

                    if ($tbl->tabla_name == $tabla) {

                        //$tabla_array = $tabla_array + [$tbl => $tbl];
                        $var_ = strval($tbl->tabla_name);
                        unset($tabla_array[strval($var_)]);

                    }

                }
            }


            $this->set('tables', $tabla_array);
        }


        $model_tabla_filtro_entity = $modelTablaFiltro->newEntity();

        if ($this->request->is('post')) {
            $model_tabla_filtro_entity = $modelTablaFiltro->patchEntity($model_tabla_filtro_entity, $this->request->data);


            if ($modelTablaFiltro->save($model_tabla_filtro_entity)) {


                return $this->redirect(['action' => 'config', '?' => ['Accion' => 'Filtro de Rodales', 'Categoria' => 'Administracion']]);
            }
            $this->Flash->error(__('The rodale could not be saved. Please, try again.'));
        }

        $this->set('modelTablaFiltro', $modelTablaFiltro);

    }

    public function deleteTable($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);

        $modelTablaFiltro = $this->loadModel('tablas_filtros');

        $tablafiltro = $modelTablaFiltro->get($id);


        try{
            if ($modelTablaFiltro->delete($tablafiltro)) {
                $this->Flash->success(__('La Tabla ha sido eliminada.'));
                return $this->redirect(['action' => 'config', '?' => ['Accion' => 'Filtro de Rodales', 'Categoria' => 'Administracion']]);
            } else {
                $this->Flash->error(__('La Tabla no pudo ser eliminada. Intente nuevamente.'));
            }
        }catch(\PDOException $e){
            $this->Flash->error(__($e->getMessage()));
            $this->Flash->error(__('La Tabla no pudo ser eliminada. Intente nuevamente.'));
            return $this->redirect(['action' => 'config', '?' => ['Accion' => 'Filtro de Rodales', 'Categoria' => 'Administracion']]);
        }

    }

    public function selectColumns()
    {

        //Recupero los datos de la URL
        $data_url = $this->request->query;

        $action = $data_url['Accion'];
        $categoria= $data_url['Categoria'];
        $id = $data_url['id'];
        $table_name = $data_url['table_name'];

        $this->set('action', $action);
        $this->set('categoria', $categoria);

        if (empty($table_name)){
            //Realizo un redirect para que vuelva a seleccionar la tabla
        } else{


            //Traigo el modelo seun la tabla seleccionada

            $model_table = $this->loadModel($table_name);
            $model_columns_filtro = $this->loadModel('ColumsFiltros');
            //obtengo las columnas y se los mando a un chexbox haciendo un filtro de las columnas que ya estan

            $tabla_columns_filtro = $model_columns_filtro->find('all', [])->contain(['TablasFiltros'])->toArray();

            $columnas = $model_table->schema()->columns();


            //debug($tabla_columns_filtro);
            //debug($columnas);

            //Realizo la eliminacion de las columnas que ya estan y compruebo para los casos de PLANTACIONES, etc si la columna se llama EMSEFOR
            $new_columns = array();

            foreach ($columnas as $col){
                $bool_present =  false;

                foreach ($tabla_columns_filtro as $tbl_col_f){

                    if ($col == $tbl_col_f->name_column && $table_name == $tbl_col_f->tablas_filtro->tabla_name){
                        $bool_present = true;
                    }
                }

                if($bool_present === false){
                    array_push($new_columns, $col);

                }
            }

            //Realizo la comprobacion si la Tabla que estoy consultando es PLANTACIONES, INVENTARIO O INFO_PLANTACIONES
            //Solo si son esas hago la verificacion de EMSEFOR
            $arreglo_final = array();

            if($table_name == 'Plantaciones' || $table_name == 'Intervenciones' || $table_name == 'Inventario' || $table_name == 'Intervenciones'){

                //Bolean emsefor presente
                $bool_present_emsefor = false;

                foreach ($tabla_columns_filtro as $tbl_col_f){


                    if  ($tbl_col_f->tablas_filtro->tabla_name == $table_name && $tbl_col_f->name_column == 'emsefor'){
                        $bool_present_emsefor = true;

                    }

                }



                if($bool_present_emsefor == false){


                    foreach ($new_columns as $col_filtros){

                        //Pregunto si la columna es la emsefor

                        if($col_filtros == 'emsefor_idemsefor'){

                            //elimino el objeto
                            array_push($arreglo_final, 'emsefor');

                        } else {
                            array_push($arreglo_final, $col_filtros);
                        }

                    }

                    $this->set('options', $arreglo_final);

                } else {

                    //Si esta emsefor ya asignada debo reccorer y eliminar emsefor_idemsefor porque aparece de lo contrario
                    foreach ($new_columns as $col_filtros){

                        //Pregunto si la columna es la emsefor

                        if($col_filtros != 'emsefor_idemsefor'){

                            //elimino el objeto
                            array_push($arreglo_final, $col_filtros);

                        }

                    }

                    $this->set('options', $arreglo_final);


                }

                //Se trata de cualquier tabla que no debo evaluar EMSEFOR
            } else {

                $this->set('options', $new_columns);
            }



            $arra = [];

            if ($this->request->is('post')) {

                //Limpio los elementos que no fueron seleccionados
                foreach ($this->request->data as $data){

                    if($data != '0'){

                        $arra[] = $data;
                    }
                }
                //Recorro el array y creo las entidades
                //Creo un array que contenga las claves foraneas y los nombres de columnas a guardar
                $entity_array = array();
                foreach ($arra as $options){

                    $entity = $model_columns_filtro->newEntity(['name_column' => $options, 'id_table_filtro' => $id]);

                    $entity_array[] = $entity;
                }

                $bool_success = true;

                foreach ($entity_array as $entity){

                    if($model_columns_filtro->save($entity)){

                    } else {
                        $bool_success = false;
                    }

                }

                if($bool_success){
                    $this->Flash->success(__('Las Columnas Fueron Guardadas!'));
                    return $this->redirect(['action' => 'config', '?' => ['Accion' => 'Filtro de Rodales', 'Categoria' => 'Administracion']]);

                }

            }

        }

    }


    public function viewColumnsFiltros()
    {

        //Recupero los datos de la URL
        $data_url = $this->request->query;

        $action = $data_url['Accion'];
        $categoria= $data_url['Categoria'];
        $id = $data_url['id'];
        $table_name = $data_url['table_name'];

        $this->set('action', $action);
        $this->set('categoria', $categoria);
        $this->set('id_table', $id);
        $this->set('table_name', $table_name);

        $model_columns_filtro = $this->loadModel('ColumsFiltros');

        $tabla_columns_filtros = $model_columns_filtro->find('all', [])->where(['id_table_filtro' => $id]);


        $this->set('tabla_columns_filtros', $tabla_columns_filtros);

    }

    public function deleteColumnFiltro()
    {

        //Recupero los datos de la URL
        $data_url = $this->request->query;

        $id = $data_url['id'];
        $id_table= $data_url['id_table'];


        $this->request->allowMethod(['post', 'delete', 'get']);

        $modelColumnsFiltros = $this->loadModel('ColumsFiltros');

        $tablaColumnsfiltros = $modelColumnsFiltros->get($id);


        try{
            if ($modelColumnsFiltros->delete($tablaColumnsfiltros)) {
                $this->Flash->success(__('La Columna ha sido eliminada.'));
                return $this->redirect(['action' => 'viewColumnsFiltros', '?' => ['Accion' => 'Filtro de Rodales', 'Categoria' => 'Administracion', 'id' => $id_table]]);
            } else {
                $this->Flash->error(__('La Columna no pudo ser eliminada. Intente nuevamente.'));
            }
        }catch(\PDOException $e){
            $this->Flash->error(__($e->getMessage()));
            $this->Flash->error(__('La Columna no pudo ser eliminada. Intente nuevamente.'));
            return $this->redirect(['action' => 'viewColumnsFiltros', '?' => ['Accion' => 'Filtro de Rodales', 'Categoria' => 'Administracion']]);
        }

    }

    public function editColumnFiltro()
    {

        $data_url = $this->request->query;
        $action = $data_url['Accion'];
        $categoria= $data_url['Categoria'];
        $id = $data_url['id'];
        $table_name = $data_url['table_name'];
        $id_table = $data_url['id_table'];

        $this->set('action', $action);
        $this->set('categoria', $categoria);
        $this->set('table_name', $table_name);
        $this->set('id_table', $id_table);

        $modelColumnFiltros = $this->loadModel('ColumsFiltros');

        $tabla_col_filtro = $modelColumnFiltros->get($id, []);


        if ($this->request->is(['patch', 'post', 'put'])) {
            $tabla_col_filtro = $modelColumnFiltros->patchEntity($tabla_col_filtro, $this->request->data);
            if ($modelColumnFiltros->save($tabla_col_filtro)) {

                $this->Flash->success(__('La Descripción ha sido Editada!'));

                return $this->redirect(['action' => 'viewColumnsFiltros', '?' => ['Accion' => 'Filtro de Rodales', 'Categoria' => 'Administracion',
                    'id' => $id_table, 'table_name' => $table_name]]);


            } else {
                $this->Flash->error(__('Error. Intente nuevamente!'));
            }
        }


        $this->set('tabla_col_filtro', $tabla_col_filtro);

    }


    /*
     * Funciones utilizadas para los filtros
     */

    public function getColumnsTableSelect()
    {

        $this->autoRender = false;

        if($this->request->is('ajax')){

            //Realizo la consulta
            $data_url = $this->request->query;
            $tabla = $data_url['tabla'];

            $modelTablasFiltros = $this->loadModel('TablasFiltros');
            $tablaFiltro = null;

            //Si la $tabla es Inventario debo traer tmb el nombre de la EMSEFOR


            //Obtengo el id de la tabla para extraer las columnas
            if(!empty($tabla)){
                $tablaFiltro = $modelTablasFiltros->find('all', [])->where(['tabla_name' => $tabla])->first();
            }

            //Obtengo el ID de la tabla para extraer las columnas seleecionadas
            $idtabla = $tablaFiltro->idtablasfiltros;

            //Obtengo las columnas seleccionadas
            $modelColumnFiltros = $this->loadModel('ColumsFiltros');

            $tablaColumnsFiltros = $modelColumnFiltros->find('all', [])->where(['id_table_filtro' => $idtabla]);



            if(!empty($tablaColumnsFiltros)){
                return $this->json($tablaColumnsFiltros);
            }

            return $this->json(null);

        }

    }

    //Trae los valores unicos de las columnas, en el caso de emsefor debe trar los nombres
    public function getListValuesUniques()
    {
        $this->autoRender = false;

        if($this->request->is('ajax')){

            //Realizo la consulta
            $data_url = $this->request->query;
            $tabla = $data_url['tabla'];
            $column = $data_url['column'];

            //Si la columna es emsefor debo traer el nombre de emsefor



            if(!empty($tabla)){

                $modelTabla = $this->loadModel($tabla);

                if(!empty($column)){


                    //Consulto si la tabla en Plantaciones y la columna es emsefor
                    if(($tabla == 'Plantaciones' && $column == 'emsefor') || ($tabla == 'Intervenciones' && $column == 'emsefor') ||
                        ($tabla == 'Inventario' && $column == 'emsefor')){
                        //Cargo el modelo de emsefor y traigo los nombres
                        $modelEmsefor = $this->loadModel('Emsefor');
                        $resultUnique = $modelEmsefor->find()->select(['nombre'])->distinct(['nombre'])->toArray();



                    } else {
                        $resultUnique = $modelTabla->find()->select([$column])->distinct([$column])->toArray();
                        //$resultUnique = $modelTabla->find('all', [])->toArray();
                    }



                    if(!empty($resultUnique)){
                        return $this->json($resultUnique);
                    }

                }


            }
            return $this->json(null);

        }

    }

    public function applyFiltro()
    {

        $this->autoRender = false;

        if($this->request->is('ajax')){

            //Obtengo el arreglo para mandar la consulta
            $datos = json_decode(stripslashes( $_POST['data']));

            //1ro Obtengo todas las tablas que van a participar de la consulta

            //Como es un arreglo lo recorro con un foreach y luego hago la consulta
            //Obtengo todas las sentencias realizadas para la tabla rodales y creo un arreglo de referencias

            $tablas_consultas = [];

            //Creo 2 variables: $bolean_plantacion y $bolean_inventario y $bolean_intervencion y verifico desde donde hago la conexion
            $boolean_inventario = false;
            $boolean_plantaciones = false;
            $boolean_intervencion = false;

            //Al realizar la verificacion de las tablas busco una tabla que se llame false y no la incluyo

            foreach ($datos as $dat){
                $is_present = false;

                if(!$dat->tabla === 'false'){

                    foreach ($tablas_consultas as $tbl_csl){

                        if($dat->tabla == $tbl_csl){
                            $is_present = true;
                            break;
                        }

                    }
                }



                if($is_present == false){

                    if(strval($dat->tabla) != 'rodales'){
                        array_push($tablas_consultas, strval($dat->tabla));
                    }


                }

            }

            //Verifico que las tablas se menciones solo una vez, porque o sino se duplica
            $tablas_consultas_clear = array();
            $i = 1;
            foreach ($tablas_consultas as $tbl_con){

                if($i == 1){
                    array_push($tablas_consultas_clear, $tbl_con);
                    $i++;
                } else {

                    $bool_pres = false;
                    //Recorro el arreglo y busco coincidencia
                    foreach ($tablas_consultas_clear as $tbl_con_clear){

                        if($tbl_con_clear == $tbl_con){
                            $bool_pres = true;
                        }
                    }

                    if($bool_pres == false){
                        array_push($tablas_consultas_clear, $tbl_con);
                    }

                }



            }





            //Verifico la presencia de las tablas que se relacionan con emsefor
            foreach ($datos as $dat){


                if($dat->tabla === 'Plantaciones' && $dat->emsefor === 'true'){
                    $boolean_plantaciones = true;
                } elseif ($dat->tabla === 'Intervenciones' && $dat->emsefor === 'true'){
                    $boolean_intervencion = true;
                } elseif ($dat->tabla === 'Inventario' && $dat->emsefor === 'true'){
                    $boolean_inventario = true;
                }
            }


            //VERIFICO QUE LA TABLA EMSEFOR PARTICIPE AL MENOS UNA VEZ
            //VERIFICAR SI LA UNION SE REALIZA POR PLANTACIONES O POR INTERVENCIONES
            $boolean_emsefor_present = false;

            foreach ($datos as $dat){

                if($dat->emsefor === 'true'){
                    $boolean_emsefor_present =  true;
                }

            }

            $stmt_emsefor_plant = '';
            $stmt_emsefor_inter = '';
            $stmt_emsefor_invent = '';

            //Verifico cual de las Tabla que une a EMSEFOR ha participado de la UNION

            if($boolean_emsefor_present == true){


                //Verifico en cual de tablas participo
                if($boolean_plantaciones == true){
                    //Primero debo unir la tabla plantacion y luego emsefor
                    $stmt_emsefor_plant = 'INNER JOIN plantaciones as plant1 ON rodales.idrodales = plant1.rodales_idrodales 
                          INNER JOIN emsefor AS plan_ems ON plan_ems.idemsefor = plant1.emsefor_idemsefor';
                }

                if($boolean_intervencion == true){
                    //Primero debo unir la tabla plantacion y luego emsefor
                    $stmt_emsefor_inter = 'INNER JOIN intervenciones as inter1 ON rodales.idrodales = inter1.rodales_idrodales 
                          INNER JOIN emsefor AS inter_ems ON inter_ems.idemsefor = inter1.emsefor_idemsefor';

                }

                if($boolean_inventario == true){
                    //Primero debo unir la tabla plantacion y luego emsefor
                    $stmt_emsefor_invent = 'INNER JOIN inventario as inven1 ON rodales.idrodales = inven1.rodales_idrodales 
                          INNER JOIN emsefor AS inv_ems ON inv_ems.idemsefor = inven1.emsefor_idemsefor';

                }

            }



            //La tabla empresa siempre se va a agregar debido a que es utilizada en la Tabla de resultados
            //Como no todas las tablas tienen referencia en Rodales, realizo un filtro a partir de la variable global definido el en AppController

            $query = "";
            $i = 0;
            foreach ($datos as $dat){

                //Averiguo si llego un query con la notacion plantacion.emsefor
                $boolean_emsefor_present = false;
                if($i == 0){
                    $query = $query .'(' . $dat->query . ')';
                    $i++;
                } else {
                    $query = $query . ' AND (' . $dat->query . ')';
                }

            }

            //Evaluo las tablas presentes para agregar los INNER (la tabla_consultas es la que contiene las tablas que van a participar de llos INNER)
            $stmn_query = 'SELECT * FROM rodales INNER JOIN (SELECT DISTINCT idrodales FROM rodales as rodales ';

            //recorro el array de tablas que participan
            foreach ($tablas_consultas_clear as $tbl_con){

                $stmn_query = $stmn_query . ' ' . $this->addInnerToQuery($tbl_con);

            }

            //Realizo la Union de la tabla que se relaciona con EMSEFOR

            if($boolean_plantaciones == true){
                $stmn_query = $stmn_query . ' ' . $stmt_emsefor_plant;
            }
            if($boolean_intervencion == true){
                $stmn_query = $stmn_query . ' ' . $stmt_emsefor_inter;
            }

            if($boolean_inventario == true){
                $stmn_query = $stmn_query . ' ' . $stmt_emsefor_invent;
            }


            $stmn_query = $stmn_query . ' WHERE ' . $query . ') AS tbl ON rodales.idrodales = tbl.idrodales INNER JOIN empresa empresa ON rodales.empresa_idempresa = empresa.idempresa';



            $conecction = ConnectionManager::get('default');

            $tablaRodales = $conecction->execute($stmn_query)->fetchAll('assoc');

            return $this->json($tablaRodales);



        }

    }

    private function evalExistRelations($tabla)
    {

        $array_res = [];

        //Evalua si esta pertenece a alguna referencia de la tabla rodales
        //Compruebo si esta relacionada con alguna referencia de rodales
        foreach ($this->RODALES_RELATIONS as $tbl_rol_rlts){

           if($tbl_rol_rlts == 'empresa'){

           } else if($tbl_rol_rlts == 'sagpyas'){

               if($tbl_rol_rlts == $tabla){
                   $array_res = $array_res + [$tabla];
               }


           } else if($tbl_rol_rlts == 'plantaciones'){
               //Evaluo el arreglo para comprobar si pertenece a esta tabla la relacion
               foreach ($this->plantaciones_rel as $plant_rel){

                   if($plant_rel == $tabla ){
                       $array_res = [$tbl_rol_rlts => [$tabla]];
                   }

               }


           } else if($tbl_rol_rlts == 'intervenciones'){

           } else if($tbl_rol_rlts == 'inventario'){

           } else if($tbl_rol_rlts == 'parcelas_rel'){

           }

        }

        return $array_res;


    }


    private function addInnerToQuery($tabla)
    {

        //Aca realizo la consulta y hago la hago la union correspondiente

        if($tabla == "Sagpyas"){

            //Para unir sagpyas tengo que usar la tabla rodal_sagpya
            $query = 'INNER JOIN rodal_sagpya ON rodales_idrodales = idrodales INNER JOIN sagpyas sagpyas ON sagpya_idsagpya = idsagpya';

            return $query;

        } elseif ($tabla == "Plantaciones"){

            $query = 'INNER JOIN plantaciones AS plantaciones ON rodales.idrodales = plantaciones.rodales_idrodales';

            return $query;

        } elseif ($tabla == "Procedencias"){

            $query = 'INNER JOIN plantaciones AS plant ON rodales.idrodales = plant.rodales_idrodales INNER JOIN 
                procedencias AS procedencias ON plant.procedencias_idprocedencias = procedencias.idprocedencias';

            return $query;

        } elseif ($tabla == "Intervenciones"){

            $query = 'INNER JOIN intervenciones AS intervenciones ON rodales.idrodales = intervenciones.rodales_idrodales';

            return $query;

        }  elseif ($tabla == "Info_intervencion"){

            $query = 'INNER JOIN intervenciones AS inter ON rodales.idrodales = inter.rodales_idrodales INNER JOIN info_intervencion AS info_intervencion ON 
                        info_intervencion.intervencion_idintervencion = inter.idintervencion';

            return $query;

        } elseif ($tabla == "Inventario"){

            $query = 'INNER JOIN inventario AS inventario ON rodales.idrodales = inventario.rodales_idrodales';

            return $query;

        } elseif ($tabla == "Emsefor"){

            //Voy a utilizar la tabla inventrio

            $query = 'INNER JOIN inventario AS invent ON rodales.idrodales = invent.rodales_idrodales INNER JOIN emsefor as emsefor ON 
                        invent.emsefor_idemsefor = emsefor.idemsefor';

            return $query;

        }



    }

}
