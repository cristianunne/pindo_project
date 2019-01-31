<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Relevamientos Controller
 *
 */
class RelevamientosController extends AppController
{

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

        //Recupero los datos de la URL
        $data_url = $this->request->query;

        $action = $data_url['Accion'];
        $categoria= $data_url['Categoria'];

        $relevamientoResumenModel = $this->loadModel('RelevamientoResumen');

        $tablaRelResumen = $relevamientoResumenModel->find('all', [
           'contain' => []
        ]);


        $this->set('action', $action);
        $this->set('categoria', $categoria);

        $this->set('tablaRelResumen', $tablaRelResumen);


    }

    public function parcelasView()
    {
        //Recupero los datos de la URL
        $data_url = $this->request->query;

        $action = $data_url['Accion'];
        $categoria= $data_url['Categoria'];
        $id = $data_url['id'];
        $sap = $data_url['sap'];

        $parcelasRelModel = $this->loadModel('ParcelasRel');

        $parcelasRelTable = $parcelasRelModel->find('all', [])->where(['rodales_idrodales' => $id])->contain('arboles_by_parcelas');


        $this->set('parcelasRelTable', $parcelasRelTable);

        $this->set('action', $action);
        $this->set('categoria', $categoria);
        $this->set('id_rodal', $id);
        $this->set('sap', $sap);

        $this->render('parcelas_view');
    }

    public function editParcelas()
    {
        //Recupero los datos de la URL
        $data_url = $this->request->query;

        $action = $data_url['Accion'];
        $categoria = $data_url['Categoria'];
        $id = $data_url['id'];
        $id_rodal = $data_url['id_rodal'];
        $sap = $data_url['sap'];

        $this->set('action', $action);
        $this->set('categoria', $categoria);
        $this->set('id_rodal', $id_rodal);
        $this->set('sap', $sap);

        $parcelasRelModel = $this->loadModel('ParcelasRel');
        $parcelaTable = $parcelasRelModel->get($id, []);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $parcelaTable = $parcelasRelModel->patchEntity($parcelaTable, $this->request->data);
            if ($parcelasRelModel->save($parcelaTable)) {

                $this->Flash->success(__('La Parcela ha sido Editada!'));

                return $this->redirect(['action' => 'parcelasView', '?' => ['Accion' => 'Ver Relevamientos', 'Categoria' => 'Relevamientos',
                    'id' => $id_rodal, 'sap' => $sap]]);


                //return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Error. Intente nuevamente!'));
            }
        }
        $this->set('parcelaTable', $parcelaTable);
        $this->render('parcelas_edit');

    }


    public function deleteParcelas()
    {
        //Recupero los datos de la URL
        $data_url = $this->request->query;

        $action = $data_url['Accion'];
        $categoria = $data_url['Categoria'];
        $id = $data_url['id'];
        $id_rodal = $data_url['id_rodal'];
        $sap = $data_url['sap'];

        $this->set('action', $action);
        $this->set('categoria', $categoria);
        $this->set('id_rodal', $id_rodal);
        $this->set('sap', $sap);


        $this->request->allowMethod(['post', 'delete']);
        $parcelasRelModel = $this->loadModel('ParcelasRel');

        $parcelasRelTable = $parcelasRelModel->get($id);
        if ($parcelasRelModel->delete($parcelasRelTable)) {

        } else {
            $this->Flash->error(__('Error al eliminar la Parcela. Intente nuevamente'));
        }

        return $this->redirect(['action' => 'parcelasView', '?' => ['Accion' => 'Ver Relevamientos', 'Categoria' => 'Relevamientos',
            'id' => $id_rodal, 'sap' => $sap]]);

    }

    public function viewArboles()
    {

        //Recupero los datos de la URL
        $data_url = $this->request->query;

        $action = $data_url['Accion'];
        $categoria = $data_url['Categoria'];
        $id = $data_url['id'];
        $id_rodal = $data_url['id_rodal'];
        $sap = $data_url['sap'];

        $this->set('action', $action);
        $this->set('categoria', $categoria);
        $this->set('id_rodal', $id_rodal);
        $this->set('sap', $sap);
        $this->set('id', $id);

        $arbolesRelModel = $this->loadModel('Arboles');

        $arbolesRelTable = $arbolesRelModel->find('all', [])->where(['parcela_idparcela' => $id]);


        $this->set('arbolesRelTable', $arbolesRelTable);


        $this->render('view_arboles');
    }

    public function editArboles()
    {
        //Recupero los datos de la URL
        $data_url = $this->request->query;

        $action = $data_url['Accion'];
        $categoria = $data_url['Categoria'];
        $id = $data_url['id'];
        $id_rodal = $data_url['id_rodal'];
        $sap = $data_url['sap'];
        $id_arbol = $data_url['id_arbol'];

        $arbolRelModel = $this->loadModel('Arboles');
        $arbolTable = $arbolRelModel->get($id_arbol, []);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $arbolTable = $arbolRelModel->patchEntity($arbolTable, $this->request->data);
            if ($arbolRelModel->save($arbolTable)) {

                $this->Flash->success(__('El árbol ha sido Editado!'));

                return $this->redirect(['action' => 'viewArboles', '?' => ['Accion' => 'Ver Árboles', 'Categoria' => 'Relevamientos',
                    'id' => $id,  'id_rodal' => $id_rodal, 'sap' => $sap]]);


                //return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Error. Intente nuevamente!'));
            }
        }
        $this->set('arbolTable', $arbolTable);



        $this->set('action', $action);
        $this->set('categoria', $categoria);
        $this->set('id_rodal', $id_rodal);
        $this->set('sap', $sap);
        $this->set('id', $id);


    }

    public function deleteArboles()
    {
        //Recupero los datos de la URL
        $data_url = $this->request->query;

        $action = $data_url['Accion'];
        $categoria = $data_url['Categoria'];
        $id = $data_url['id'];
        $id_rodal = $data_url['id_rodal'];
        $sap = $data_url['sap'];

        $id_arbol = $data_url['id_arbol'];

        $this->set('action', $action);
        $this->set('categoria', $categoria);
        $this->set('id_rodal', $id_rodal);
        $this->set('sap', $sap);
        $this->set('id', $id);


        $this->request->allowMethod(['post', 'delete']);
        $arbolRelModel = $this->loadModel('Arboles');

        $arbolTable = $arbolRelModel->get($id_arbol);
        if ($arbolRelModel->delete($arbolTable)) {

        } else {
            $this->Flash->error(__('Error al eliminar el Árbol. Intente nuevamente'));
        }

        return $this->redirect(['action' => 'viewArboles', '?' => ['Accion' => 'Ver Árboles', 'Categoria' => 'Relevamientos',
            'id' => $id,  'id_rodal' => $id_rodal, 'sap' => $sap]]);

    }


}
