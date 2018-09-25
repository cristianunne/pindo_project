<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Time;

/**
 * VariablesGenerales Controller
 *
 *
 * @method \App\Model\Entity\VariablesGenerale[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class VariablesGeneralesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $variablesGenerales = $this->paginate($this->VariablesGenerales);

        $this->set(compact('variablesGenerales'));

    }

    /**
     * View method
     *
     * @param string|null $id Variables Generale id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view()
    {
        $data_url = $this->request->query;

        $action = $data_url['Accion'];
        $categoria= $data_url['Categoria'];
        $id_ems = $data_url['id_ems'];
        $id_var_gen = $data_url['id_var_gen'];

        $this->set('action', $action);
        $this->set('categoria', $categoria);
        $this->set('id_ems', $id_ems);
        $this->set('id_var_gen', $id_var_gen);

        $variablesGenerale = $this->VariablesGenerales->get($id_var_gen, [
            'contain' => []
        ]);

        $this->set('variablesGenerale', $variablesGenerale);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $data_url = $this->request->query;

        $action = $data_url['Accion'];
        $categoria= $data_url['Categoria'];
        $id_ems = $data_url['id_ems'];

        $this->set('action', $action);
        $this->set('categoria', $categoria);
        $this->set('id_ems', $id_ems);


        $variablesGenerale = $this->VariablesGenerales->newEntity();
        if ($this->request->is('post')) {
            $variablesGenerale = $this->VariablesGenerales->patchEntity($variablesGenerale, $this->request->getData());
            //Cargo la clave foranea
            $variablesGenerale->emsefor_idemsefor = $id_ems;

            //Fecha de los costos
            $variablesGenerale->fecha_act_costos = Time::now();

            if ($this->VariablesGenerales->save($variablesGenerale)) {
                $this->Flash->success(__('Las Variables Generales han sido guardadas.'));

                return $this->redirect(['controller' => 'Emsefor', 'action' => 'view', '?' => ['Accion' => 'Ver Emsefor', 'Categoria' => 'Emsefor', 'id_ems' => $id_ems]]);
            }
            $this->Flash->error(__('Error al guardar las Variables Generales. Intente nuevamente'));
        }
        $this->set(compact('variablesGenerale'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Variables Generale id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit()
    {

        $data_url = $this->request->query;

        $action = $data_url['Accion'];
        $categoria= $data_url['Categoria'];
        $id_ems = $data_url['id_ems'];
        $id_var_gen = $data_url['id_var_gen'];

        $this->set('action', $action);
        $this->set('categoria', $categoria);
        $this->set('id_ems', $id_ems);
        $this->set('id_var_gen', $id_var_gen);

        $variablesGenerale = $this->VariablesGenerales->get($id_var_gen, [
            'contain' => []
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $variablesGenerale = $this->VariablesGenerales->patchEntity($variablesGenerale, $this->request->getData());
            if ($this->VariablesGenerales->save($variablesGenerale)) {
                $this->Flash->success(__('Las Variables Generales han sido guardadas.'));

                return $this->redirect(['controller' => 'Emsefor', 'action' => 'view', '?' => ['Accion' => 'Ver Emsefor', 'Categoria' => 'Emsefor', 'id_ems' => $id_ems]]);
            }
            $this->Flash->error(__('Error al guardar las Variables Generales. Intente nuevamente'));
        }
        $this->set(compact('variablesGenerale'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Variables Generale id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $variablesGenerale = $this->VariablesGenerales->get($id);
        if ($this->VariablesGenerales->delete($variablesGenerale)) {
            $this->Flash->success(__('The variables generale has been deleted.'));
        } else {
            $this->Flash->error(__('The variables generale could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
