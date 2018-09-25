<?= $this->Html->script('index/index.js') ?>

<?= $this->Html->script('li_change.js') ?>

<?= $this->Html->css('Simnea/simnea.css') ?>

<?= $this->element('header')?>
<?= $this->element('sidebar')?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <?= $this->element('panel_header')?>
    <?= $this->Flash->render() ?>

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="container-fluid">
                <div class="callout callout-warning">
                    <h4>RESULTADO DE LA SIMULACIÓN:</h4>
                </div>

                <div class="box box-success">
                    <div  class="box-body table-responsive" style="border: solid 1px #cecece;">
                        <table id="example1" class="table table-bordered table-hover dataTable">
                            <thead>
                            <tr>
                                <th>ID Rodal</th>
                                <th>Código SAP</th>
                                <th>Especie</th>
                                <th>Superficie [ha]</th>
                                <th>Volumen Medio [m3]</th>
                                <th>Distancia Extracción [m]</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td align="center" style="vertical-align: middle;"><?= $array_result_general['ID_RODAL'] ?></td>
                                <td align="center" style="vertical-align: middle;"><?= $array_result_general['COD_SAP'] ?></td>
                                <td align="center" style="vertical-align: middle;"><?= $array_result_general['ESPECIE'] ?></td>
                                <td align="center" style="vertical-align: middle;"><?= $array_result_general['SUP'] ?></td>
                                <td align="center" style="vertical-align: middle;"><?= $array_result_general['VOL_MEDIO'] ?></td>
                                <td align="center" style="vertical-align: middle;"><?= $array_result_general['DME'] ?></td>
                            </tr>
                            </tbody>
                        </table>

                    </div>
                </div>

                <!--TABLA CONDATOS DE LAS MAQUINAS-->
                <div class="box box-success">
                    <div  class="box-body table-responsive" style="border: solid 1px #cecece;">
                        <table id="example1" class="table table-bordered table-hover dataTable">
                            <thead>
                            <tr>
                                <th>Actividad</th>
                                <th>Máquina</th>
                                <th>Productividad [m³/hs.ef]</th>
                                <th>Productividad Real [m³/hs]</th>
                                <th>Producción Mes [m³/mes]</th>
                            </tr>
                            </thead>
                            <tbody>

                                <?php foreach ($array_result as $maquinas) :?>

                                    <?php if($maquinas['tarea'] == 'Corte'):  ?>

                                        <tr>
                                            <td align="center" style="vertical-align: middle;"><?= $maquinas['tarea'] ?></td>
                                            <td align="center" style="vertical-align: middle;"><?= $maquinas['nombre']. " ".$maquinas['modelo'] ?></td>
                                            <td align="center" style="vertical-align: middle;"><?= $maquinas['PRODUCTIVIDAD'] ?></td>
                                            <td align="center" style="vertical-align: middle;"><?= $maquinas['PRODUCTIVIDAD_REAL'] ?></td>
                                            <td align="center" style="vertical-align: middle;"><?= $maquinas['PRODUCCION_MES'] ?></td>
                                        </tr>
                                    <?php endif;?>
                                <?php endforeach;?>

                                <?php foreach ($array_result as $maquinas) :?>

                                    <?php if($maquinas['tarea'] == 'Extraccion'):  ?>

                                        <tr>
                                            <td align="center" style="vertical-align: middle;"><?= $maquinas['tarea'] ?></td>
                                            <td align="center" style="vertical-align: middle;"><?= $maquinas['nombre']. " ".$maquinas['modelo'] ?></td>
                                            <td align="center" style="vertical-align: middle;"><?= $maquinas['PRODUCTIVIDAD'] ?></td>
                                            <td align="center" style="vertical-align: middle;"><?= $maquinas['PRODUCTIVIDAD_REAL'] ?></td>
                                            <td align="center" style="vertical-align: middle;"><?= $maquinas['PRODUCCION_MES'] ?></td>
                                        </tr>
                                    <?php endif;?>
                                <?php endforeach;?>


                            </tbody>
                        </table>

                    </div>
                </div>


                <!--TABLA CON DATOS de costos DE LAS MAQUINAS-->
                <div class="box box-success">
                    <div  class="box-body table-responsive" style="border: solid 1px #cecece;">
                        <table id="example1" class="table table-bordered table-hover dataTable">
                            <thead>
                            <tr>
                                <th>Actividad</th>
                                <th>Máquina</th>
                                <th>Costo Fijo [$/mes]</th>
                                <th>Costo Variable [$/mes]</th>
                                <th>Costo Total [$/mes]</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php foreach ($array_result as $maquinas) :?>

                                <?php if($maquinas['tarea'] == 'Corte'):  ?>

                                    <tr>
                                        <td align="center" style="vertical-align: middle;"><?= $maquinas['tarea'] ?></td>
                                        <td align="center" style="vertical-align: middle;"><?= $maquinas['nombre']. " ".$maquinas['modelo'] ?></td>
                                        <td align="center" style="vertical-align: middle;"><?= $maquinas['COSTO_FIJO_MES_TOTAL'] ?></td>
                                        <td align="center" style="vertical-align: middle;"><?= $maquinas['COSTO_VARIABLE_MES'] ?></td>
                                        <td align="center" style="vertical-align: middle;"><?= $maquinas['COSTO_TOTAL'] ?></td>
                                    </tr>
                                <?php endif;?>
                            <?php endforeach;?>

                            <?php foreach ($array_result as $maquinas) :?>

                                <?php if($maquinas['tarea'] == 'Extraccion'):  ?>

                                    <tr>
                                        <td align="center" style="vertical-align: middle;"><?= $maquinas['tarea'] ?></td>
                                        <td align="center" style="vertical-align: middle;"><?= $maquinas['nombre']. " ".$maquinas['modelo'] ?></td>
                                        <td align="center" style="vertical-align: middle;"><?= $maquinas['COSTO_FIJO_MES_TOTAL'] ?></td>
                                        <td align="center" style="vertical-align: middle;"><?= $maquinas['COSTO_VARIABLE_MES'] ?></td>
                                        <td align="center" style="vertical-align: middle;"><?= $maquinas['COSTO_TOTAL'] ?></td>
                                    </tr>
                                <?php endif;?>
                            <?php endforeach;?>


                            </tbody>
                        </table>

                    </div>
                </div>
                <!--PRODUCCION GENERAL-->
                <div class="box box-success">
                    <div  class="box-body table-responsive" style="border: solid 1px #cecece;">
                        <table id="example1" class="table table-bordered table-hover dataTable">
                            <thead>
                            <tr>
                                <th>Actividad</th>
                                <th>Producción Mes [m³/mes]</th>
                                <th>Actividad Limitante</th>
                                <th>Balance [%]</th>
                                <th>Costo Total [$/mes]</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if($array_result_general['PRODUCCION_MES_CORTE'] != null):  ?>

                                <tr>
                                    <td align="center" style="vertical-align: middle;">Corte</td>
                                    <td align="center" style="vertical-align: middle;"><?= $array_result_general['PRODUCCION_MES_CORTE'] ?></td>
                                    <td align="center" style="vertical-align: middle;"><?= $array_result_general['ACTIVIDAD_LIMITANTE_CORTE'] ?></td>
                                    <td align="center" style="vertical-align: middle;"><?= $array_result_general['BALANCE_CORTE'] ?></td>
                                    <td align="center" style="vertical-align: middle;"><?= $array_result_general['COSTO_TOTAL_CORTE'] ?></td>
                                </tr>
                            <?php endif;?>

                            <?php if($array_result_general['PRODUCCION_MES_EXTRACCION'] != null):  ?>

                                <tr>
                                    <td align="center" style="vertical-align: middle;">Extracción</td>
                                    <td align="center" style="vertical-align: middle;"><?= $array_result_general['PRODUCCION_MES_EXTRACCION'] ?></td>
                                    <td align="center" style="vertical-align: middle;"><?= $array_result_general['ACTIVIDAD_LIMITANTE_EXTRACCION'] ?></td>
                                    <td align="center" style="vertical-align: middle;"><?= $array_result_general['BALANCE_EXTRACCION'] ?></td>
                                    <td align="center" style="vertical-align: middle;"><?= $array_result_general['COSTO_TOTAL_EXTRACCION'] ?></td>
                                </tr>
                            <?php endif;?>

                            </tbody>
                        </table>

                    </div>
                </div>


                <div class="callout bg-gray-active">
                    <h4>Producción del Equipo de Cosecha:</h4>
                </div>

                <div class="col-md-5">
                    <div class="box box-success">
                        <div  class="box-body table-responsive" style="border: solid 1px #cecece;">
                            <table id="example1" class="table table-bordered table-hover dataTable">
                                <tbody>
                                    <tr>
                                        <td style="vertical-align: middle; font-weight: bold; text-align: left; color:darkgreen;">Producción total [m³/mes]</td>
                                        <td align="center" style="vertical-align: middle;"><?= $array_result_general['PRODUCCION_TOTAL_LIMITANTE'] ?></td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align: middle; font-weight: bold; text-align: left; color:darkgreen;">Volumen total del lote (bruto) [m³]</td>
                                        <td align="center" style="vertical-align: middle;"><?= $array_result_general['VOL_TOTAL_LOTE'] ?></td>
                                    </tr>

                                    <tr>
                                        <td style="vertical-align: middle; font-weight: bold; text-align: left; color:darkgreen;">Días necesarios para cosechar el lote [Días]</td>
                                        <td align="center" style="vertical-align: middle;"><?= $array_result_general['DIAS_PARA_COSECHAR'] ?></td>
                                    </tr>

                                    <tr>
                                        <td style="vertical-align: middle; font-weight: bold; text-align: left; color:darkgreen;">Producción en el punto de equilibrio [m³/mes]</td>
                                        <td align="center" style="vertical-align: middle;"><?= $array_result_general['PROD_PUNTO_EQUILIBRIO'] ?></td>
                                    </tr>

                                    <tr>
                                        <td style="vertical-align: middle; font-weight: bold; text-align: left; color:darkgreen;">Costo de Producción Bruto [$/m³]</td>
                                        <td align="center" style="vertical-align: middle;"><?= $array_result_general['COSTO_PRODUCCION_BRUTO'] ?></td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align: middle; font-weight: bold; text-align: left; color:darkgreen;">Costo de Producción y Administración [$/m³]</td>
                                        <td align="center" style="vertical-align: middle;"><?= $array_result_general['COSTO_PRODUCCION_ADMINISTRACION'] ?></td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align: middle; font-weight: bold; text-align: left; color:darkgreen;">Margen de ganancia antes de impuestos [$/m³]</td>
                                        <td align="center" style="vertical-align: middle;"><?= $array_result_general['MARGEN_GANANCIA'] ?></td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align: middle; font-weight: bold; text-align: left; color:darkgreen;">Tarifa del servicio antes de impuestos [$/m³]</td>
                                        <td align="center" style="vertical-align: middle;"><?= $array_result_general['TARIFA_SERVICIO'] ?></td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>

                <div class="col-md-12" style="background-color: inherit; border-top: inherit;">

                    <button type="button" class="btn btn-warning btn-lg pull-right" data-toggle="modal" data-target="#myModal">
                        <span class="glyphicon glyphicon-saved"> Guardar</span>
                    </button>

                </div>

            </div>
        </div>

        <?= $this->Form->create(null, ['url' => ['controller' => 'Simnea', 'action' => 'saved']]) ?>
        <div id="myModal" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: #0c9657;">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" style="color: white;">Guardar Simulación</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Seleccione el tipo de simulación:</label>
                            <?= $this->Form->input('tipo_simulacion', ['options' => ['Prueba' => 'Prueba', 'Final' => 'Final'], 'empty' => '(Elija una opción)', 'class' => 'form-control',
                                'placeholder' => 'Finalizado', 'label' => false, 'required']) ?>
                            <br>

                        </div>
                    </div>
                    <div class="modal-footer" style="background-color: #ddd;">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        <?= $this->Form->button('Guardar', ['class' => 'btn btn-success']) ?>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        <?= $this->Form->end() ?>

    </section>
</div>

<?= $this->Html->script('simnea.js') ?>
<?= $this->Html->script('bower_components/chart.js/Chart.js') ?>
<?= $this->Html->script('simnea_result.js') ?>


<?= $this->element('footer')?>

<script>
    $(function () {
        $('#example1').DataTable({
            'paging'      : false,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : false,
            'info'        : false,
            'autoWidth'   : false,
            'language' : {
                'search': "Buscar:",

                'paginate': {
                    'first':      "Primer",
                    'previous':   "Anterior",
                    'next':       "Siguiente",
                    'last':       "Anterior"
                }}
        })

        $('#example2').DataTable({
            'paging'      : true,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : false,
            'language' : {
                'search': "Buscar:",

                'paginate': {
                    'first':      "Primer",
                    'previous':   "Anterior",
                    'next':       "Siguiente",
                    'last':       "Anterior"
                }}
        })
    })
</script>


