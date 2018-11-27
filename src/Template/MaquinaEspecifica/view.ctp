<?= $this->Html->css('Maquinas/maquinas.css') ?>

<?= $this->Html->script('index/index.js') ?>
<?= $this->Html->script('li_change.js') ?>
<?= $this->Html->script('maquina_costos.js') ?>
<?= $this->Html->script('estimador_costos.js') ?>


<?= $this->element('header')?>
<?= $this->element('sidebar')?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <?= $this->element('panel_header')?>
    <?= $this->Flash->render() ?>



    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-md-6" style="margin: 0 auto; float: none;">
                <div class="box box-solid">
                    <div class="box-header with-border">
                        <i class="fas fa-dollar-sign" style="color: green;"></i>

                        <h2 class="box-title" style="color: green;">COSTOS DE LA MÁQUINA</h2>
                    </div>
                    <!-- /.box-header -->
                    <div class="row">

                        <div class="col-md-8">
                            <div class="box-body">
                                <div class="box-header with-border">
                                    <h4>Sueldos</h4>
                                </div>

                                <table class="table">
                                    <tbody>

                                    <tr>
                                        <td class="row-label" style="vertical-align: middle;"><label for="eficiencia">Tipo de Operario:</label></td>

                                        <?php if(!empty($maquina_esp->maqesp_catop->cat_operarios_idcat_operarios)): ?>

                                            <td> <?= $this->Form->input('cat_operarios_idcat_operarios', ['options' => $cat_operarios, 'empty' => '(Elija un Operario)', 'type' => 'select',
                                                    'class' => 'form-control', 'placeholder' => 'Tipo Operario', 'disabled' => True, 'label' => false, 'required', 'value' =>  $maquina_esp->maqesp_catop->cat_operarios_idcat_operarios]) ?>
                                            </td>
                                        <?php endif; ?>
                                    </tr>

                                    <tr>
                                        <td class="row-label" style="vertical-align: middle;" > <label for="nombre">Sueldo:</label></td>
                                        <?php if(!empty($maquina_esp->maqesp_catop->sal_basico_mes)): ?>

                                            <td> <?= $this->Form->input('sal_basico_mes', ['class' => 'form-control', 'disabled' => True, 'label' => false, 'required', 'id' => 'nombre', 'value' => $maquina_esp->maqesp_catop->sal_basico_mes]) ?> </td>

                                        <?php endif; ?>

                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="box-body">
                                <div class="box-header with-border">
                                    <h4>General</h4>
                                </div>

                                <table class="table">
                                    <tbody>

                                    <tr>
                                        <td class="row-label" style="vertical-align: middle;" > <label for="nombre">Nombre:</label></td>

                                        <td> <?= $this->Form->input('nombre', ['class' => 'form-control', 'label' => false, 'id' => 'nombre', 'disabled' => True, 'value' => $maquina_esp->nombre]) ?> </td>
                                    </tr>
                                    <tr>
                                        <td class="row-label" style="vertical-align: middle;"><label for="modelo">Modelo:</label></td>

                                        <td ><?= $this->Form->input('modelo', ['class' => 'form-control', 'label' => false, 'disabled' => True, 'value' => $maquina_esp->modelo, 'id' => 'modelo']) ?></td>
                                    </tr>

                                    <tr>
                                        <td class="row-label" style="vertical-align: middle;"><label for="eficiencia">Tarea:</label></td>

                                        <td > <?= $this->Form->input('tarea', ['class' => 'form-control', 'label' => false, 'disabled' => True, 'value' => $maquina_esp->tarea, 'id' => 'tarea']) ?></td>
                                    </tr>

                                    <tr>
                                        <td class="row-label" style="vertical-align: middle;"><label for="eficiencia">Eficiencia Operacional:</label></td>

                                        <td > <?= $this->Form->input('eficiencia', ['class' => 'form-control', 'label' => false, 'disabled' => True, 'value' => $maquina_esp->eficiencia, 'id' => 'eficiencia']) ?></td>
                                    </tr>
                                    <tr>
                                        <td class="row-label" style="vertical-align: middle;"><label for="n_turnos">N° Turnos:</label></td>

                                        <td > <?= $this->Form->input('n_turnos', ['class' => 'form-control', 'label' => false, 'disabled' => True, 'value' => $maquina_esp->n_turnos, 'id' => 'n_turnos']) ?></td>
                                    </tr>

                                    <tr>
                                        <td class="row-label" style="vertical-align: middle;"><label for="horas_dia">N° de Horas:</label></td>

                                        <td > <?= $this->Form->input('horas_dia', ['class' => 'form-control', 'label' => false, 'disabled' => True, 'value' => $maquina_esp->horas_dia, 'id' => 'horas_dia']) ?></td>
                                    </tr>

                                    <tr>
                                        <td class="row-label" style="vertical-align: middle;" > <label for="ant_operario">Antigüedad del Operario:</label></td>
                                        <td > <?= $this->Form->input('ant_operario', ['class' => 'form-control', 'label' => false, 'disabled' => True, 'value' => $maquina_esp->ant_operario, 'required', 'id' => 'ant_operario']) ?></td>
                                    </tr>

                                    </tbody>
                                </table>

                            </div>
                            <!-- /.box-body -->
                        </div>
                        <div class="col-md-8">
                            <div class="box-body">

                                <div class="box-header with-border">
                                    <h4>Tipo de Inversión</h4>
                                </div>

                                <table class="table">
                                    <tbody>

                                    <tr>

                                        <td class="row-label" style="vertical-align: middle;" > <label for="nombre">Maq. Base/Leasing Crédito:</label></td>

                                        <?php

                                        if ($maquina_esp->leasing_credito == true)
                                        { ?>
                                            <td ><?= $this->Form->input('leasing_credito', ['class' => 'form-control', 'label' => false, 'disabled' => True, 'value' => 'SI',
                                                    'id' => 'leasing_credito']) ?></td>
                                            <?php
                                        } else {   ?>
                                            <td ><?= $this->Form->input('leasing_credito', ['class' => 'form-control', 'label' => false, 'disabled' => True, 'value' => 'NO',
                                                    'id' => 'leasing_credito']) ?></td>
                                            <?php
                                        }

                                        ?>


                                    </tr>
                                    <tr>
                                        <td class="row-label" style="vertical-align: middle;"><label for="modelo">Cuota Mensual Máquina:</label></td>

                                        <td ><?= $this->Form->input('cuota_maq_mes', ['class' => 'form-control', 'placeholder' => 'Cuota Mensual Máquina', 'label' => false, 'disabled' => True, 'value' => $maquina_esp->cuota_maq_mes,
                                                'id' => 'cuota_maq_mes']) ?></td>
                                    </tr>
                                    <tr>
                                        <td class="row-label" style="vertical-align: middle;"><label for="eficiencia">Implemento/Leasing Crédito:</label></td>

                                        <?php

                                            if ($maquina_esp->leas_imp == true)
                                            { ?>
                                                <td ><?= $this->Form->input('leas_imp', ['class' => 'form-control', 'label' => false, 'disabled' => True, 'value' => 'SI',
                                                'id' => 'leas_imp']) ?></td>
                                        <?php
                                            } else {   ?>
                                                <td ><?= $this->Form->input('leas_imp', ['class' => 'form-control', 'label' => false, 'disabled' => True, 'value' => 'NO',
                                                        'id' => 'leas_imp']) ?></td>
                                        <?php
                                            }

                                        ?>
                                    </tr>
                                    <tr>
                                        <td class="row-label" style="vertical-align: middle;"><label for="n_turnos">Cuota Mensual Implemento:</label></td>
                                        <td > <?= $this->Form->input('cuota_mes_imp', ['class' => 'form-control', 'label' => false,
                                                'disabled' => True, 'value' => $maquina_esp->cuota_mes_imp, 'id' => 'cuota_mes_imp']) ?></td>

                                    </tr>

                                    </tbody>
                                </table>


                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="col-md-12">
                            <div class="box-body">

                                <div class="box-header with-border">
                                    <h4>Detalles Específicos</h4>
                                </div>
                                <div class="nav-tabs-custom">
                                    <ul class="nav nav-tabs">
                                        <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">Equipo</a></li>
                                        <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Insumos</a></li>
                                    </ul>

                                    <div class="col-md-12">

                                        <div class="tab-content">
                                            <div class="tab-pane active" id="tab_1">
                                                <div class="col-md-12">

                                                    <div class="row">
                                                        <div class="box-header with-border">
                                                            <h5>Características del Equipo</h5>
                                                        </div>
                                                        <div class="col-md-6">

                                                            <table class="table">
                                                                <tbody>

                                                                <tr>
                                                                    <td class="row-label" style="vertical-align: middle;" > <label for="valor_maquina">Valor Adquisición Máquina ($):</label></td>

                                                                    <td> <?= $this->Form->input('valor_maquina', ['class' => 'form-control',  'label' => false, 'id' => 'valor_maquina', 'disabled' => True, 'value' => $maquina_esp->valor_maquina]) ?> </td>
                                                                </tr>

                                                                <tr>
                                                                    <td class="row-label" style="vertical-align: middle;" > <label for="va_sis_rod_maq">Valor Tren Rodante Máquina ($/Tren):</label></td>

                                                                    <td> <?= $this->Form->input('va_sis_rod_maq', ['class' => 'form-control', 'label' => false, 'id' => 'va_sis_rod_maq', 'disabled' => True, 'value' => $maquina_esp->va_sis_rod_maq]) ?> </td>
                                                                </tr>

                                                                <tr>
                                                                    <td class="row-label" style="vertical-align: middle;" > <label for="vida_util_maq_year">Vida Útil del Equipo (Años):</label></td>

                                                                    <td> <?= $this->Form->input('vida_util_maq_year', ['class' => 'form-control',  'label' => false, 'id' => 'vida_util_maq_year', 'disabled' => True, 'value' => $maquina_esp->vida_util_maq_year]) ?> </td>
                                                                </tr>

                                                                <tr>
                                                                    <td class="row-label" style="vertical-align: middle;" > <label for="vida_util_maq">Vida Útil del Equipo (Horas):</label></td>

                                                                    <td> <?= $this->Form->input('vida_util_maq', ['class' => 'form-control',  'label' => false, 'id' => 'vida_util_maq', 'disabled' => True, 'value' => $maquina_esp->vida_util_maq]) ?> </td>
                                                                </tr>

                                                                <tr>
                                                                    <td class="row-label" style="vertical-align: middle;" > <label for="vida_util_srod_maq">Vida Útil Tren Rod. Maquina (Horas):</label></td>

                                                                    <td> <?= $this->Form->input('vida_util_srod_maq', ['class' => 'form-control',  'label' => false, 'id' => 'vida_util_srod_maq', 'disabled' => True, 'value' => $maquina_esp->vida_util_srod_maq]) ?> </td>
                                                                </tr>

                                                                </tbody>
                                                            </table>
                                                        </div>

                                                        <div class="col-md-6">

                                                            <table class="table">
                                                                <tbody>

                                                                <tr>
                                                                    <td class="row-label" style="vertical-align: middle;" > <label for="  va_imp">Valor Adquisición Implemento ($):</label></td>

                                                                    <td> <?= $this->Form->input('va_imp', ['class' => 'form-control', 'label' => false, 'id' => 'va_imp', 'disabled' => True, 'value' => $maquina_esp->va_imp]) ?> </td>
                                                                </tr>

                                                                <tr>
                                                                    <td class="row-label" style="vertical-align: middle;" > <label for="va_sis_rod_imp">Valor Tren Rodante Implemento ($/Tren):</label></td>

                                                                    <td> <?= $this->Form->input('va_sis_rod_imp', ['class' => 'form-control', 'label' => false, 'id' => 'va_sis_rod_imp', 'disabled' => True, 'value' => $maquina_esp->va_sis_rod_imp]) ?> </td>
                                                                </tr>

                                                                <tr>
                                                                    <td class="row-label" style="vertical-align: middle;" > <label for="vida_util_imp_year">Vida Útil Implemento (Años):</label></td>

                                                                    <td> <?= $this->Form->input('vida_util_imp_year', ['class' => 'form-control',  'label' => false, 'id' => 'vida_util_imp_year', 'disabled' => True, 'value' => $maquina_esp->vida_util_imp_year]) ?> </td>
                                                                </tr>

                                                                <tr>
                                                                    <td class="row-label" style="vertical-align: middle;" > <label for="vida_util_imp">Vida Útil Implemento (Horas):</label></td>

                                                                    <td> <?= $this->Form->input('vida_util_imp', ['class' => 'form-control',  'label' => false, 'id' => 'vida_util_imp', 'disabled' => True, 'value' => $maquina_esp->vida_util_imp]) ?> </td>
                                                                </tr>

                                                                <tr>
                                                                    <td class="row-label" style="vertical-align: middle;" > <label for="vida_util_srod_imp">Vida Útil Tren Rod. Implemento (Horas):</label></td>

                                                                    <td> <?= $this->Form->input('vida_util_srod_imp', ['class' => 'form-control', 'label' => false, 'id' => 'vida_util_srod_imp', 'disabled' => True, 'value' => $maquina_esp->vida_util_srod_imp]) ?> </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="row-label" style="vertical-align: middle;" > <label for="fac_var_res">Valor Residual:</label></td>

                                                                    <td> <?= $this->Form->input('fac_var_res', ['class' => 'form-control', 'label' => false, 'id' => 'fac_var_res', 'disabled' => True, 'value' => $maquina_esp->fac_var_res]) ?> </td>
                                                                </tr>


                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>

                                                </div>


                                            </div>
                                            <!-- /.tab-pane -->
                                            <div class="tab-pane" id="tab_2">
                                                <div class="col-md-12">

                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="box-header with-border">
                                                                <h5>Lubricantes, Filtros, Grasas</h5>
                                                            </div>

                                                            <table class="table">
                                                                <tbody>

                                                                <tr>
                                                                    <td class="row-label" style="vertical-align: middle;" > <label for="fac_arreglo_mec">Factor Arreglos Mecánicos(%):</label></td>

                                                                    <td> <?= $this->Form->input('fac_arreglo_mec', ['class' => 'form-control', 'label' => false, 'disabled' => True, 'value' => $maquina_esp->fac_arreglo_mec, 'id' => 'fac_arreglo_mec']) ?> </td>
                                                                </tr>

                                                                <tr>
                                                                    <td class="row-label" style="vertical-align: middle;" > <label for="cons_comb">Combustible (lts/hora):</label></td>

                                                                    <td> <?= $this->Form->input('cons_comb', ['class' => 'form-control', 'label' => false, 'disabled' => True, 'value' => $maquina_esp->cons_comb, 'id' => 'cons_comb']) ?> </td>
                                                                </tr>

                                                                <tr>
                                                                    <td class="row-label" style="vertical-align: middle;" > <label for="con_aceite_motor">Aceite Motor (lts/hora):</label></td>

                                                                    <td> <?= $this->Form->input('con_aceite_motor', ['class' => 'form-control', 'label' => false, 'disabled' => True, 'value' => $maquina_esp->con_aceite_motor, 'id' => 'con_aceite_motor']) ?> </td>
                                                                </tr>

                                                                <tr>
                                                                    <td class="row-label" style="vertical-align: middle;" > <label for="con_aceite_trans">Aceite Transmisión (lts/hora):</label></td>

                                                                    <td> <?= $this->Form->input('con_aceite_trans', ['class' => 'form-control', 'label' => false, 'disabled' => True, 'value' => $maquina_esp->con_aceite_trans, 'id' => 'con_aceite_trans']) ?> </td>
                                                                </tr>

                                                                <tr>
                                                                    <td class="row-label" style="vertical-align: middle;" > <label for="con_aceite_hidra">Fluído Hidráulico (lts/hora):</label></td>

                                                                    <td> <?= $this->Form->input('con_aceite_hidra', ['class' => 'form-control', 'label' => false, 'disabled' => True, 'value' => $maquina_esp->con_aceite_hidra, 'id' => 'con_aceite_hidra']) ?> </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="row-label" style="vertical-align: middle;" > <label for="con_grasa">Grasas (Kg/hora):</label></td>

                                                                    <td> <?= $this->Form->input('con_grasa', ['class' => 'form-control', 'label' => false, 'disabled' => True, 'value' => $maquina_esp->con_grasa, 'id' => 'con_grasa']) ?> </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="row-label" style="vertical-align: middle;" > <label for="costo_hora_filtros">Filtro (Costo Total - $/hora):</label></td>

                                                                    <td> <?= $this->Form->input('costo_hora_filtros', ['class' => 'form-control', 'label' => false, 'disabled' => True, 'value' => $maquina_esp->costo_hora_filtros, 'id' => 'costo_hora_filtros']) ?> </td>
                                                                </tr>

                                                                <tr>
                                                                    <td class="row-label" style="vertical-align: middle;" > <label for="mangueras_horas">Mangueras (Costo Total - $/hora):</label></td>

                                                                    <td> <?= $this->Form->input('mangueras_horas', ['class' => 'form-control', 'label' => false, 'disabled' => True, 'value' => $maquina_esp->mangueras_horas, 'id' => 'mangueras_horas']) ?> </td>
                                                                </tr>

                                                                <tr>
                                                                    <td class="row-label" style="vertical-align: middle;" > <label for="manten_horugas_horas">Mantenimiento Tren Rodante ($/hora):</label></td>

                                                                    <td> <?= $this->Form->input('manten_horugas_horas', ['class' => 'form-control', 'label' => false, 'disabled' => True, 'value' => $maquina_esp->manten_horugas_horas, 'id' => 'manten_horugas_horas']) ?> </td>
                                                                </tr>

                                                                <tr>
                                                                    <td class="row-label" style="vertical-align: middle;" > <label for="aceite_cadena_hora">Aceite de Cadena (lts/hora):</label></td>

                                                                    <td> <?= $this->Form->input('aceite_cadena_hora', ['class' => 'form-control', 'label' => false, 'disabled' => True, 'value' => $maquina_esp->aceite_cadena_hora, 'id' => 'aceite_cadena_hora']) ?> </td>
                                                                </tr>

                                                                <tr>
                                                                    <td class="row-label" style="vertical-align: middle;" > <label for="espada_hora">Espadas ($/hora):</label></td>

                                                                    <td> <?= $this->Form->input('espada_hora', ['class' => 'form-control', 'label' => false, 'disabled' => True, 'value' => $maquina_esp->espada_hora, 'id' => 'espada_hora']) ?> </td>
                                                                </tr>

                                                                <tr>
                                                                    <td class="row-label" style="vertical-align: middle;" > <label for="cadena_hora">Cadenas ($/hora):</label></td>

                                                                    <td> <?= $this->Form->input('cadena_hora', ['class' => 'form-control', 'label' => false, 'disabled' => True, 'value' => $maquina_esp->cadena_hora, 'id' => 'cadena_hora']) ?> </td>
                                                                </tr>

                                                                </tbody>
                                                            </table>
                                                        </div>



                                                    </div>

                                                </div>

                                            </div>
                                            <!-- /.tab-pane -->
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="col-md-11" style="margin-bottom: 20px;">
                            <div class="col-md-11">
                                <?= $this->Html->link('Volver', ['controller' => 'Emsefor', 'action' => 'view', '?' => ['Accion' => 'Ver Emsefor', 'Categoria' => 'Emsefor', 'id_ems' => $id_ems]],
                                    ['class' => 'btn btn-default pull-left'], ['escape' => false]) ?>
                            </div>

                        </div>

                    </div>
                </div>



            </div>
    </section>
</div>
<?= $this->element('footer')?>



