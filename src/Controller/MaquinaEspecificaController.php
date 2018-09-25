<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Time;

/**
 * MaquinaEspecifica Controller
 *
 * @property \App\Model\Table\MaquinaEspecificaTable $MaquinaEspecifica
 */
class MaquinaEspecificaController extends AppController
{



    public function insertarMaquinaEspecifica()
    {
        $query = $this->MaquinaEspecifica->query();

        $query->insert(['modelo'])
            ->values([''])
            ->execute();

        $rowCount = 0;
        if(isset($query)){
            $array = (array)$query;
            $rowCount = count($array);
        }

        if($rowCount >= 1){
            return true;
        }

        return false;

    }


    public function edit()
    {

        $data_url = $this->request->query;

        $action = $data_url['Accion'];
        $categoria= $data_url['Categoria'];
        $id_maq_esp = $data_url['id_maq_esp'];
        $id_ems = $data_url['id_ems'];

        $this->set('action', $action);
        $this->set('categoria', $categoria);
        $this->set('id_ems', $id_ems);

        $maq_esp = $this->MaquinaEspecifica->get($id_maq_esp, [
            'contain' => []
        ]);

         if ($this->request->is(['patch', 'post', 'put'])) {
            $maq_esp = $this->MaquinaEspecifica->patchEntity($maq_esp, $this->request->data);
            if ($this->MaquinaEspecifica->save($maq_esp)) {

                 $this->Flash->set('/emsefor/view?Accion=Ver+Emsefor&Categoria=Emsefor&id_ems='.$id_ems, ['element' => 'success_2']);


                //return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The empresa could not be saved. Please, try again.'));
            }
        }

        $this->set('maquina_esp', $maq_esp);
        $this->set('_serialize', ['maquina_esp']);

    }

    public function addCostos()
    {

        $data_url = $this->request->query;

        $action = $data_url['Accion'];
        $categoria= $data_url['Categoria'];
        $id_maq_esp = $data_url['id_maq_esp'];
        $id_ems = $data_url['id_ems'];

        $this->set('action', $action);
        $this->set('categoria', $categoria);
        $this->set('id_ems', $id_ems);

        //Cargar la tabla ems_catoperario
        $tabla_MaqespCatop = $this->loadModel("MaqespCatop");


        $maq_esp = $this->MaquinaEspecifica->get($id_maq_esp, [
            'contain' => ['MaqespCatop']
        ]);

        $tipo_operarios = $this->loadModel('CatOperarios');
        $cat_operarios = $tipo_operarios->find('list', [
            'keyField' => 'idcat_operarios',
            'valueField' => 'categoria'
        ])->toArray();



        if ($this->request->is(['patch', 'post', 'put'])) {
            $maq_esp = $this->MaquinaEspecifica->patchEntity($maq_esp, $this->request->data);
            $maq_esp->tiene_costos = True;
            //Cargo la variable de actualizacion de Costos
            $maq_esp->act_costos = Time::now();

            if ($this->MaquinaEspecifica->save($maq_esp)) {

                //SI SE GUARDARON LOS COSTOS PONER A TRUE LA TABLA EMS_MAQ
                $maq_emsTable = $this->loadModel('EmsMaq');
                //Obtengo el query
                $query = $maq_emsTable->query();
                $res = $query->update()
                    ->set(['tiene_datos' => True])
                    ->where(['emsefor_idemsefor' => $id_ems, 'maquina_especifica_idmaquina_especifica' => $id_maq_esp])
                    ->execute();
                $rowCount = $res->rowCount();

                //Guardo los Sueldos del Operario


                if ($rowCount > 0){

                    //Guardo los datos del Sueldo
                    $sal_basico = $this->request->data['sal_basico_mes'];
                    $catop = $this->request->data['cat_operarios_idcat_operarios'];


                    $query_2 = $tabla_MaqespCatop->query();
                    $row_count2 = 0;

                    //si se genera el error debo actualizar
                    try{
                        $res2 = $query_2->insert(['cat_operarios_idcat_operarios', 'maquina_especifica_idmaquina_especifica', 'sal_basico_mes'])
                            ->values(['cat_operarios_idcat_operarios' => $catop,
                                'maquina_especifica_idmaquina_especifica' => $id_maq_esp,
                                'sal_basico_mes' => $sal_basico])->execute();
                        $row_count2 = $res2->rowCount();

                    } catch (\PDOException $e){
                       if ($e->getCode() == 23505){

                           $res2 = $query_2->update()
                               ->set(['cat_operarios_idcat_operarios' => $catop, 'sal_basico_mes'=> $sal_basico])
                               ->where(['maquina_especifica_idmaquina_especifica' => $id_maq_esp])
                               ->execute();

                           $row_count2 = $res2->rowCount();
                       }
                    }

                    if ($row_count2 > 0){
                        $this->Flash->success(__('Los Costos han sido guardados.'));
                    }  else {
                        $this->Flash->error(__('Existe un problema al guardar una referencia. Intente nuevamente.'));
                    }

                } else {
                    $this->Flash->error(__('Existe un problema al guardar una referencia. Intente nuevamente.'));
                }

                //return $this->redirect(['controller' => 'Emsefor', 'action' => 'view', '?' => ['Accion' => 'Ver Emsefor', 'Categoria' => 'Emsefor', 'id_ems' => $id_ems]]);
            } else {
                $this->Flash->error(__('Error al guardar los Costos. Intente nuevamente!.'));
            }

        }


        $this->set('maquina_esp', $maq_esp);
        $this->set('_serialize', ['maquina_esp']);

        $this->set('cat_operarios', $cat_operarios);

    }


    public function view()
    {
        $data_url = $this->request->query;

        $action = $data_url['Accion'];
        $categoria= $data_url['Categoria'];
        $id_maq_esp = $data_url['id_maq_esp'];
        $id_ems = $data_url['id_ems'];

        $this->set('action', $action);
        $this->set('categoria', $categoria);
        $this->set('id_ems', $id_ems);


        $maq_esp = $this->MaquinaEspecifica->get($id_maq_esp, [
            'contain' => ['MaqespCatop']
        ]);




        $tipo_operarios = $this->loadModel('CatOperarios');
        $cat_operarios = $tipo_operarios->find('list', [
            'keyField' => 'idcat_operarios',
            'valueField' => 'categoria'
        ])->toArray();

        $this->set('maquina_esp', $maq_esp);
        $this->set('_serialize', ['maquina_esp']);
        $this->set('cat_operarios', $cat_operarios);

    }


}
