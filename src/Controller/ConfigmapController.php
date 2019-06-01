<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;

/**
 * Configmap Controller
 * Se va a encargar de manejar las Conexiones con el Mapa
 */
class ConfigmapController extends AppController
{

    /*
     * Permite el Ingreso a Esta accion sin necesidad de especificar el componente de Autentificacion
     */
    public function beforeFilter(\Cake\Event\Event $event)
    {
        // allow all action
        $this->Auth->allow();
        $this->response->header('Access-Control-Allow-Origin', '*');
    }
    public function isAuthorized($user)
    {
        if(isset($user['role']) and $user['role'] === 'user')
        {
            if(in_array($this->request->action, ['index']))
            {
                return true;
            }
        }

        return parent::isAuthorized($user);
    }

    public function getConfigMap()
    {

        $this->autoRender = false;

        if ($this->request->is('ajax')) {
            //Ingreso a la base de datos y traigo los parametro de configuracion
            $tablaMapConfig = $this->loadModel('Mapconfig');
            $mapConfigData = $tablaMapConfig->find('all')->first();

            //En ambos casos deberia filtrar por el campo activo
            $tablaCapasBase = $this->loadModel('Capasbase');
            $capasbase = $tablaCapasBase->find('all', [
                'conditions' => ['active' => true]
            ]);
            $countcapasbase = $capasbase->count();

            //Obtengo la capabase default
            $capabasedefaultTable = $this->loadModel('Capabasedefault');
            $capabasedefault = $capabasedefaultTable->find('all', []);
            //Recorro los nombres de las capas base y creo un arreglo


            //Obtengo los Layers Overlay que corrsponde a la tabla gis
            $modelGis = $this->loadModel('Gis');
            $overlays = $this->getGisAsJson($modelGis);


            $res = [
                'dataconfig' => $mapConfigData,
                'capasbase' => $capasbase,
                'overlays' => $overlays,
                'countcapasbase' => $countcapasbase,
                'capabasedefault' =>$capabasedefault
            ];


            return $this->json($res);
        }
    }

    private function getGisAsJson($model){

        $feature = "'FeatureCollection'";
        $feat = "'Feature'";
        $query = 'SELECT row_to_json(fc) from (SELECT ' . $feature . '  as "type", 
        array_to_json(array_agg(f)) as "features"
        from (
            select ' . $feat . ' as "type",
            idrodales as "id", cod_sap as "cod_sap",
    
            (
            select json_strip_nulls(row_to_json(t)) 
            from (select parcela) t
            ) as "properties", 
            ST_AsGeoJson(ST_Transform(geom, 4326)) :: json as "geometry" 
            from gis INNER JOIN rodales ON gis.rodales_idrodales = rodales.idrodales
        ) as f 
        ) as fc ';

        //Ejecuto el Query de Muestra
        $conecction = ConnectionManager::get('default');
        $tablaRodales = $conecction->execute($query)->fetchAll('assoc');

        return $tablaRodales;

    }

    private function getLabelFromGisAsPoint($model)
    {

    }


}
