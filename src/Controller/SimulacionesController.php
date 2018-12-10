<?php
namespace App\Controller;

use App\Controller\AppController;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

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


        $simulaciones = $this->Simulaciones->find('all', ['contain' => ['Rodales', 'Emsefor']]);

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

        $simulaciones = $this->Simulaciones->get($id, ['contain' => ['Rodales', 'Emsefor', 'SimulacionResumen', 'SimulacionesMaqesp' => 'MaquinaEspecifica']]);
        $this->set('simulaciones', $simulaciones);


        //Cargo el Modelo Plantaciones
        $plantacionesTable = $this->loadModel('Plantaciones');

        $plantacionesData = $plantacionesTable->find('all', [])
            ->contain(['Procedencias'])
            ->where(['rodales_idrodales' => $simulaciones->rodale->idrodales])->toArray();

        $this->set('plantacionesData', $plantacionesData);



    }


    public function downloadAsExcel()
    {

        $this->viewBuilder()->setLayout(null);
        $this->autoRender = false;


        $styleHeaderCell = [
            'font' => [
                'bold' => true,
                'color' => ['rgb' => 'FFFFFF']
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            ],
            'borders' => [
                'top' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['rgb' => '999999']
                ],
                'left' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['rgb' => '999999']
                ],
                'right' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['rgb' => '999999']
                ],
                'bottom' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['rgb' => '999999']
                ],
            ],
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'startColor' => [
                    'argb' => 'ff0c9657',
                ]
            ],
        ];

        $styleCellCenterWithBorder = [
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['rgb' => '999999']
                ]
            ]
        ];

        $styleHeaderCellColorGreen = [
            'font' => [
                'bold' => true,
                'color' => ['argb' => 'ff006400']
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
            ],
            'borders' => [
                'top' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['rgb' => '999999']
                ],
                'left' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['rgb' => '999999']
                ],
                'right' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['rgb' => '999999']
                ],
                'bottom' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['rgb' => '999999']
                ],
            ],

        ];
        $font_bold = [
            'font' => [
                'bold' => true
            ]
        ];



        //Obtengo los datos
        $data_url = $this->request->query;
        $action = $data_url['Accion'];
        $categoria= $data_url['Categoria'];
        $id = $data_url['id'];

        $simulaciones = $this->Simulaciones->get($id, ['contain' => ['Rodales', 'Emsefor', 'SimulacionResumen', 'SimulacionesMaqesp' => 'MaquinaEspecifica']]);
        $this->set('simulaciones', $simulaciones);

        //Cargo el Modelo Plantaciones
        $plantacionesTable = $this->loadModel('Plantaciones');

        $plantacionesData = $plantacionesTable->find('all', [])
            ->contain(['Procedencias'])
            ->where(['rodales_idrodales' => $simulaciones->rodale->idrodales])->toArray();

        $spreadsheet = new Spreadsheet();
        $spreadsheet->getActiveSheet()->setTitle("Simulacion");
        $sheet = $spreadsheet->getActiveSheet();
        //Set Propiedades
        $sheet->setCellValue('A1', 'Tipo de Simulación');
        $sheet->setCellValue('A2', 'Sistema de Cosecha');
        $sheet->setCellValue('A3', 'Emsefor');
        $sheet->setCellValue('A4', 'Fecha de Simulacion');

        $spreadsheet->getActiveSheet()->getStyle('A1')->applyFromArray($font_bold);
        $spreadsheet->getActiveSheet()->getStyle('A2')->applyFromArray($font_bold);
        $spreadsheet->getActiveSheet()->getStyle('A3')->applyFromArray($font_bold);
        $spreadsheet->getActiveSheet()->getStyle('A4')->applyFromArray($font_bold);


        //Cargo las propiedades
        $sheet->setCellValue('B1', $simulaciones->tipo_simulacion);
        $sheet->setCellValue('B2', $simulaciones->sistema_cosecha);
        $sheet->setCellValue('B3', $simulaciones->emsefor->nombre);
        $sheet->setCellValue('B4', $simulaciones->fecha);


        //Seteo los datos del sitio
        $sheet->setCellValue('A6', 'ID Rodal');
        $sheet->setCellValue('B6', 'Código SAP');
        $sheet->setCellValue('C6', 'Especie');
        $sheet->setCellValue('D6', 'Superficie [ha]');
        $sheet->setCellValue('E6', 'Volumen Medio [m3]');
        $sheet->setCellValue('F6', 'Distancia Extracción [m]');
        $spreadsheet->getActiveSheet()->getStyle('A6')->applyFromArray($styleHeaderCell);
        $spreadsheet->getActiveSheet()->getStyle('B6')->applyFromArray($styleHeaderCell);
        $spreadsheet->getActiveSheet()->getStyle('C6')->applyFromArray($styleHeaderCell);
        $spreadsheet->getActiveSheet()->getStyle('D6')->applyFromArray($styleHeaderCell);
        $spreadsheet->getActiveSheet()->getStyle('E6')->applyFromArray($styleHeaderCell);
        $spreadsheet->getActiveSheet()->getStyle('F6')->applyFromArray($styleHeaderCell);



        $sheet->setCellValue('A7', $simulaciones->rodale->idrodales);
        $sheet->setCellValue('B7', $simulaciones->rodale->cod_sap);
        $sheet->setCellValue('C7', $plantacionesData[0]->procedencia->especie);
        $sheet->setCellValue('D7', $simulaciones['superficie']);
        $sheet->setCellValue('E7', $simulaciones['vol_medio']);
        $sheet->setCellValue('F7', $simulaciones['dist_extraccion']);

        $spreadsheet->getActiveSheet()->getStyle('A7:F7')->applyFromArray($styleCellCenterWithBorder);

        //Cargo los datos de las maquinas individuales
        //Seteo los datos del sitio
        $sheet->setCellValue('A9', 'Actividad');
        $sheet->setCellValue('B9', 'Máquina');
        $sheet->setCellValue('C9', 'Productividad [m³/hs.ef]');
        $sheet->setCellValue('D9', 'Productividad Real [m³/hs]');
        $sheet->setCellValue('E9', 'Producción Mes [m³/mes]');

        $spreadsheet->getActiveSheet()->getStyle('A9')->applyFromArray($styleHeaderCell);
        $spreadsheet->getActiveSheet()->getStyle('B9')->applyFromArray($styleHeaderCell);
        $spreadsheet->getActiveSheet()->getStyle('C9')->applyFromArray($styleHeaderCell);
        $spreadsheet->getActiveSheet()->getStyle('D9')->applyFromArray($styleHeaderCell);
        $spreadsheet->getActiveSheet()->getStyle('E9')->applyFromArray($styleHeaderCell);


        //Inicio de fila es 9 = A9
        $row_current = 10;

        //Porceso de a unos las maquinas
        foreach ($simulaciones->simulaciones_maqesp as $maquinas){

            if($maquinas['actividad'] == 'Corte'){

                $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(1, $row_current, $maquinas['actividad']);
                $spreadsheet->getActiveSheet()->getCellByColumnAndRow(1, $row_current)->getStyle()->applyFromArray($styleCellCenterWithBorder);

                $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(2, $row_current, $maquinas->maquina_especifica->nombre. " ".$maquinas->maquina_especifica->modelo);
                $spreadsheet->getActiveSheet()->getCellByColumnAndRow(2, $row_current)->getStyle()->applyFromArray($styleCellCenterWithBorder);

                $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(3, $row_current, bcdiv($maquinas['productividad'], '1', 2));
                $spreadsheet->getActiveSheet()->getCellByColumnAndRow(3, $row_current)->getStyle()->applyFromArray($styleCellCenterWithBorder);

                $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(4, $row_current, bcdiv($maquinas['productividad_real'], '1', 2));
                $spreadsheet->getActiveSheet()->getCellByColumnAndRow(4, $row_current)->getStyle()->applyFromArray($styleCellCenterWithBorder);

                $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(5, $row_current, bcdiv($maquinas['produccion_mes'], '1', 2));
                $spreadsheet->getActiveSheet()->getCellByColumnAndRow(5, $row_current)->getStyle()->applyFromArray($styleCellCenterWithBorder);
                $row_current = $row_current + 1;
            }
        }

        //Porceso de a unos las maquinas
        foreach ($simulaciones->simulaciones_maqesp as $maquinas){

            if($maquinas['actividad'] == 'Extraccion'){

                $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(1, $row_current, $maquinas['actividad']);
                $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(2, $row_current, $maquinas->maquina_especifica->nombre. " ".$maquinas->maquina_especifica->modelo);
                $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(3, $row_current, bcdiv($maquinas['productividad'], '1', 2));
                $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(4, $row_current, bcdiv($maquinas['productividad_real'], '1', 2));
                $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(5, $row_current, bcdiv($maquinas['produccion_mes'], '1', 2));

                $spreadsheet->getActiveSheet()->getCellByColumnAndRow(1, $row_current)->getStyle()->applyFromArray($styleCellCenterWithBorder);
                $spreadsheet->getActiveSheet()->getCellByColumnAndRow(2, $row_current)->getStyle()->applyFromArray($styleCellCenterWithBorder);
                $spreadsheet->getActiveSheet()->getCellByColumnAndRow(3, $row_current)->getStyle()->applyFromArray($styleCellCenterWithBorder);
                $spreadsheet->getActiveSheet()->getCellByColumnAndRow(4, $row_current)->getStyle()->applyFromArray($styleCellCenterWithBorder);
                $spreadsheet->getActiveSheet()->getCellByColumnAndRow(5, $row_current)->getStyle()->applyFromArray($styleCellCenterWithBorder);

                $row_current = $row_current + 1;
            }

        }

        //Porceso de a unos las maquinas
        foreach ($simulaciones->simulaciones_maqesp as $maquinas){

            if($maquinas['actividad'] == 'Proceso'){

                $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(1, $row_current, $maquinas['actividad']);
                $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(2, $row_current, $maquinas->maquina_especifica->nombre. " ".$maquinas->maquina_especifica->modelo);
                $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(3, $row_current, bcdiv($maquinas['productividad'], '1', 2));
                $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(4, $row_current, bcdiv($maquinas['productividad_real'], '1', 2));
                $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(5, $row_current, bcdiv($maquinas['produccion_mes'], '1', 2));
                $spreadsheet->getActiveSheet()->getCellByColumnAndRow(1, $row_current)->getStyle()->applyFromArray($styleCellCenterWithBorder);
                $spreadsheet->getActiveSheet()->getCellByColumnAndRow(2, $row_current)->getStyle()->applyFromArray($styleCellCenterWithBorder);
                $spreadsheet->getActiveSheet()->getCellByColumnAndRow(3, $row_current)->getStyle()->applyFromArray($styleCellCenterWithBorder);
                $spreadsheet->getActiveSheet()->getCellByColumnAndRow(4, $row_current)->getStyle()->applyFromArray($styleCellCenterWithBorder);
                $spreadsheet->getActiveSheet()->getCellByColumnAndRow(5, $row_current)->getStyle()->applyFromArray($styleCellCenterWithBorder);
                $row_current = $row_current + 1;
            }

        }

        //Porceso de a unos las maquinas
        foreach ($simulaciones->simulaciones_maqesp as $maquinas){

            if($maquinas['actividad'] == 'Carga'){

                $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(1, $row_current, $maquinas['actividad']);
                $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(2, $row_current, $maquinas->maquina_especifica->nombre. " ".$maquinas->maquina_especifica->modelo);
                $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(3, $row_current, bcdiv($maquinas['productividad'], '1', 2));
                $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(4, $row_current, bcdiv($maquinas['productividad_real'], '1', 2));
                $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(5, $row_current, bcdiv($maquinas['produccion_mes'], '1', 2));
                $spreadsheet->getActiveSheet()->getCellByColumnAndRow(1, $row_current)->getStyle()->applyFromArray($styleCellCenterWithBorder);
                $spreadsheet->getActiveSheet()->getCellByColumnAndRow(2, $row_current)->getStyle()->applyFromArray($styleCellCenterWithBorder);
                $spreadsheet->getActiveSheet()->getCellByColumnAndRow(3, $row_current)->getStyle()->applyFromArray($styleCellCenterWithBorder);
                $spreadsheet->getActiveSheet()->getCellByColumnAndRow(4, $row_current)->getStyle()->applyFromArray($styleCellCenterWithBorder);
                $spreadsheet->getActiveSheet()->getCellByColumnAndRow(5, $row_current)->getStyle()->applyFromArray($styleCellCenterWithBorder);
                $row_current = $row_current + 1;
            }
        }

        //Genero 2 espacios de distancia entre las tablas
        $row_current = $row_current + 2;

        //Cargo la Segunda Tabla

        //Cargo los datos de las maquinas individuales
        //Seteo los datos del sitio
        $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(1, $row_current, 'Actividad');
        $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(2, $row_current, 'Máquina');
        $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(3, $row_current, 'Costo Fijo [$/mes]');
        $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(4, $row_current, 'Costo Variable [$/mes]');
        $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(5, $row_current, 'Costo Total [$/mes]');

        $spreadsheet->getActiveSheet()->getCellByColumnAndRow(1, $row_current)->getStyle()->applyFromArray($styleHeaderCell);
        $spreadsheet->getActiveSheet()->getCellByColumnAndRow(2, $row_current)->getStyle()->applyFromArray($styleHeaderCell);
        $spreadsheet->getActiveSheet()->getCellByColumnAndRow(3, $row_current)->getStyle()->applyFromArray($styleHeaderCell);
        $spreadsheet->getActiveSheet()->getCellByColumnAndRow(4, $row_current)->getStyle()->applyFromArray($styleHeaderCell);
        $spreadsheet->getActiveSheet()->getCellByColumnAndRow(5, $row_current)->getStyle()->applyFromArray($styleHeaderCell);


        $row_current = $row_current + 1;

        //Porceso de a unos las maquinas
        foreach ($simulaciones->simulaciones_maqesp as $maquinas){

            if($maquinas['actividad'] == 'Corte'){

                $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(1, $row_current, $maquinas['actividad']);
                $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(2, $row_current, $maquinas->maquina_especifica->nombre. " ".$maquinas->maquina_especifica->modelo);
                $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(3, $row_current, bcdiv($maquinas['costo_fijo'], '1', 2));
                $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(4, $row_current, bcdiv($maquinas['costo_variable'], '1', 2));
                $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(5, $row_current, bcdiv($maquinas['costo_total'], '1', 2));

                $spreadsheet->getActiveSheet()->getCellByColumnAndRow(1, $row_current)->getStyle()->applyFromArray($styleCellCenterWithBorder);
                $spreadsheet->getActiveSheet()->getCellByColumnAndRow(2, $row_current)->getStyle()->applyFromArray($styleCellCenterWithBorder);
                $spreadsheet->getActiveSheet()->getCellByColumnAndRow(3, $row_current)->getStyle()->applyFromArray($styleCellCenterWithBorder);
                $spreadsheet->getActiveSheet()->getCellByColumnAndRow(4, $row_current)->getStyle()->applyFromArray($styleCellCenterWithBorder);
                $spreadsheet->getActiveSheet()->getCellByColumnAndRow(5, $row_current)->getStyle()->applyFromArray($styleCellCenterWithBorder);
                $row_current = $row_current + 1;
            }
        }

        //Porceso de a unos las maquinas
        foreach ($simulaciones->simulaciones_maqesp as $maquinas){

            if($maquinas['actividad'] == 'Extraccion'){

                $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(1, $row_current, $maquinas['actividad']);
                $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(2, $row_current, $maquinas->maquina_especifica->nombre. " ".$maquinas->maquina_especifica->modelo);
                $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(3, $row_current, bcdiv($maquinas['costo_fijo'], '1', 2));
                $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(4, $row_current, bcdiv($maquinas['costo_variable'], '1', 2));
                $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(5, $row_current, bcdiv($maquinas['costo_total'], '1', 2));
                $spreadsheet->getActiveSheet()->getCellByColumnAndRow(1, $row_current)->getStyle()->applyFromArray($styleCellCenterWithBorder);
                $spreadsheet->getActiveSheet()->getCellByColumnAndRow(2, $row_current)->getStyle()->applyFromArray($styleCellCenterWithBorder);
                $spreadsheet->getActiveSheet()->getCellByColumnAndRow(3, $row_current)->getStyle()->applyFromArray($styleCellCenterWithBorder);
                $spreadsheet->getActiveSheet()->getCellByColumnAndRow(4, $row_current)->getStyle()->applyFromArray($styleCellCenterWithBorder);
                $spreadsheet->getActiveSheet()->getCellByColumnAndRow(5, $row_current)->getStyle()->applyFromArray($styleCellCenterWithBorder);
                $row_current = $row_current + 1;
            }

        }

        //Porceso de a unos las maquinas
        foreach ($simulaciones->simulaciones_maqesp as $maquinas){

            if($maquinas['actividad'] == 'Proceso'){

                $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(1, $row_current, $maquinas['actividad']);
                $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(2, $row_current, $maquinas->maquina_especifica->nombre. " ".$maquinas->maquina_especifica->modelo);
                $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(3, $row_current, bcdiv($maquinas['costo_fijo'], '1', 2));
                $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(4, $row_current, bcdiv($maquinas['costo_variable'], '1', 2));
                $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(5, $row_current, bcdiv($maquinas['costo_total'], '1', 2));
                $spreadsheet->getActiveSheet()->getCellByColumnAndRow(1, $row_current)->getStyle()->applyFromArray($styleCellCenterWithBorder);
                $spreadsheet->getActiveSheet()->getCellByColumnAndRow(2, $row_current)->getStyle()->applyFromArray($styleCellCenterWithBorder);
                $spreadsheet->getActiveSheet()->getCellByColumnAndRow(3, $row_current)->getStyle()->applyFromArray($styleCellCenterWithBorder);
                $spreadsheet->getActiveSheet()->getCellByColumnAndRow(4, $row_current)->getStyle()->applyFromArray($styleCellCenterWithBorder);
                $spreadsheet->getActiveSheet()->getCellByColumnAndRow(5, $row_current)->getStyle()->applyFromArray($styleCellCenterWithBorder);
                $row_current = $row_current + 1;
            }

        }

        //Porceso de a unos las maquinas
        foreach ($simulaciones->simulaciones_maqesp as $maquinas){

            if($maquinas['actividad'] == 'Carga'){

                $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(1, $row_current, $maquinas['actividad']);
                $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(2, $row_current, $maquinas->maquina_especifica->nombre. " ".$maquinas->maquina_especifica->modelo);
                $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(3, $row_current, bcdiv($maquinas['costo_fijo'], '1', 2));
                $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(4, $row_current, bcdiv($maquinas['costo_variable'], '1', 2));
                $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(5, $row_current, bcdiv($maquinas['costo_total'], '1', 2));
                $spreadsheet->getActiveSheet()->getCellByColumnAndRow(1, $row_current)->getStyle()->applyFromArray($styleHeaderCell);
                $spreadsheet->getActiveSheet()->getCellByColumnAndRow(2, $row_current)->getStyle()->applyFromArray($styleHeaderCell);
                $spreadsheet->getActiveSheet()->getCellByColumnAndRow(3, $row_current)->getStyle()->applyFromArray($styleHeaderCell);
                $spreadsheet->getActiveSheet()->getCellByColumnAndRow(4, $row_current)->getStyle()->applyFromArray($styleHeaderCell);
                $spreadsheet->getActiveSheet()->getCellByColumnAndRow(5, $row_current)->getStyle()->applyFromArray($styleHeaderCell);


                $spreadsheet->getActiveSheet()->getCellByColumnAndRow(1, $row_current)->getStyle()->applyFromArray($styleCellCenterWithBorder);
                $spreadsheet->getActiveSheet()->getCellByColumnAndRow(2, $row_current)->getStyle()->applyFromArray($styleCellCenterWithBorder);
                $spreadsheet->getActiveSheet()->getCellByColumnAndRow(3, $row_current)->getStyle()->applyFromArray($styleCellCenterWithBorder);
                $spreadsheet->getActiveSheet()->getCellByColumnAndRow(4, $row_current)->getStyle()->applyFromArray($styleCellCenterWithBorder);
                $spreadsheet->getActiveSheet()->getCellByColumnAndRow(5, $row_current)->getStyle()->applyFromArray($styleCellCenterWithBorder);
                $row_current = $row_current + 1;
            }
        }

        //Genero 2 espacios de distancia entre las tablas
        $row_current = $row_current + 2;

        //Seteo los datos del sitio
        $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(1, $row_current, 'Actividad');
        $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(2, $row_current, 'Producción Mes [m³/mes]');
        $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(3, $row_current, 'Actividad Limitante');
        $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(4, $row_current, 'Balance [%]');
        $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(5, $row_current, 'Costo Total [$/mes]');

        $spreadsheet->getActiveSheet()->getCellByColumnAndRow(1, $row_current)->getStyle()->applyFromArray($styleHeaderCell);
        $spreadsheet->getActiveSheet()->getCellByColumnAndRow(2, $row_current)->getStyle()->applyFromArray($styleHeaderCell);
        $spreadsheet->getActiveSheet()->getCellByColumnAndRow(3, $row_current)->getStyle()->applyFromArray($styleHeaderCell);
        $spreadsheet->getActiveSheet()->getCellByColumnAndRow(4, $row_current)->getStyle()->applyFromArray($styleHeaderCell);
        $spreadsheet->getActiveSheet()->getCellByColumnAndRow(5, $row_current)->getStyle()->applyFromArray($styleHeaderCell);
        $row_current = $row_current + 1;

        foreach ($simulaciones->simulacion_resumen as $sim_res){

            $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(1, $row_current, $sim_res['tarea']);
            $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(2, $row_current, $sim_res['produccion_mes']);
            $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(3, $row_current, $sim_res['actividad_lim']);
            $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(4, $row_current, bcdiv($sim_res['balance'], '1', 2));
            $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(5, $row_current, bcdiv($sim_res['costo_total'], '1', 2));

            $spreadsheet->getActiveSheet()->getCellByColumnAndRow(1, $row_current)->getStyle()->applyFromArray($styleCellCenterWithBorder);
            $spreadsheet->getActiveSheet()->getCellByColumnAndRow(2, $row_current)->getStyle()->applyFromArray($styleCellCenterWithBorder);
            $spreadsheet->getActiveSheet()->getCellByColumnAndRow(3, $row_current)->getStyle()->applyFromArray($styleCellCenterWithBorder);
            $spreadsheet->getActiveSheet()->getCellByColumnAndRow(4, $row_current)->getStyle()->applyFromArray($styleCellCenterWithBorder);
            $spreadsheet->getActiveSheet()->getCellByColumnAndRow(5, $row_current)->getStyle()->applyFromArray($styleCellCenterWithBorder);

            $row_current = $row_current + 1;
        }

        //Produccion del Equipo de Cosecha
        $row_current = $row_current + 2;
        $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(1, $row_current, 'PRODUCCIÓN DEL EQUIPO DE COSECHA');
        $spreadsheet->getActiveSheet()->getCellByColumnAndRow(1, $row_current)->getStyle()->applyFromArray($font_bold);

        $row_current = $row_current + 2;


        $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(1, $row_current, 'Producción total [m³/mes]');
        $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(2, $row_current, bcdiv($simulaciones['produccion_total'], '1', 2));
        $spreadsheet->getActiveSheet()->getCellByColumnAndRow(1, $row_current)->getStyle()->applyFromArray($styleHeaderCellColorGreen);
        $spreadsheet->getActiveSheet()->getCellByColumnAndRow(2, $row_current)->getStyle()->applyFromArray($styleCellCenterWithBorder);

        $row_current = $row_current + 1;
        $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(1, $row_current, 'Volumen total del lote (bruto) [m³]');
        $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(2, $row_current, bcdiv($simulaciones['vol_total'], '1', 2));
        $spreadsheet->getActiveSheet()->getCellByColumnAndRow(1, $row_current)->getStyle()->applyFromArray($styleHeaderCellColorGreen);
        $spreadsheet->getActiveSheet()->getCellByColumnAndRow(2, $row_current)->getStyle()->applyFromArray($styleCellCenterWithBorder);
        $row_current = $row_current + 1;
        $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(1, $row_current, 'Días necesarios para cosechar el lote [Días]');
        $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(2, $row_current, bcdiv($simulaciones['dias_cosecha'], '1', 2));
        $spreadsheet->getActiveSheet()->getCellByColumnAndRow(1, $row_current)->getStyle()->applyFromArray($styleHeaderCellColorGreen);
        $spreadsheet->getActiveSheet()->getCellByColumnAndRow(2, $row_current)->getStyle()->applyFromArray($styleCellCenterWithBorder);
        $row_current = $row_current + 1;
        $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(1, $row_current, 'Producción en el punto de equilibrio [m³/mes]');
        $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(2, $row_current, bcdiv($simulaciones['produccion_equilibrio'], '1', 2));
        $spreadsheet->getActiveSheet()->getCellByColumnAndRow(1, $row_current)->getStyle()->applyFromArray($styleHeaderCellColorGreen);
        $spreadsheet->getActiveSheet()->getCellByColumnAndRow(2, $row_current)->getStyle()->applyFromArray($styleCellCenterWithBorder);
        $row_current = $row_current + 1;
        $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(1, $row_current, 'Costo de Producción Bruto [$/m³]');
        $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(2, $row_current, bcdiv($simulaciones['costo_prod_bruta'], '1', 2));
        $spreadsheet->getActiveSheet()->getCellByColumnAndRow(1, $row_current)->getStyle()->applyFromArray($styleHeaderCellColorGreen);
        $spreadsheet->getActiveSheet()->getCellByColumnAndRow(2, $row_current)->getStyle()->applyFromArray($styleCellCenterWithBorder);
        $row_current = $row_current + 1;
        $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(1, $row_current, 'Costo de Producción y Administración [$/m³]');
        $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(2, $row_current, bcdiv($simulaciones['costo_prod_admin'], '1', 2));
        $spreadsheet->getActiveSheet()->getCellByColumnAndRow(1, $row_current)->getStyle()->applyFromArray($styleHeaderCellColorGreen);
        $spreadsheet->getActiveSheet()->getCellByColumnAndRow(2, $row_current)->getStyle()->applyFromArray($styleCellCenterWithBorder);

        $row_current = $row_current + 1;
        $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(1, $row_current, 'Margen de ganancia antes de impuestos [$/m³]');
        $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(2, $row_current, bcdiv($simulaciones['margen_ganancia'], '1', 2));
        $spreadsheet->getActiveSheet()->getCellByColumnAndRow(1, $row_current)->getStyle()->applyFromArray($styleHeaderCellColorGreen);
        $spreadsheet->getActiveSheet()->getCellByColumnAndRow(2, $row_current)->getStyle()->applyFromArray($styleCellCenterWithBorder);

        $row_current = $row_current + 1;
        $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(1, $row_current, 'Tarifa del servicio antes de impuestos [$/m³]');
        $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(2, $row_current, bcdiv($simulaciones['tarifa_sin_imp'], '1', 2));
        $spreadsheet->getActiveSheet()->getCellByColumnAndRow(1, $row_current)->getStyle()->applyFromArray($styleHeaderCellColorGreen);
        $spreadsheet->getActiveSheet()->getCellByColumnAndRow(2, $row_current)->getStyle()->applyFromArray($styleCellCenterWithBorder);

        $row_current = $row_current + 1;
        $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(1, $row_current, 'Tarifa del servicio con impuestos [$/m³]');
        $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(2, $row_current, bcdiv($simulaciones['tarifa_con_imp'], '1', 2));
        $spreadsheet->getActiveSheet()->getCellByColumnAndRow(1, $row_current)->getStyle()->applyFromArray($styleHeaderCellColorGreen);
        $spreadsheet->getActiveSheet()->getCellByColumnAndRow(2, $row_current)->getStyle()->applyFromArray($styleCellCenterWithBorder);

        $row_current = $row_current + 1;
        $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(1, $row_current, 'Beneficio respecto al precio del contratante [$/m³]');
        $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(2, $row_current, bcdiv($simulaciones['beneficio'], '1', 2));
        $spreadsheet->getActiveSheet()->getCellByColumnAndRow(1, $row_current)->getStyle()->applyFromArray($styleHeaderCellColorGreen);
        $spreadsheet->getActiveSheet()->getCellByColumnAndRow(2, $row_current)->getStyle()->applyFromArray($styleCellCenterWithBorder);


        //autoajusta las columnas
        foreach(range('A6','F6') as $columnID) {
            $spreadsheet->getActiveSheet()->getColumnDimension($columnID)
                ->setAutoSize(true);
        }

        $path = WWW_ROOT . '/files/simulacion.xlsx';

        $writer = new Xlsx($spreadsheet);
        $writer->save($path);

        $this->response->file($path,
            ['download' => true]
        );

    return $this->response;

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
