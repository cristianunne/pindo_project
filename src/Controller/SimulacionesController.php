<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Simulaciones Controller
 *
 * @property \App\Model\Table\SimulacionesTable $Simulaciones
 */
class SimulacionesController extends AppController
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


    public function index()
    {

        $data_url = $this->request->query;
        $action = $data_url['Accion'];
        $categoria= $data_url['Categoria'];

        $this->set('action', $action);
        $this->set('categoria', $categoria);


        $simulaciones = $this->Simulaciones->find('all', []);

        $this->set('simulaciones', $simulaciones);


    }

    public function view()
    {
        $data_url = $this->request->query;
        $action = $data_url['Accion'];
        $categoria= $data_url['Categoria'];
        $id = $data_url['id'];

        $this->set('action', $action);
        $this->set('categoria', $categoria);

        $simulaciones = $this->Simulaciones->get($id, ['contain' => ['Rodales', 'SimulacionResumen', 'SimulacionesMaqesp' => 'MaquinaEspecifica']]);
        $this->set('simulaciones', $simulaciones);

        //Cargo el Modelo Plantaciones
        $plantacionesTable = $this->loadModel('Plantaciones');

        $plantacionesData = $plantacionesTable->find('all', [])
            ->contain(['Procedencias'])
            ->where(['rodales_idrodales' => $simulaciones->rodale->idrodales])->toArray();

        $this->set('plantacionesData', $plantacionesData);

    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);

        $simulacion = $this->Simulaciones->get($id);
        if ($this->Simulaciones->delete($simulacion)) {
            $this->Flash->success(__('La Simulación ha sido eliminada correctamente.'));
        } else {
            $this->Flash->error(__('Error al eliminar la Simulación, intente nuevamente.'));
        }

        return $this->redirect(['action' => 'index', '?' => ['Accion' => 'Ver Simulaciones', 'Categoria' => 'SIMNEA']]);

    }

}
