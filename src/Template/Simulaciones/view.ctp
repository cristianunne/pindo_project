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
                                <td class="color-first" align="center" style="vertical-align: middle;"><?= $simulaciones->rodale->idrodales ?></td>
                                <td align="center" style="vertical-align: middle;"><?= $simulaciones->rodale->cod_sap ?></td>
                                <td align="center" style="vertical-align: middle;"><?= $plantacionesData[0]->procedencia->especie ?></td> <!--DEBO TRAER LA TABLA CON LA ESPECIE -->
                                <td align="center" style="vertical-align: middle;"><?= $simulaciones['superficie'] ?></td>
                                <td align="center" style="vertical-align: middle;"><?= $simulaciones['vol_medio'] ?></td>
                                <td align="center" style="vertical-align: middle;"><?= $simulaciones['dist_extraccion'] ?></td>
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

                            <?php foreach ($simulaciones->simulaciones_maqesp as $maquinas) :?>

                                <?php if($maquinas['actividad'] == 'Corte'):  ?>

                                    <tr>
                                        <td class="color-first" align="center" style="vertical-align: middle;"><?= $maquinas['actividad'] ?></td>
                                        <td align="center" style="vertical-align: middle;"><?= $maquinas->maquina_especifica->nombre. " ".$maquinas->maquina_especifica->modelo ?></td> <!-- DEBO TRAER LOS DATOS PARA NOMBRARLAS -->
                                        <td align="center" style="vertical-align: middle;"><?= $maquinas['productividad'] ?></td>
                                        <td align="center" style="vertical-align: middle;"><?= $maquinas['productividad_real'] ?></td>
                                        <td align="center" style="vertical-align: middle;"><?= $maquinas['produccion_mes'] ?></td>
                                    </tr>
                                <?php endif;?>
                            <?php endforeach;?>

                            <?php foreach ($simulaciones->simulaciones_maqesp as $maquinas) :?>

                                <?php if($maquinas['actividad'] == 'Extraccion'):  ?>

                                    <tr>
                                        <td class="color-first" align="center" style="vertical-align: middle;"><?= $maquinas['actividad'] ?></td>
                                        <td align="center" style="vertical-align: middle;"><?= $maquinas->maquina_especifica->nombre. " ".$maquinas->maquina_especifica->modelo ?></td>
                                        <td align="center" style="vertical-align: middle;"><?= $maquinas['productividad'] ?></td>
                                        <td align="center" style="vertical-align: middle;"><?= $maquinas['productividad_real'] ?></td>
                                        <td align="center" style="vertical-align: middle;"><?= $maquinas['produccion_mes'] ?></td>
                                    </tr>
                                <?php endif;?>
                            <?php endforeach;?>

                            <?php foreach ($simulaciones->simulaciones_maqesp as $maquinas) :?>

                                <?php if($maquinas['actividad'] == 'Proceso'):  ?>

                                    <tr>
                                        <td class="color-first" align="center" style="vertical-align: middle;"><?= $maquinas['actividad'] ?></td>
                                        <td align="center" style="vertical-align: middle;"><?= $maquinas->maquina_especifica->nombre. " ".$maquinas->maquina_especifica->modelo ?></td>
                                        <td align="center" style="vertical-align: middle;"><?= $maquinas['productividad'] ?></td>
                                        <td align="center" style="vertical-align: middle;"><?= $maquinas['productividad_real'] ?></td>
                                        <td align="center" style="vertical-align: middle;"><?= $maquinas['produccion_mes'] ?></td>
                                    </tr>
                                <?php endif;?>
                            <?php endforeach;?>

                            <?php foreach ($simulaciones->simulaciones_maqesp as $maquinas) :?>

                                <?php if($maquinas['actividad'] == 'Carga'):  ?>

                                    <tr>
                                        <td class="color-first" align="center" style="vertical-align: middle;"><?= $maquinas['actividad'] ?></td>
                                        <td align="center" style="vertical-align: middle;"><?= $maquinas->maquina_especifica->nombre. " ".$maquinas->maquina_especifica->modelo ?></td>
                                        <td align="center" style="vertical-align: middle;"><?= $maquinas['productividad'] ?></td>
                                        <td align="center" style="vertical-align: middle;"><?= $maquinas['productividad_real'] ?></td>
                                        <td align="center" style="vertical-align: middle;"><?= $maquinas['produccion_mes'] ?></td>
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

                            <?php foreach ($simulaciones->simulaciones_maqesp as $maquinas) :?>

                                <?php if($maquinas['actividad'] == 'Corte'):  ?>

                                    <tr>
                                        <td class="color-first" align="center" style="vertical-align: middle;"><?= $maquinas['actividad'] ?></td>
                                        <td align="center" style="vertical-align: middle;"><?= $maquinas->maquina_especifica->nombre. " ".$maquinas->maquina_especifica->modelo ?></td>
                                        <td align="center" style="vertical-align: middle;"><?= $maquinas['costo_fijo'] ?></td>
                                        <td align="center" style="vertical-align: middle;"><?= $maquinas['costo_variable'] ?></td>
                                        <td align="center" style="vertical-align: middle;"><?= $maquinas['costo_total'] ?></td>
                                    </tr>
                                <?php endif;?>
                            <?php endforeach;?>

                            <?php foreach ($simulaciones->simulaciones_maqesp as $maquinas) :?>

                                <?php if($maquinas['actividad'] == 'Extraccion'):  ?>

                                    <tr>
                                        <td class="color-first" align="center" style="vertical-align: middle;"><?= $maquinas['actividad'] ?></td>
                                        <td align="center" style="vertical-align: middle;"><?= $maquinas->maquina_especifica->nombre. " ".$maquinas->maquina_especifica->modelo ?></td>
                                        <td align="center" style="vertical-align: middle;"><?= $maquinas['costo_fijo'] ?></td>
                                        <td align="center" style="vertical-align: middle;"><?= $maquinas['costo_variable'] ?></td>
                                        <td align="center" style="vertical-align: middle;"><?= $maquinas['costo_total'] ?></td>
                                    </tr>
                                <?php endif;?>
                            <?php endforeach;?>

                            <?php foreach ($simulaciones->simulaciones_maqesp as $maquinas) :?>

                                <?php if($maquinas['actividad'] == 'Proceso'):  ?>

                                    <tr>
                                        <td class="color-first" align="center" style="vertical-align: middle;"><?= $maquinas['actividad'] ?></td>
                                        <td align="center" style="vertical-align: middle;"><?= $maquinas->maquina_especifica->nombre. " ".$maquinas->maquina_especifica->modelo ?></td>
                                        <td align="center" style="vertical-align: middle;"><?= $maquinas['costo_fijo'] ?></td>
                                        <td align="center" style="vertical-align: middle;"><?= $maquinas['costo_variable'] ?></td>
                                        <td align="center" style="vertical-align: middle;"><?= $maquinas['costo_total'] ?></td>
                                    </tr>
                                <?php endif;?>
                            <?php endforeach;?>

                            <?php foreach ($simulaciones->simulaciones_maqesp as $maquinas) :?>

                                <?php if($maquinas['actividad'] == 'Carga'):  ?>

                                    <tr>
                                        <td class="color-first" align="center" style="vertical-align: middle;"><?= $maquinas['actividad'] ?></td>
                                        <td align="center" style="vertical-align: middle;"><?= $maquinas->maquina_especifica->nombre. " ".$maquinas->maquina_especifica->modelo ?></td>
                                        <td align="center" style="vertical-align: middle;"><?= $maquinas['costo_fijo'] ?></td>
                                        <td align="center" style="vertical-align: middle;"><?= $maquinas['costo_variable'] ?></td>
                                        <td align="center" style="vertical-align: middle;"><?= $maquinas['costo_total'] ?></td>
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

                            <!-- TENGO QUE USAR UN FOREACH Y CONSULTAR-->
                            <?php foreach ($simulaciones->simulacion_resumen as $sim_res):  ?>

                                <tr>
                                    <td class="color-first" align="center" style="vertical-align: middle;"><?= $sim_res['tarea'] ?></td>
                                    <td align="center" style="vertical-align: middle;"><?= $sim_res['produccion_mes'] ?></td>
                                    <td align="center" style="vertical-align: middle;"><?= $sim_res['actividad_lim'] ?></td>
                                    <td align="center" style="vertical-align: middle;"><?= $sim_res['balance'] ?></td>
                                    <td align="center" style="vertical-align: middle;"><?= $sim_res['costo_total'] ?></td>
                                </tr>
                            <?php endforeach;?>

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
                                    <td align="center" style="vertical-align: middle;"><?= $simulaciones['produccion_total'] ?></td>
                                </tr>
                                <tr>
                                    <td style="vertical-align: middle; font-weight: bold; text-align: left; color:darkgreen;">Volumen total del lote (bruto) [m³]</td>
                                    <td align="center" style="vertical-align: middle;"><?= $simulaciones['vol_total'] ?></td>
                                </tr>

                                <tr>
                                    <td style="vertical-align: middle; font-weight: bold; text-align: left; color:darkgreen;">Días necesarios para cosechar el lote [Días]</td>
                                    <td align="center" style="vertical-align: middle;"><?= $simulaciones['dias_cosecha'] ?></td>
                                </tr>

                                <tr>
                                    <td style="vertical-align: middle; font-weight: bold; text-align: left; color:darkgreen;">Producción en el punto de equilibrio [m³/mes]</td>
                                    <td align="center" style="vertical-align: middle;"><?= $simulaciones['produccion_equilibrio'] ?></td>
                                </tr>

                                <tr>
                                    <td style="vertical-align: middle; font-weight: bold; text-align: left; color:darkgreen;">Costo de Producción Bruto [$/m³]</td>
                                    <td align="center" style="vertical-align: middle;"><?= $simulaciones['costo_prod_bruta'] ?></td>
                                </tr>
                                <tr>
                                    <td style="vertical-align: middle; font-weight: bold; text-align: left; color:darkgreen;">Costo de Producción y Administración [$/m³]</td>
                                    <td align="center" style="vertical-align: middle;"><?= $simulaciones['costo_prod_admin'] ?></td>
                                </tr>
                                <tr>
                                    <td style="vertical-align: middle; font-weight: bold; text-align: left; color:darkgreen;">Margen de ganancia antes de impuestos [$/m³]</td>
                                    <td align="center" style="vertical-align: middle;"><?= $simulaciones['margen_ganancia'] ?></td>
                                </tr>
                                <tr>
                                    <td style="vertical-align: middle; font-weight: bold; text-align: left; color:darkgreen;">Tarifa del servicio antes de impuestos [$/m³]</td>
                                    <td align="center" style="vertical-align: middle;"><?= $simulaciones['tarifa_sin_imp'] ?></td>
                                </tr>

                                <tr>
                                    <td style="vertical-align: middle; font-weight: bold; text-align: left; color:darkgreen;">Tarifa del servicio con impuestos [$/m³]</td>
                                    <td align="center" style="vertical-align: middle;"><?= $simulaciones['tarifa_con_imp'] ?></td>
                                </tr>
                                <tr>
                                    <td style="vertical-align: middle; font-weight: bold; text-align: left; color:darkgreen;">Beneficio respecto al precio del contratante [$/m³]</td>
                                    <td align="center" style="vertical-align: middle;"><?= $simulaciones['beneficio'] ?></td>
                                </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>

            </div>
        </div>
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