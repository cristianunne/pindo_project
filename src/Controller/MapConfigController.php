<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * MapConfig Controller
 *
 * @property \App\Model\Table\MapConfigTable $MapConfig
 */
class MapConfigController extends AppController
{


    public function isAuthorized($user)
    {
        if(isset($user['role']) and $user['role'] === 'user')
        {
            if(in_array($this->request->action, []))
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
        $mapaConfig = $this->MapConfig->find('all', [])->first();
        $action = $data_url['Accion'];
        $categoria = $data_url['Categoria'];
        $this->set('action', $action);
        $this->set('categoria', $categoria);
        $this->set('mapaConfig', $mapaConfig);

    }

    public function add()
    {
        $data_url = $this->request->query;
        $action = $data_url['Accion'];
        $categoria = $data_url['Categoria'];
        $query = $this->MapConfig->find();
        $dt = $query->select(['count' => $query->func()->count('*')])->toArray();
        $cantidad = $dt[0]['count'];
        if($cantidad > 0){
            //voy a la funcion de Editar
            return $this->redirect(['action' => 'edit', '?' => ['Accion' => 'Editar Configuraciones de Mapa', 'Categoria' => 'Mapa']]);
        } else {
            $mapconfig = $this->MapConfig->newEntity();
            if ($this->request->is('post')) {
                $mapconfig = $this->MapConfig->patchEntity($mapconfig, $this->request->data);
                if($this->MapConfig->save($mapconfig)){
                    $this->Flash->success(__('Los Datos han sido guardado!.'));
                    //Cambiar el Redireccionamiento
                    return $this->redirect(['action' => 'index', '?' => ['Accion' => 'Ver Configuraciones de Mapa', 'Categoria' => 'Mapa']]);
                }
                $this->Flash->error(__('Verifique los datos e intente nuevamente'));
            }
            $this->set(compact('mapconfig'));
            $this->set('_serialize', ['mapconfig']);
        }
        $this->set('action', $action);
        $this->set('categoria', $categoria);
    }

    public function edit()
    {
        //Recupero los datos de la URL
        $data_url = $this->request->query;
        $action = $data_url['Accion'];
        $categoria = $data_url['Categoria'];
        $mapconfig = $this->MapConfig->find()->first();
        if ($this->request->is(['patch', 'post', 'put'])) {
            $mapconfig = $this->MapConfig->patchEntity($mapconfig, $this->request->data);
            if($this->MapConfig->save($mapconfig)){
                $this->Flash->success(__('La Configuraciòn del Mapa ha sido editada!.'));
                //Cambiar el Redireccionamiento
                return $this->redirect(['action' => 'index', '?' => ['Accion' => 'Ver Configuraciones de Mapa', 'Categoria' => 'Mapa']]);
            }
            $this->Flash->error(__('Verifique los datos e intente nuevamente'));
        }
        $this->set(compact('mapconfig'));
        $this->set('_serialize', ['mapconfig']);
        $this->set('action', $action);
        $this->set('categoria', $categoria);
    }


}
