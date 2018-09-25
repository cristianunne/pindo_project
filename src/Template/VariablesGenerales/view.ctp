<?= $this->Html->script('index/index.js') ?>
<?= $this->Html->script('li_change.js') ?>


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
                    <div class="box box-solid container">
                        <div class="box-header with-border">
                            <i class="fas fa-dollar-sign" style="color: green;"></i>

                            <h2 class="box-title" style="color: green;">VARIABLES GENERALES</h2>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="box-body">
                                    <div class="box-header with-border">
                                        <h4 style="color: green;">Turnos, Costo Administrativo, Margen de Ganancia y Factor de Ajuste</h4>
                                    </div>

                                    <table class="table">
                                        <tbody>

                                        <tr>
                                            <td class="row-label" style="vertical-align: middle;" > <label for="dias_por_mes">Días por mes (Días):</label></td>

                                            <td> <?= $this->Form->input('dias_por_mes', ['class' => 'form-control', 'label' => false, 'disabled' => True, 'value' => $variablesGenerale->dias_por_mes, 'id' => 'dias_por_mes']) ?> </td>
                                        </tr>

                                        <tr>
                                            <td class="row-label" style="vertical-align: middle;" > <label for="margen_ganancia">Margen de Ganancia (%):</label></td>

                                            <td> <?= $this->Form->input('margen_ganancia', ['class' => 'form-control', 'label' => false, 'disabled' => True, 'value' => $variablesGenerale->margen_ganancia, 'id' => 'margen_ganancia']) ?> </td>
                                        </tr>

                                        <tr>
                                            <td class="row-label" style="vertical-align: middle;" > <label for="costo_administrativo">Costo Administrativo (%):</label></td>

                                            <td> <?= $this->Form->input('costo_administrativo', ['class' => 'form-control', 'label' => false, 'disabled' => True, 'value' => $variablesGenerale->costo_administrativo, 'id' => 'costo_administrativo']) ?> </td>
                                        </tr>

                                        <tr>
                                            <td class="row-label" style="vertical-align: middle;" > <label for="factor_ajuste">Factor Corrección Vol. (%):</label></td>

                                            <td> <?= $this->Form->input('factor_ajuste', ['class' => 'form-control', 'label' => false, 'disabled' => True, 'value' => $variablesGenerale->factor_ajuste, 'id' => 'factor_ajuste']) ?> </td>
                                        </tr>


                                        </tbody>
                                    </table>

                                </div>
                                <!-- /.box-body -->
                            </div>

                            <div class="col-md-8">
                                <div class="box-body">
                                    <div class="box-header with-border">
                                        <h4 style="color: green;">Tipo de Inversión</h4>
                                    </div>

                                    <table class="table">
                                        <tbody>

                                        <tr>
                                            <td class="row-label" style="vertical-align: middle;" > <label for="tasa_int_cap_propio">Tasa Interés Capital Propio (%):</label></td>

                                            <td> <?= $this->Form->input('tasa_int_cap_propio', ['class' => 'form-control', 'label' => false, 'disabled' => True, 'value' => $variablesGenerale->tasa_int_cap_propio, 'id' => 'tasa_int_cap_propio']) ?> </td>
                                        </tr>

                                        </tbody>
                                    </table>

                                </div>
                                <!-- /.box-body -->
                            </div>

                            <div class="col-md-8">
                                <div class="box-body">
                                    <div class="box-header with-border">
                                        <h4 style="color: green;">Precios de Insumos sin IVA</h4>
                                    </div>

                                    <table class="table">
                                        <tbody>

                                        <tr>
                                            <td class="row-label" style="vertical-align: middle;" > <label for="pres_comb_siva">Combustible ($/lts):</label></td>

                                            <td> <?= $this->Form->input('pres_comb_siva', ['class' => 'form-control', 'label' => false, 'disabled' => True, 'value' => $variablesGenerale->pres_comb_siva, 'id' => 'pres_comb_siva']) ?> </td>
                                        </tr>

                                        <tr>
                                            <td class="row-label" style="vertical-align: middle;" > <label for="pres_aceite_motor">Aceite Motor ($/lts):</label></td>

                                            <td> <?= $this->Form->input('pres_aceite_motor', ['class' => 'form-control', 'label' => false, 'disabled' => True, 'value' => $variablesGenerale->pres_aceite_motor, 'id' => 'pres_aceite_motor']) ?> </td>
                                        </tr>

                                        <tr>
                                            <td class="row-label" style="vertical-align: middle;" > <label for="pres_aceite_trans">Aceite Transmisión ($/lts):</label></td>

                                            <td> <?= $this->Form->input('pres_aceite_trans', ['class' => 'form-control', 'label' => false, 'disabled' => True, 'value' => $variablesGenerale->pres_aceite_trans, 'id' => 'pres_aceite_trans']) ?> </td>
                                        </tr>

                                        <tr>
                                            <td class="row-label" style="vertical-align: middle;" > <label for="pres_aceite_hidra">Fluído Hidráulico ($/lts):</label></td>

                                            <td> <?= $this->Form->input('pres_aceite_hidra', ['class' => 'form-control', 'label' => false, 'disabled' => True, 'value' => $variablesGenerale->pres_aceite_hidra, 'id' => 'pres_aceite_hidra']) ?> </td>
                                        </tr>

                                        <tr>
                                            <td class="row-label" style="vertical-align: middle;" > <label for="pres_grasa">Grasas ($/kg):</label></td>

                                            <td> <?= $this->Form->input('pres_grasa', ['class' => 'form-control', 'label' => false, 'disabled' => True, 'value' => $variablesGenerale->pres_grasa, 'id' => 'pres_grasa']) ?> </td>
                                        </tr>

                                        <tr>
                                            <td class="row-label" style="vertical-align: middle;" > <label for="precio_aceite_cadena">Aceite Cadena ($/lts):</label></td>

                                            <td> <?= $this->Form->input('precio_aceite_cadena', ['class' => 'form-control', 'label' => false, 'disabled' => True, 'value' => $variablesGenerale->precio_aceite_cadena, 'id' => 'precio_aceite_cadena']) ?> </td>
                                        </tr>

                                        </tbody>
                                    </table>

                                </div>
                                <!-- /.box-body -->
                            </div>


                            <div class="col-md-8">
                                <div class="box-body">

                                    <div class="box-header with-border">
                                        <h4 style="color: green;">Detalles Específicos Personal</h4>
                                    </div>
                                    <div class="nav-tabs-custom">
                                        <ul class="nav nav-tabs">
                                            <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">Cargas Sociales</a></li>
                                            <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Vestimenta y Elementos de Seguridad</a></li>
                                        </ul>

                                        <div class="col-md-12">

                                            <div class="tab-content">
                                                <div class="tab-pane active" id="tab_1">
                                                    <div class="col-md-12">

                                                        <div class="row">
                                                            <div class="box-header with-border">
                                                                <h5>Porcentajes sobre el Salario Básico</h5>
                                                            </div>
                                                            <div class="col-md-12">

                                                                <table class="table">
                                                                    <tbody>

                                                                    <tr>
                                                                        <td class="row-label" style="vertical-align: middle;" > <label for="seguridad_social_24241">Seguridad Social (Ley 24.241 - %):</label></td>

                                                                        <td> <?= $this->Form->input('seguridad_social_24241', ['class' => 'form-control', 'disabled' => True, 'value' => $variablesGenerale->seguridad_social_24241,  'label' => false, 'id' => 'seguridad_social_24241']) ?> </td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td class="row-label" style="vertical-align: middle;" > <label for="art">ART (%):</label></td>

                                                                        <td> <?= $this->Form->input('art', ['class' => 'form-control', 'label' => false, 'disabled' => True, 'value' => $variablesGenerale->art, 'id' => 'art']) ?> </td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td class="row-label" style="vertical-align: middle;" > <label for="seguridad_social_23660">Seguridad Social (Ley 23.660 - %):</label></td>

                                                                        <td> <?= $this->Form->input('seguridad_social_23660', ['class' => 'form-control', 'disabled' => True, 'value' => $variablesGenerale->seguridad_social_23660, 'label' => false, 'id' => 'seguridad_social_23660']) ?> </td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td class="row-label" style="vertical-align: middle;" > <label for="carga_social_12">Carga Social (12%):</label></td>

                                                                        <td> <?= $this->Form->input('carga_social_12', ['class' => 'form-control', 'disabled' => True, 'value' => $variablesGenerale->carga_social_12,  'label' => false, 'id' => 'carga_social_12']) ?> </td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td class="row-label" style="vertical-align: middle;" > <label for="vacaciones_enfermedad">Vacaciones y Enfermedad (%):</label></td>

                                                                        <td> <?= $this->Form->input('vacaciones_enfermedad', ['class' => 'form-control', 'disabled' => True, 'value' => $variablesGenerale->vacaciones_enfermedad,  'label' => false, 'id' => 'vacaciones_enfermedad']) ?> </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="row-label" style="vertical-align: middle;" > <label for="inssjp_19032">INSSJP (Ley 19.132 - %):</label></td>

                                                                        <td> <?= $this->Form->input('inssjp_19032', ['class' => 'form-control',  'label' => false, 'disabled' => True, 'value' => $variablesGenerale->inssjp_19032, 'id' => 'inssjp_19032']) ?> </td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td class="row-label" style="vertical-align: middle;" > <label for="asignacion_familiar_24714">Asignación Familiar (Ley 24.714 - %):</label></td>

                                                                        <td> <?= $this->Form->input('asignacion_familiar_24714', ['class' => 'form-control',  'label' => false, 'disabled' => True, 'value' => $variablesGenerale->asignacion_familiar_24714, 'id' => 'asignacion_familiar_24714']) ?> </td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td class="row-label" style="vertical-align: middle;" > <label for="sac">Sueldo Anual Complementario (%):</label></td>

                                                                        <td> <?= $this->Form->input('sac', ['class' => 'form-control',  'label' => false, 'disabled' => True, 'value' => $variablesGenerale->sac, 'id' => 'sac']) ?> </td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td class="row-label" style="vertical-align: middle;" > <label for="seguro_vida">Seguro de Vida (%):</label></td>

                                                                        <td> <?= $this->Form->input('seguro_vida', ['class' => 'form-control',  'label' => false, 'disabled' => True, 'value' => $variablesGenerale->seguro_vida, 'id' => 'seguro_vida']) ?> </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="row-label" style="vertical-align: middle;" > <label for="ausentismo">Ausentismo (%):</label></td>

                                                                        <td> <?= $this->Form->input('ausentismo', ['class' => 'form-control',  'label' => false, 'disabled' => True, 'value' => $variablesGenerale->ausentismo, 'id' => 'ausentismo']) ?> </td>
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
                                                            <div class="col-md-12">
                                                                <div class="box-header with-border">
                                                                    <h5>Equipo Individual para 6 meses</h5>
                                                                </div>

                                                                <table class="table">
                                                                    <tbody>

                                                                    <tr>
                                                                        <td class="row-label" style="vertical-align: middle;" > <label for="uniforme">Uniforme ($):</label></td>

                                                                        <td> <?= $this->Form->input('uniforme', ['class' => 'form-control', 'label' => false, 'disabled' => True, 'value' => $variablesGenerale->uniforme, 'id' => 'uniforme']) ?> </td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td class="row-label" style="vertical-align: middle;" > <label for="botin_seguridad">Botines de Seguridad ($):</label></td>

                                                                        <td> <?= $this->Form->input('botin_seguridad', ['class' => 'form-control', 'label' => false, 'disabled' => True, 'value' => $variablesGenerale->botin_seguridad, 'id' => 'botin_seguridad']) ?> </td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td class="row-label" style="vertical-align: middle;" > <label for="guante">Guantes ($):</label></td>

                                                                        <td> <?= $this->Form->input('guante', ['class' => 'form-control', 'label' => false, 'disabled' => True, 'value' => $variablesGenerale->guante, 'id' => 'guante']) ?> </td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td class="row-label" style="vertical-align: middle;" > <label for="protector_auditivo">Gafas y Prot. Aud. ($):</label></td>

                                                                        <td> <?= $this->Form->input('protector_auditivo', ['class' => 'form-control', 'label' => false,'disabled' => True, 'value' => $variablesGenerale->protector_auditivo, 'id' => 'protector_auditivo']) ?> </td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td class="row-label" style="vertical-align: middle;" > <label for="casco_chaleco">Casco y Chaleco ($):</label></td>

                                                                        <td> <?= $this->Form->input('casco_chaleco', ['class' => 'form-control', 'label' => false, 'disabled' => True, 'value' => $variablesGenerale->casco_chaleco, 'id' => 'casco_chaleco']) ?> </td>
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
                                <!-- /.box-body -->
                                <div class="col-md-12">
                                    <div class="box-body">

                                        <div class="box-header with-border">
                                            <h4 style="color: green;">Alojamiento</h4>
                                        </div>

                                        <div class="col-md-12">

                                            <table class="table">
                                                <tbody>

                                                <tr>
                                                    <td class="row-label" style="vertical-align: middle;" > <label for="alojamiento_dia_persona">Alojamiento ($/dia):</label></td>
                                                    <td > <?= $this->Form->input('alojamiento_dia_persona', ['class' => 'form-control', 'label' => false, 'disabled' => True, 'value' => $variablesGenerale->alojamiento_dia_persona, 'id' => 'alojamiento_dia_persona']) ?></td>
                                                </tr>

                                                <tr>
                                                    <td class="row-label" style="vertical-align: middle;" > <label for="vianda_dia">Comida ($/dia):</label></td>
                                                    <td > <?= $this->Form->input('vianda_dia', ['class' => 'form-control', 'label' => false, 'disabled' => True, 'value' => $variablesGenerale->vianda_dia, 'id' => 'vianda_dia']) ?></td>
                                                </tr>
                                                </tbody>
                                            </table>

                                        </div>
                                    </div>
                                </div>


                            </div>
                            <div class="col-md-12" style="margin-bottom: 20px;">

                                <?= $this->Html->link('Volver', ['controller' => 'Emsefor', 'action' => 'view', '?' => ['Accion' => 'Ver Emsefor', 'Categoria' => 'Emsefor', 'id_ems' => $id_ems]],
                                    ['class' => 'btn btn-default'], ['escape' => false]) ?>



                            </div>

                        </div>




                    </div>
                </div>

            </div>
        </section>
    </div>
<?= $this->element('footer')?>