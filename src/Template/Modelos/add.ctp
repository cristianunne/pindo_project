<?= $this->Html->script('index/index.js') ?>
<?= $this->Html->script('li_change.js') ?>


<?= $this->element('header')?>
<?= $this->element('sidebar')?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <?= $this->element('panel_header')?>

    <!-- Main content -->
    <section class="content">

        <div class="row">

            <?= $this->Form->create($modelo) ?>
            <!-- left column -->
            <div class="col-md-6">
                <!-- Form Element sizes -->
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Agregar Modelo</h3>
                    </div>
                    <div class="box-body">
                        <label for="cosecha">Cosecha:</label>
                        <?= $this->Form->input('cosecha', ['options' => ['Cut to lenght' => 'Cut to lenght', 'Full-tree' => 'Full-tree'],
                            'empty' => '(Elija una Cosecha)', 'type' => 'select', 'class' => 'form-control', 'label' => false, 'required', 'id' => 'tarea']) ?>
                        <br>
                        <label for="tipo_maquina">Tipo de Máquina:</label>
                        <?= $this->Form->input('tipo_maquina', ['class' => 'form-control', 'placeholder' => 'Tipo de Máquina', 'label' => false, 'required']) ?>
                        <br>
                        <label for="modelo">Modelo:</label>
                        <?= $this->Form->input('modelo', ['class' => 'form-control', 'placeholder' => 'Modelo', 'label' => false, 'required']) ?>
                        <br>
                        <label for="operacion">Operación:</label>
                        <?= $this->Form->input('operacion', ['class' => 'form-control', 'placeholder' => 'Operación', 'label' => false, 'required']) ?>
                        <br>
                        <label for="eficiencia">Tarea:</label>
                        <?= $this->Form->input('tarea', ['options' => ['Corte' => 'Corte', 'Extraccion' => 'Extraccion', 'Carga' => 'Carga', 'Proceso' => 'Proceso'],
                            'empty' => '(Elija una Tarea)', 'type' => 'select', 'class' => 'form-control', 'label' => false, 'required', 'id' => 'tarea']) ?>
                        <br>
                        <label for="operacion">Ecuación:</label>
                        <?= $this->Form->input('modelo_algoritmo', ['class' => 'form-control', 'placeholder' => 'Ecuación', 'label' => false, 'required']) ?>


                    </div>

                    <div class="box-footer">
                        <?= $this->Form->button('Agregar', ['class' => 'btn btn-success pull-right']) ?>
                        <?= $this->Html->link('Volver', ['controller' => 'Modelos', 'action' => 'index', '?' => ['Accion' => 'Ver SIMNEA', 'Categoria' => 'SIMNEA']],
                            ['class' => 'btn btn-default pull-left'], ['escape' => false]) ?>

                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->


            </div>
            <div class="col-md-6">
                <div class="box box-success">
                    <div class="callout callout-success">
                        <h4>Consideraciones de Tipeo de Fórmula</h4>
                        <p>Utilice el Siguiente Formato para especificar una variable de entorno del Simulador</p>
                    </div>

                    <div class="box-body">
                        <table class="table">

                            <thead>
                                <tr>
                                    <th scope="col"><?= $this->Paginator->sort('Modo') ?></th>
                                    <th scope="col"><?= $this->Paginator->sort('Variable') ?></th>

                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <td class="row-label" style="vertical-align: middle;" > <label for="nombre">$superficie</label></td>

                                    <td>Superficie </td>
                                </tr>
                                <tr>
                                    <td class="row-label" style="vertical-align: middle;"><label for="modelo">$dist_lineas</label></td>

                                    <td>Distancia entre Líneas</td>
                                </tr>

                                <tr>
                                    <td class="row-label" style="vertical-align: middle;"><label for="eficiencia">$dist_vias</label></td>

                                    <td>Distancia entre Plantas</td>
                                </tr>

                                <tr>
                                    <td class="row-label" style="vertical-align: middle;"><label for="eficiencia">$num_arboles</label></td>

                                    <td>Número de Árboles</td>
                                </tr>
                                <tr>
                                    <td class="row-label" style="vertical-align: middle;"><label for="n_turnos">$vol_medio</label></td>

                                    <td>Volumen Medio</td>
                                </tr>

                                <tr>
                                    <td class="row-label" style="vertical-align: middle;"><label for="horas_dia">$vol_total</label></td>

                                    <td>Volumen Total</td>
                                </tr>


                                <tr>
                                    <td class="row-label" style="vertical-align: middle;"><label for="horas_dia">$dap </label></td>

                                    <td>DAP Medio</td>
                                </tr>
                                <tr>
                                    <td class="row-label" style="vertical-align: middle;"><label for="horas_dia">$altura</label></td>

                                    <td>Altura</td>
                                </tr>
                                <tr>
                                    <td class="row-label" style="vertical-align: middle;"><label for="horas_dia">$area_basal</label></td>

                                    <td>Área Basal</td>
                                </tr>


                                <tr>
                                    <td class="row-label" style="vertical-align: middle;"><label for="horas_dia">$dme</label></td>

                                    <td>DME</td>
                                </tr>

                                <tr>
                                    <td class="row-label" style="vertical-align: middle;"><label for="horas_dia">$dhp</label></td>

                                    <td>Distancia hasta la Planchada</td>
                                </tr>

                                <tr>
                                    <td class="row-label" style="vertical-align: middle;"><label for="horas_dia">$pendiente</label></td>

                                    <td>Pendiente</td>
                                </tr>

                                <tr>
                                    <td class="row-label" style="vertical-align: middle;"><label for="horas_dia">$vol_cos</label></td>

                                    <td>Volumen a Cosecha</td>
                                </tr>

                                <tr>
                                    <td class="row-label" style="vertical-align: middle;"><label for="horas_dia">$intensidad_n</label></td>

                                    <td>Intensidad_n</td>
                                </tr>

                                <tr>
                                    <td class="row-label" style="vertical-align: middle;"><label for="horas_dia">$intensidad_ab</label></td>

                                    <td>Intensidad_ab</td>
                                </tr>

                                <tr>
                                    <td class="row-label" style="vertical-align: middle;"><label for="horas_dia">$intensidad_v</label></td>

                                    <td>Intensidad_v </td>
                                </tr>

                                <tr>
                                    <td class="row-label" style="vertical-align: middle;"><label for="horas_dia">$precio_cont</label></td>

                                    <td>Precio del Contratante</td>
                                </tr>

                                <tr>
                                    <td class="row-label" style="vertical-align: middle;"><label for="horas_dia">$prop_vol_ap</label></td>

                                    <td>Proporción Volumen Aprovechado</td>
                                </tr>

                                <tr>
                                    <td class="row-label" style="vertical-align: middle;"><label for="horas_dia">PARA LAS FUNCIONES VISITAR:</label></td>

                                    <td> <a href=" http://php.net/manual/es/ref.math.php"> http://php.net/manual/es/ref.math.php</a></td>
                                </tr>





                            </tbody>
                        </table>


                    </div>



                </div>
            </div>


            <?= $this->Form->end() ?>
        </div>

    </section>
</div>

<?= $this->element('footer')?>