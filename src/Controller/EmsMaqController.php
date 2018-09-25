<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * EmsMaq Controller
 *
 * @property \App\Model\Table\EmsMaqTable $EmsMaq
 */
class EmsMaqController extends AppController
{


    public function asignar()
    {
        $data_url = $this->request->query;

        $action = $data_url['Accion'];
        $categoria= $data_url['Categoria'];
        $id_ems = $data_url['id_ems'];


        $this->set('action', $action);
        $this->set('categoria', $categoria);
        $this->set('id_ems', $id_ems);


        //Traigo las tablas modelos
        $tableMaquinas = $this->loadModel('Maquinas');
        $maquinas = $tableMaquinas->find('all');
        $this->set('maquinas', $maquinas);
        $this->set('_serialize', ['maquinas']);

    }


    public function add()
    {
        $data_url = $this->request->query;

        $action = $data_url['Accion'];
        $categoria= $data_url['Categoria'];
        $id_ems = $data_url['id_ems'];
        $id_maq = $data_url['id_maq'];

        $maq_controller = new MaquinaEspecificaController();

        //Llamar al controlador dela maquina especifica

        if( $maq_controller->insertarMaquinaEspecifica())
        {
            //Obtengo el id del ultimo registro creado vacio
            $tablaMaquinaEsp = $this->loadModel('MaquinaEspecifica');

            $queryMaqEsp = $tablaMaquinaEsp->find()
                ->select(['idmaquina_especifica'])
                ->order(['idmaquina_especifica' => 'DESC'])
                ->limit(1);

            $array_maq_esp = $queryMaqEsp->toArray();
            $id_maq_esp = $array_maq_esp[0]['idmaquina_especifica'];


            $emsMaq = $this->EmsMaq->newEntity();

            if ($this->request->is(['post', 'get'])) {

                    //Asigno los valores a la entidad
                    $emsMaq->emsefor_idemsefor = $id_ems;
                    $emsMaq->maquinas_idmaquinas = $id_maq;
                    $emsMaq->maquina_especifica_idmaquina_especifica = $id_maq_esp;

                    if ($this->EmsMaq->save($emsMaq)) {
                        $this->Flash->success(__('La Maquina ha sido Asignada correctamente!.'));

                        return $this->redirect(['action' => 'asignar', '?' => ['Accion' => 'Asigrnar Maquinas', 'Categoria' => 'Emsefor', 'id_ems' => $id_ems]]);
                    } else {

                        $this->Flash->error(__('Verifique los datos e intente nuevamente'));

                    }
            }

        }

    }


    public function delete()
    {
        $data_url = $this->request->query;
        $action = $data_url['Accion'];
        $categoria= $data_url['Categoria'];
        $id_ems = $data_url['id_ems'];
        $id_maq = $data_url['id_maq'];
        $id_maq_esp = $data_url['id_maq_esp'];

        $this->request->allowMethod(['post', 'delete', 'get']);

        $query = $this->EmsMaq->query();

        $stmt = $query->delete()
            ->where(['emsefor_idemsefor' => $id_ems, 'maquinas_idmaquinas' => $id_maq, 'maquina_especifica_idmaquina_especifica' => $id_maq_esp])
            ->execute();

        $rowCount = count($stmt);
        $rowCount = $stmt->rowCount();

        if($rowCount >= 1){

            //Accedor a la tabla Maquina especifica y borro tambien el registro de allí
            $tablaMaqEsp = $this->loadModel('MaquinaEspecifica');

            $quer_maq = $tablaMaqEsp->query();

              $stmt_maq = $quer_maq->delete()
            ->where(['idmaquina_especifica' => $id_maq_esp])
            ->execute();

            $rowCount_ = count($stmt_maq);
            $rowCount_ = $stmt_maq->rowCount();

              if($rowCount_ >= 1){
                        $this->Flash->set('/pindo_project/emsefor/view?Accion=Ver+Emsefor&Categoria=Emsefor&id_ems='.$id_ems, ['element' => 'success_2']);
                        return $this->redirect(['controller' => 'Emsefor', 'action' => 'view', '?' => ['Accion' => 'Ver Emsefor', 'Categoria' => 'Emsefor', 'id_ems' => $id_ems]]);
              }

        } else {
              $this->Flash->error(__('La Maquina no pudo eliminarse, intente nuevamente'));
        }
    }

}
