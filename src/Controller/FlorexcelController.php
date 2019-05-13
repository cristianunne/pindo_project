<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\Query;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

/**
 * Florexcel Controller
 *
 */
class FlorexcelController extends AppController
{

    public function isAuthorized($user)
    {
        if(isset($user['role']) and $user['role'] === 'user')
        {
            if(in_array($this->request->action, ['index', 'downloadAsExcel', 'parcelasSelect', 'preparedExcel']))
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

        if($this->request->is('post')){

            //Recorro el request data
            $request_data = $this->request->getData();
            debug($request_data);
            $flag = false;

            $array_rodal_sel = [];

            foreach ($request_data as $req){

                //Cuando el checkbox no se selecciona, se pasa con un valor de 0....
                if($req !== '0'){
                    $flag = true;

                    //Cargar la maquina
                    array_push($array_rodal_sel, $req);
                }
            }

            if ($flag == false){
                $this->Flash->error(__('Seleccione al menos 1 Rodal'));
            } else {

                //Agrego las maquinas a la Session
                $session = $this->request->session();
                $session->write([
                    'Florexcel.rodales_select' => $array_rodal_sel]);
                return $this->redirect(['action' => 'parcelasSelect', '?' => ['Accion' => 'Florexcel', 'Categoria' => 'Florexcel']]);

            }

        }


        $this->set('action', $action);
        $this->set('categoria', $categoria);

        $this->set('tablaRelResumen', $tablaRelResumen);

    }

    public function parcelasSelect()
    {
        //Recupero los datos de la URL
        $data_url = $this->request->query;

        $action = $data_url['Accion'];
        $categoria = $data_url['Categoria'];

        //recupero los datos de la session y hago un arreglo para insertar en el where
        $session = $this->request->getSession();
        $rodales_select = $session->read('Florexcel.rodales_select');

        //compruebo que los datos de la session no esten vacios
        if (empty($rodales_select)){

            $this->Flash->error(__('Debido al tiempo de Inactividad, se ha cerrado la Sesión y sus datos temporales de simulación han sido eliminados. Vuelva a repetir los pasos.'));
            return $this->redirect(['action' => 'index', '?' => ['Accion' => 'Florexcel', 'Categoria' => 'Florexcel']]);
        }

        $array_rodal_where = [];
        $array_claves = [];

        foreach ($rodales_select as $rodal){

            array_push($array_rodal_where, $rodal);

        }



        $parcelasRelModel = $this->loadModel('ParcelasRel');

        $parcelasRelTable = $parcelasRelModel->find('all', [])->where(['rodales_idrodales IN' => $array_rodal_where])->contain('arboles_by_parcelas');


        //Si selecciono parcelas, mando a la funcion download a descargar
        if($this->request->is('post')) {

            //Recorro el request data
            $request_data = $this->request->getData();
            $flag = false;

            $array_parcela_sel = [];

            foreach ($request_data as $req){

                //Cuando el checkbox no se selecciona, se pasa con un valor de 0....
                if($req !== '0'){
                    $flag = true;

                    //Cargar la maquina
                    array_push($array_parcela_sel, $req);
                }
            }

            if ($flag == false){
                $this->Flash->error(__('Seleccione al menos 1 Parcela'));
            } else {

                //Agrego las maquinas a la Session
                $session = $this->request->session();
                $session->write([
                    'Florexcel.parcelas_select' => $array_parcela_sel]);
                return $this->redirect(['action' => 'preparedExcel', '?' => ['Accion' => 'Florexcel', 'Categoria' => 'Florexcel']]);

            }


        }



        $this->set('action', $action);
        $this->set('categoria', $categoria);

        $this->set('parcelasRelTable', $parcelasRelTable);
    }

    public function preparedExcel()
    {
        //Recupero los datos de la URL
        $data_url = $this->request->query;

        $action = $data_url['Accion'];
        $categoria= $data_url['Categoria'];

        $session = $this->request->getSession();
        $parcelas_select = $session->read('Florexcel.parcelas_select');
        $rodales_select = $session->read('Florexcel.rodales_select');

        $rodalInvPlanModel = $this->loadModel('RodalesInvPlant');
        $rodalInvPlanTable = $rodalInvPlanModel->find('all', [])
            ->where(['idrodales IN' => $rodales_select]);



        $parcelasModel = $this->loadModel('ParcelasRel');

        $parcelasTable = $parcelasModel->find('all', [])->contain(['Arboles', 'Rodales'])
            ->where(['id_parcelas_rel IN' => $parcelas_select])
            ->orderAsc('rodales_idrodales, id_parcelas_rel');


        $this->set('action', $action);
        $this->set('categoria', $categoria);


    }

    public function downloadAsExcel()
    {

        $this->viewBuilder()->setLayout(null);
        $this->autoRender = false;

        $session = $this->request->getSession();
        $parcelas_select = $session->read('Florexcel.parcelas_select');
        $rodales_select = $session->read('Florexcel.rodales_select');


        //Traigo los Rodales

        $rodalInvPlanModel = $this->loadModel('RodalesInvPlant');
        $rodalInvPlanTable = $rodalInvPlanModel->find('all', [])->where(['idrodales IN' => $rodales_select]);


        //Obtengo las parcelas junto con los arboles

        $parcelasModel = $this->loadModel('ParcelasRel');

        $parcelasTable = $parcelasModel->find('all', [])->contain(['Rodales'])
            ->where(['id_parcelas_rel IN' => $parcelas_select])
            ->orderAsc('rodales_idrodales, id_parcelas_rel');


        $parcelasTableWithArbol = $parcelasModel->find('all', [])->contain(['Arboles', 'Rodales'])
            ->where(['id_parcelas_rel IN' => $parcelas_select])
            ->orderAsc('rodales_idrodales, id_parcelas_rel');


        $font_bold = [
            'font' => [
                'bold' => true
            ]
        ];

        //Ahora tengo que armar el excel en otro metodo y pasarle los rodales y los arboles
        $spreadsheet = new Spreadsheet();
        $nombre = "flor_Excel";
        $spreadsheet->getActiveSheet()->setTitle($nombre);
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', 'Rodal');
        $sheet->setCellValue('B1', 'Especie');
        $sheet->setCellValue('C1', 'Superficie');
        $sheet->setCellValue('D1', 'FechaPlant');
        $sheet->setCellValue('E1', 'FechaInv');


        $spreadsheet->getActiveSheet()->getStyle('A1')->applyFromArray($font_bold);
        $spreadsheet->getActiveSheet()->getStyle('B1')->applyFromArray($font_bold);
        $spreadsheet->getActiveSheet()->getStyle('C1')->applyFromArray($font_bold);
        $spreadsheet->getActiveSheet()->getStyle('D1')->applyFromArray($font_bold);
        $spreadsheet->getActiveSheet()->getStyle('E1')->applyFromArray($font_bold);


        //Seteo los datos del sitio
        $sheet->setCellValue('G1', 'Rodal');
        $sheet->setCellValue('H1', 'Parcela');
        $sheet->setCellValue('I1', 'Superficie');
        $sheet->setCellValue('J1', 'Pendiente');

        $spreadsheet->getActiveSheet()->getStyle('G1')->applyFromArray($font_bold);
        $spreadsheet->getActiveSheet()->getStyle('H1')->applyFromArray($font_bold);
        $spreadsheet->getActiveSheet()->getStyle('I1')->applyFromArray($font_bold);
        $spreadsheet->getActiveSheet()->getStyle('J1')->applyFromArray($font_bold);


        $sheet->setCellValue('L1', 'Rodal');
        $sheet->setCellValue('M1', 'Parcela');
        $sheet->setCellValue('N1', 'Id Arbol');
        $sheet->setCellValue('O1', 'Arbol');
        $sheet->setCellValue('P1', 'DAP');
        $sheet->setCellValue('Q1', 'Altura');
        $sheet->setCellValue('R1', 'altura_est');
        $sheet->setCellValue('S1', 'altura_poda');
        $sheet->setCellValue('T1', 'Calidad');

        $spreadsheet->getActiveSheet()->getStyle('L1')->applyFromArray($font_bold);
        $spreadsheet->getActiveSheet()->getStyle('M1')->applyFromArray($font_bold);
        $spreadsheet->getActiveSheet()->getStyle('N1')->applyFromArray($font_bold);
        $spreadsheet->getActiveSheet()->getStyle('O1')->applyFromArray($font_bold);
        $spreadsheet->getActiveSheet()->getStyle('P1')->applyFromArray($font_bold);
        $spreadsheet->getActiveSheet()->getStyle('Q1')->applyFromArray($font_bold);
        $spreadsheet->getActiveSheet()->getStyle('R1')->applyFromArray($font_bold);
        $spreadsheet->getActiveSheet()->getStyle('S1')->applyFromArray($font_bold);
        $spreadsheet->getActiveSheet()->getStyle('T1')->applyFromArray($font_bold);

        //Empiezo a cargar el excel con los datos

        $row_current = 2;
        foreach ($rodalInvPlanTable as $rodal){

            $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(1, $row_current, $rodal->cod_sap);
            $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(2, $row_current, $rodal->especie);
            //$spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(3, $row_current, $rodal->idrodales);
            $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(4, $row_current, $rodal->fecha->format('d-m-Y'));
            $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(5, $row_current, $rodal->fecha_inv->format('d-m-Y'));

            $row_current++;

        }

        //cargo las parcelas
        $row_current = 2;
        foreach ($parcelasTable as $parcela){

            $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(7, $row_current, $parcela->rodale->cod_sap);
            $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(8, $row_current, $parcela->id_parcelas_rel);
            //$spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(9, $row_current, $rodal->fecha->format('d-m-Y'));
            //$spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(10, $row_current, $rodal->fecha_inv->format('d-m-Y'));

            //Revisar el tema de la Pendiente y la superficie si agregar o no

            $row_current++;
        }


        //cargo los arboles
        $row_current = 2;
        $parcela_last = null;
        $id_inc = 1;

        foreach ($parcelasTableWithArbol as $parcela){

            if($parcela->id_parcelas_rel == $parcela_last){

                $id_inc++;
            } else {
                $id_inc = 1;
            }


            $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(12, $row_current, $parcela->rodale->cod_sap);
            $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(13, $row_current, $parcela->id_parcelas_rel);
            $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(14, $row_current, $parcela->arbole->idarbol);

            //va la numeracion de los arboles
            $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(15, $row_current, $id_inc);

            $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(16, $row_current, $parcela->arbole->dap);
            $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(17, $row_current, $parcela->arbole->altura);
            $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(18, $row_current, '');
            $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(19, $row_current, $parcela->arbole->altura_poda);
            $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(20, $row_current, $parcela->arbole->calidad);

            //Revisar el tema de la Pendiente y la superficie si agregar o no
            $parcela_last = $parcela->id_parcelas_rel;

            $row_current++;
        }


        //autoajusta las columnas
        foreach(range('A1','T1') as $columnID) {
            $spreadsheet->getActiveSheet()->getColumnDimension($columnID)
                ->setAutoSize(true);
        }



        $path = WWW_ROOT . '/files/florexcel/' . $nombre .'.xlsx';

        $writer = new Xlsx($spreadsheet);
        $writer->save($path);

        $this->response->file($path,
            ['download' => true]
        );

        return $this->response;




    }


}
