<?= $this->Html->script('index/index.js') ?>
<?= $this->Html->script('li_change.js') ?>


<?= $this->element('header')?>
<?= $this->element('sidebar')?>



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" xmlns:text-align="http://www.w3.org/1999/xhtml"
     xmlns:vertical-align="http://www.w3.org/1999/xhtml">
    <?= $this->element('panel_header')?>
    <?= $this->Flash->render() ?>
    <!-- Main content -->
    <section class="content">

        <div class="row">
            <?= $this->Form->create($laboral) ?>

            <div class="col-md-6" style="float: none; margin: 0 auto">
                <div class="callout callout-success">
                    <h4>Aclaración</h4>

                    <p>Se realizará la carga de los valores expresados en Porcentajes (%)</p>
                </div>


                <!-- Form Element sizes -->
                <div class="box box-success">


                    <div class="box-header with-border">
                        <h3 class="box-title">Agregar Datos Laborales</h3>
                    </div>

                    <div class="box-body">
                        <table class="table">
                            <tbody>

                                <tr>
                                    <td class="row-label" style="vertical-align: middle; text-align: right; width: 30%;" > <label for="convenio">Convenio:</label></td>

                                    <td style="vertical-align: middle; width: 20%;">  <?= $this->Form->input('convenio', ['class' => 'form-control', 'placeholder' => '', 'label' => false, 'required']) ?></td>
                                    <td style="vertical-align: middle; text-align: left;"><label for="area_basal">%</label></td>

                                </tr>



                                <tr>
                                    <td class="row-label" style="vertical-align: middle; text-align: right;" > <label for="antiguedad">Antigüedad:</label></td>

                                    <td > <?= $this->Form->input('antiguedad', ['type' => 'number', 'class' => 'form-control', 'label' => false, 'id' => 'antiguedad', 'required']) ?> </td>

                                    <td style="vertical-align: middle; text-align: left;"><label for="area_basal">%</label></td>

                                </tr>
                                <tr>
                                    <td class="row-label" style="vertical-align: middle; text-align: right;" > <label for="aguinaldo">Aguinaldo:</label></td>

                                    <td > <?= $this->Form->input('aguinaldo', ['type' => 'number', 'class' => 'form-control', 'label' => false, 'id' => 'aguinaldo', 'required']) ?> </td>

                                    <td style="vertical-align: middle; text-align: left;"><label for="area_basal">%</label></td>

                                </tr>

                                <tr>
                                    <td class="row-label" style="vertical-align: middle; text-align: right;" > <label for="ant_sup">Suplemento por Antigüedad:</label></td>

                                    <td > <?= $this->Form->input('ant_sup', ['type' => 'number', 'class' => 'form-control', 'label' => false, 'id' => 'ant_sup', 'required']) ?> </td>

                                    <td style="vertical-align: middle; text-align: left;"><label for="area_basal">%</label></td>

                                </tr>

                                <tr>
                                    <td class="row-label" style="vertical-align: middle; text-align: right;" > <label for="feriado">Feriados:</label></td>

                                    <td > <?= $this->Form->input('feriado', ['type' => 'number', 'class' => 'form-control', 'label' => false, 'id' => 'feriado', 'required']) ?> </td>

                                    <td style="vertical-align: middle; text-align: left;"><label for="area_basal">%</label></td>

                                </tr>

                                <tr>
                                    <td class="row-label" style="vertical-align: middle; text-align: right;" > <label for="vacaciones">Vacaciones:</label></td>

                                    <td > <?= $this->Form->input('vacaciones', ['type' => 'number', 'class' => 'form-control', 'label' => false, 'id' => 'vacaciones', 'required']) ?> </td>

                                    <td style="vertical-align: middle; text-align: left;"><label for="area_basal">%</label></td>

                                </tr>

                                <tr>
                                    <td class="row-label" style="vertical-align: middle; text-align: right;" > <label for="presentismo">Presentismo:</label></td>

                                    <td style="vertical-align: middle; width: 20%;"> <?= $this->Form->input('presentismo', ['type' => 'number', 'class' => 'form-control', 'label' => false, 'id' => 'presentismo', 'required']) ?> </td>

                                    <td style="vertical-align: middle; text-align: left;"><label for="area_basal">%</label></td>

                                </tr>

                            </tbody>

                        </table>
                        <br>

                    </div>

                    <div class="box-header with-border">
                        <h3 class="box-title">Aportes del Empleado</h3>
                    </div>

                    <div class="box-body">
                        <table class="table">
                            <tbody>
                                    <tr>
                                        <td class="row-label" style="vertical-align: middle; text-align: right;"> <label for="empleado_jub">Jubilación:</label></td>

                                        <td style="vertical-align: middle; width: 20%;">  <?= $this->Form->input('empleado_jub', ['type' => 'number', 'class' => 'form-control', 'placeholder' => '', 'label' => false, 'required']) ?></td>

                                        <td style="vertical-align: middle; text-align: left;"><label for="area_basal">%</label></td>
                                    </tr>

                                    <tr>
                                        <td class="row-label" style="vertical-align: middle; width: 30%; text-align: right;" > <label for="empleado_obra_social">Obra Social:</label></td>

                                        <td >  <?= $this->Form->input('empleado_obra_social', ['type' => 'number', 'class' => 'form-control', 'placeholder' => '', 'label' => false, 'required']) ?> </td>

                                        <td style="vertical-align: middle; text-align: left;"><label for="area_basal">%</label></td>

                                    </tr>

                                    <tr>
                                        <td class="row-label" style="vertical-align: middle; width: 30%; text-align: right;" > <label for="empleado_ley_19032">INSSJP:</label></td>

                                        <td > <?= $this->Form->input('empleado_ley_19032', ['type' => 'number', 'class' => 'form-control', 'label' => false, 'id' => 'empleado_ley_19032', 'required']) ?> </td>

                                        <td style="vertical-align: middle; text-align: left;"><label for="area_basal">%</label></td>

                                    </tr>
                                    <tr>
                                        <td class="row-label" style="vertical-align: middle; width: 30%; text-align: right;" > <label for="empleado_seguro_vida">Seguro de Vida:</label></td>

                                        <td > <?= $this->Form->input('empleado_seguro_vida', ['type' => 'number', 'class' => 'form-control', 'label' => false, 'id' => 'empleado_seguro_vida', 'required']) ?> </td>

                                        <td style="vertical-align: middle; text-align: left;"><label for="area_basal">%</label></td>

                                    </tr>

                                    <tr>
                                        <td class="row-label" style="vertical-align: middle; width: 30%; text-align: right;" > <label for="empleado_sindicato">Sindicato:</label></td>

                                        <td > <?= $this->Form->input('empleado_sindicato', ['type' => 'number', 'class' => 'form-control', 'label' => false, 'id' => 'empleado_sindicato', 'required']) ?> </td>

                                        <td style="vertical-align: middle; text-align: left;"><label for="area_basal">%</label></td>

                                    </tr>

                                    <tr>
                                        <td class="row-label" style="vertical-align: middle; width: 30%; text-align: right;" > <label for="empleado_renatea">RENATEA:</label></td>

                                        <td > <?= $this->Form->input('empleado_renatea', ['type' => 'number', 'class' => 'form-control', 'label' => false, 'id' => 'empleado_renatea', 'required']) ?> </td>

                                        <td style="vertical-align: middle; text-align: left;"><label for="area_basal">%</label></td>

                                    </tr>

                            </tbody>

                        </table>
                        <br>

                    </div>

                    <div class="box-header with-border">
                        <h3 class="box-title">Contribuciones del Empleador</h3>
                    </div>

                    <div class="box-body">
                        <table class="table">
                            <tbody>
                            <tr>
                                <td class="row-label" style="vertical-align: middle; text-align: right;"> <label for="empleador_jub">Jubilación:</label></td>

                                <td style="vertical-align: middle; width: 20%;">  <?= $this->Form->input('empleador_jub', ['type' => 'number', 'class' => 'form-control', 'placeholder' => '', 'label' => false, 'required']) ?></td>

                                <td style="vertical-align: middle; text-align: left;"><label for="area_basal">%</label></td>

                            </tr>

                            <tr>
                                <td class="row-label" style="vertical-align: middle; width: 30%; text-align: right;" > <label for="empleador_asignacion">Asignaciones familiares:</label></td>

                                <td >  <?= $this->Form->input('empleador_asignacion', ['type' => 'number', 'class' => 'form-control', 'placeholder' => '', 'label' => false, 'required']) ?> </td>

                                <td style="vertical-align: middle; text-align: left;"><label for="area_basal">%</label></td>

                            </tr>

                            <tr>
                                <td class="row-label" style="vertical-align: middle; width: 30%; text-align: right;" > <label for="empleador_fondo_des">Fondo Nac.de empleo:</label></td>

                                <td > <?= $this->Form->input('empleador_fondo_des', ['type' => 'number', 'class' => 'form-control', 'label' => false, 'id' => 'empleador_fondo_des', 'required']) ?> </td>

                                <td style="vertical-align: middle; text-align: left;"><label for="area_basal">%</label></td>

                            </tr>
                            <tr>
                                <td class="row-label" style="vertical-align: middle; width: 30%; text-align: right;" > <label for="empleador_inssjp">INSSJP:</label></td>

                                <td > <?= $this->Form->input('empleador_inssjp', ['type' => 'number', 'class' => 'form-control', 'label' => false, 'id' => 'empleador_inssjp', 'required']) ?> </td>

                                <td style="vertical-align: middle; text-align: left;"><label for="area_basal">%</label></td>

                            </tr>

                            <tr>
                                <td class="row-label" style="vertical-align: middle; width: 30%; text-align: right;" > <label for="empleador_obra_social">Obra Social:</label></td>

                                <td > <?= $this->Form->input('empleador_obra_social', ['type' => 'number', 'class' => 'form-control', 'label' => false, 'id' => 'empleador_obra_social', 'required']) ?> </td>

                                <td style="vertical-align: middle; text-align: left;"><label for="area_basal">%</label></td>

                            </tr>


                            <tr>
                                <td class="row-label" style="vertical-align: middle; width: 30%; text-align: right;" > <label for="empleador_seguro_vida">Seguro de Vida:</label></td>

                                <td > <?= $this->Form->input('empleador_seguro_vida', ['type' => 'number', 'class' => 'form-control', 'label' => false, 'id' => 'empleador_seguro_vida', 'required']) ?> </td>

                                <td style="vertical-align: middle; text-align: left;"><label for="area_basal">%</label></td>
                            </tr>

                            <tr>
                                <td class="row-label" style="vertical-align: middle; width: 30%; text-align: right;" > <label for="empleador_seguro_vida">RENATEA:</label></td>

                                <td > <?= $this->Form->input('empleador_renatea', ['type' => 'number', 'class' => 'form-control', 'label' => false, 'id' => 'empleador_renatea', 'required']) ?> </td>

                                <td style="vertical-align: middle; text-align: left;"><label for="area_basal">%</label></td>
                            </tr>

                            </tbody>

                        </table>
                        <br>

                    </div>

                    <div class="box-header with-border">
                        <h3 class="box-title">Previsiones</h3>
                    </div>

                    <div class="box-body">
                        <table class="table">
                            <tbody>
                            <tr>
                                <td class="row-label" style="vertical-align: middle; text-align: right;"> <label for="prev_enfermedad">Previsión Enfermedad:</label></td>

                                <td style="vertical-align: middle; width: 20%;">  <?= $this->Form->input('prev_enfermedad', ['type' => 'number', 'class' => 'form-control', 'placeholder' => '', 'label' => false, 'required']) ?></td>

                                <td style="vertical-align: middle; text-align: left;"><label for="prev_enfermedad">%</label></td>

                            </tr>

                            <tr>
                                <td class="row-label" style="vertical-align: middle; width: 30%; text-align: right;" > <label for="prev_despido">Previsión Despido:</label></td>

                                <td >  <?= $this->Form->input('prev_despido', ['type' => 'number', 'class' => 'form-control', 'placeholder' => '', 'label' => false, 'required']) ?> </td>

                                <td style="vertical-align: middle; text-align: left;"><label for="prev_despido">%</label></td>

                            </tr>

                            <tr>
                                <td class="row-label" style="vertical-align: middle; width: 30%; text-align: right;" > <label for="exam_preocup">Examen Médico Preocup.:</label></td>

                                <td > <?= $this->Form->input('exam_preocup', ['type' => 'number', 'class' => 'form-control', 'label' => false, 'id' => 'exam_preocup', 'required']) ?> </td>

                                <td style="vertical-align: middle; text-align: left;"><label for="exam_preocup">%</label></td>

                            </tr>
                            <tr>
                                <td class="row-label" style=" width: 30%; text-align: right;" > <label for="seguro_colectivo">Seguro Colec. Ley 16.600/op/mes:</label></td>

                                <td > <?= $this->Form->input('seguro_colectivo', ['type' => 'number', 'class' => 'form-control', 'label' => false, 'id' => 'seguro_colectivo', 'required']) ?> </td>

                                <td style="vertical-align: middle; text-align: left;"><label for="seguro_colectivo">%</label></td>

                            </tr>


                            </tbody>

                        </table>
                        <br>

                    </div>

                    <div class="box-header with-border">
                        <h3 class="box-title">Otros</h3>
                    </div>

                    <div class="box-body">
                        <table class="table">
                            <tbody>

                            <tr>
                                <td class="row-label" style="vertical-align: middle; width: 30%; text-align: right;" > <label for="empleador_art">ART - Aporte fijo:</label></td>

                                <td > <?= $this->Form->input('art_fijo', ['type' => 'number', 'class' => 'form-control', 'label' => false, 'id' => 'art_fijo', 'required']) ?> </td>

                                <td style="vertical-align: middle; text-align: left;"><label for="art_fijo">$/mes</label></td>

                            </tr>

                            <tr>
                                <td class="row-label" style="vertical-align: middle; text-align: right;"> <label for="art_prop">ART - Aporte sobre el básico:</label></td>

                                <td style="vertical-align: middle; width: 20%;">  <?= $this->Form->input('art_prop', ['type' => 'number', 'class' => 'form-control', 'placeholder' => '', 'label' => false, 'required']) ?></td>

                                <td style="vertical-align: middle; text-align: left;"><label for="art_prop">%</label></td>

                            </tr>

                            </tbody>

                        </table>
                        <br>

                    </div>


                    <div class="box-footer">
                        <?= $this->Form->button('Agregar', ['class' => 'btn btn-success pull-right']) ?>

                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>

            <?= $this->Form->end() ?>
        </div>

    </section>

</div>

<?= $this->element('footer')?>