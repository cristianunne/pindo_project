<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Filesystem\Folder;
use Cake\Filesystem\File;

/**
 * Maquinas Controller
 *
 * @property \App\Model\Table\MaquinasTable $Maquinas
 */
class MaquinasController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {

           //Recupero los datos de la URL
        $data_url = $this->request->query;

        $action = $data_url['Accion'];
        $categoria= $data_url['Categoria'];

        $maquinas = $this->paginate($this->Maquinas);

        $this->set(compact('maquinas'));
        $this->set('_serialize', ['maquinas']);

        $this->set('action', $action);
        $this->set('categoria', $categoria);

    }

    /**
     * View method
     *
     * @param string|null $id Maquina id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $maquina = $this->Maquinas->get($id, [
            'contain' => []
        ]);

        $this->set('maquina', $maquina);
        $this->set('_serialize', ['maquina']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {


         //Recupero los datos de la URL
        $data_url = $this->request->query;

        $action = $data_url['Accion'];
        $categoria= $data_url['Categoria'];

        $maquina = $this->Maquinas->newEntity();
        if ($this->request->is('post')) {
            $maquina = $this->Maquinas->patchEntity($maquina, $this->request->data);
            if ($this->Maquinas->save($maquina)) {
                $this->Flash->success(__('La Maquina se ha guardado correctamente!'));

                return $this->redirect(['action' => 'index', '?' => ['Accion' => 'Ver Maquinas', 'Categoria' => 'Maquinas']]);
            }
            $this->Flash->error(__('The maquina could not be saved. Please, try again.'));
        }
        $this->set(compact('maquina'));
        $this->set('_serialize', ['maquina']);

        $this->set('action', $action);
        $this->set('categoria', $categoria);
    }

    /**
     * Edit method
     *
     * @param string|null $id Maquina id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit()
    {
         //Recupero los datos de la URL
        $data_url = $this->request->query;

        $action = $data_url['Accion'];
        $categoria= $data_url['Categoria'];
        $id = $data_url['id'];

        $this->set('action', $action);
        $this->set('categoria', $categoria);


        $maquina = $this->Maquinas->get($id, [
            'contain' => []
        ]);

         /*Obtengo al direccion de la carpeta y booro los archivos   */

            $url_carp = substr($maquina->photo_dir, 8);

            $dir = new Folder(WWW_ROOT.$url_carp);


        if ($this->request->is(['patch', 'post', 'put'])) {
            $maquina = $this->Maquinas->patchEntity($maquina, $this->request->data);
            if ($this->Maquinas->save($maquina)) {
                $this->Flash->success(__('La Maquina se ha Editado correctamente!.'));
                $dir->delete();

                 return $this->redirect(['action' => 'index', '?' => ['Accion' => 'Ver Maquinas', 'Categoria' => 'Maquinas']]);
            }
            $this->Flash->error(__('Error al Editar la Maquina. Intente nuevamente'));
        }
        $this->set(compact('maquina'));
        $this->set('_serialize', ['maquina']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Maquina id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $maquina = $this->Maquinas->get($id);

          /*Obtengo al direccion de la carpeta y booro los archivos   */

        $url_carp = substr($maquina->photo_dir, 8);
        $dir = new Folder(WWW_ROOT.$url_carp);


        if ($this->Maquinas->delete($maquina)) {
            $dir->delete();

           // unlink('9600554');

            $this->Flash->success(__('La maquina ha sido eliminada correctamente.'));
        } else {
            $this->Flash->error(__('Error al eliminar la maquina. Intente nuevamente.'));
        }

        return $this->redirect(['action' => 'index', '?' => ['Accion' => 'Ver Maquinas', 'Categoria' => 'Maquinas']]);
    }
}
