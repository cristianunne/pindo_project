<?= $this->Html->script('index/index.js') ?>
<?= $this->Html->script('li_change.js') ?>

<?= $this->Html->css('Insumos/insumos.css') ?>


<?= $this->element('header')?>
<?= $this->element('sidebar')?>

<?php


?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <?= $this->element('panel_header')?>
    <?= $this->Flash->render() ?>

    <section class="content">
        <div class="row">
            <?= $this->Form->create($Insumos) ?>

                <div class="col-md-6" style="float: none; margin: 0 auto">

                    <!-- Form Element sizes -->
                    <div class="box box-success">
                        <div class="box-header with-border">
                            <h3 class="box-title"><strong>Agregar Precios de Insumos</strong></h3>
                        </div>

                        <div class="box-header with-border">
                            <h3 class="box-title">Insumos de Máquinas</h3>
                        </div>

                        <div class="box-body">
                            <table class="table" style="width: 0%;">
                                <tbody>


                                <tr>
                                    <td class="row-label" style="vertical-align: middle;" > <label for="pres_comb_siva">Precio del combustible (sin IVA) ($/l):</label></td>

                                    <td> <?= $this->Form->input('pres_comb_siva', ['class' => 'form-control', 'label' => false, 'required', 'id' => 'pres_comb_siva']) ?> </td>
                                </tr>

                                <tr>
                                    <td class="row-label" style="vertical-align: middle;" > <label for="pres_aceite_motor">Precio del aceite de motor ($/l):</label></td>

                                    <td> <?= $this->Form->input('pres_aceite_motor', ['class' => 'form-control', 'label' => false, 'required', 'id' => 'pres_aceite_motor']) ?> </td>
                                </tr>

                                <tr>
                                    <td class="row-label" style="vertical-align: middle;" > <label for="pres_aceite_trans">Precio del aceite de transmisión ($/l):</label></td>

                                    <td> <?= $this->Form->input('pres_aceite_trans', ['class' => 'form-control', 'label' => false, 'required', 'id' => 'pres_aceite_trans']) ?> </td>
                                </tr>

                                <tr>
                                    <td class="row-label" style="vertical-align: middle;" > <label for="pres_aceite_hidra">Precio del aceite hidráulico ($/l):</label></td>

                                    <td> <?= $this->Form->input('pres_aceite_hidra', ['class' => 'form-control', 'label' => false, 'required', 'id' => 'pres_aceite_hidra']) ?> </td>
                                </tr>
                                <tr>
                                    <td class="row-label" style="vertical-align: middle;" > <label for="precio_aceite_cadena">Precio aceite de cadena ($/l):</label></td>

                                    <td> <?= $this->Form->input('precio_aceite_cadena', ['class' => 'form-control', 'label' => false, 'required', 'id' => 'precio_aceite_cadena']) ?> </td>
                                </tr>

                                <tr>
                                    <td class="row-label" style="vertical-align: middle;" > <label for="precio_espada">Precio de una espada de harvester ($/espada):</label></td>

                                    <td> <?= $this->Form->input('precio_espada', ['class' => 'form-control', 'label' => false, 'required', 'id' => 'precio_espada']) ?> </td>
                                </tr>

                                <tr>
                                    <td class="row-label" style="vertical-align: middle;" > <label for="precio_cadena">Precio de una cadena de harvester ($/cadena):</label></td>

                                    <td> <?= $this->Form->input('precio_cadena', ['class' => 'form-control', 'label' => false, 'required', 'id' => 'precio_cadena']) ?> </td>
                                </tr>

                                <tr>
                                    <td class="row-label" style="vertical-align: middle;" > <label for="pres_grasa">Precio de la grasa ($/kg):</label></td>

                                    <td> <?= $this->Form->input('pres_grasa', ['class' => 'form-control', 'label' => false, 'required', 'id' => 'pres_grasa']) ?> </td>
                                </tr>


                                </tbody>
                            </table>

                        </div>

                        <div class="box-header with-border">
                            <h3 class="box-title">Uniformes</h3>
                        </div>

                        <div class="box-body">
                            <table class="table" style="width: 0%;">
                                <tbody>


                                <tr>
                                    <td class="row-label" style="vertical-align: middle;" > <label for="uniforme">Uniforme completo ($/semestre):</label></td>

                                    <td> <?= $this->Form->input('uniforme', ['class' => 'form-control', 'label' => false, 'required', 'id' => 'uniforme']) ?> </td>
                                </tr>

                                <tr>
                                    <td class="row-label" style="vertical-align: middle;" > <label for="botin_seguridad">Botines de seguridad ($/semestre):</label></td>

                                    <td> <?= $this->Form->input('botin_seguridad', ['class' => 'form-control', 'label' => false, 'required', 'id' => 'botin_seguridad']) ?> </td>
                                </tr>

                                <tr>
                                    <td class="row-label" style="vertical-align: middle;" > <label for="guante">Guantes ($/semestre):</label></td>

                                    <td> <?= $this->Form->input('guante', ['class' => 'form-control', 'label' => false, 'required', 'id' => 'guante']) ?> </td>
                                </tr>

                                <tr>
                                    <td class="row-label" style="vertical-align: middle;" > <label for="protector_auditivo">Gafas y protección auditiva ($/semestre):</label></td>

                                    <td> <?= $this->Form->input('protector_auditivo', ['class' => 'form-control', 'label' => false, 'required', 'id' => 'protector_auditivo']) ?> </td>
                                </tr>
                                <tr>
                                    <td class="row-label" style="vertical-align: middle;" > <label for="casco_chaleco">Casco y chaleco ($/semestre):</label></td>

                                    <td> <?= $this->Form->input('casco_chaleco', ['class' => 'form-control', 'label' => false, 'required', 'id' => 'casco_chaleco']) ?> </td>
                                </tr>

                                <tr>
                                    <td class="row-label" style="vertical-align: middle;" > <label for="pantalon_seguridad">Pantalon de seguridad ($/semestre):</label></td>

                                    <td> <?= $this->Form->input('pantalon_seguridad', ['class' => 'form-control', 'label' => false, 'required', 'id' => 'pantalon_seguridad']) ?> </td>
                                </tr>

                                </tbody>
                            </table>

                        </div>

                        <div class="box-header with-border">
                            <h3 class="box-title">Otros Gastos</h3>
                        </div>

                        <div class="box-body">
                            <table class="table" style="width: 0%;">
                                <tbody>


                                <tr>
                                    <td class="row-label" style="vertical-align: middle;" > <label for="alojamiento_dia_persona">Alojamiento ($/dia):</label></td>

                                    <td> <?= $this->Form->input('alojamiento_dia_persona', ['class' => 'form-control', 'label' => false, 'required', 'id' => 'alojamiento_dia_persona']) ?> </td>
                                </tr>

                                <tr>
                                    <td class="row-label" style="vertical-align: middle;" > <label for="vianda_dia">Comida ($/dia):</label></td>

                                    <td> <?= $this->Form->input('vianda_dia', ['class' => 'form-control', 'label' => false, 'required', 'id' => 'vianda_dia']) ?> </td>
                                </tr>

                                <tr>
                                    <td class="row-label" style="vertical-align: middle;" > <label for="movil_traslado_costo">Movil de traslado de personal ($/km):</label></td>

                                    <td> <?= $this->Form->input('movil_traslado_costo', ['class' => 'form-control', 'label' => false, 'required', 'id' => 'movil_traslado_costo']) ?> </td>
                                </tr>


                                </tbody>
                            </table>

                        </div>

                        <div class="box-footer">
                            <?= $this->Form->button('Agregar', ['class' => 'btn btn-success pull-right']) ?>

                        </div>

                    </div>


                </div>
            <?= $this->Form->end() ?>
        </div>

    </section>
</div>
<?= $this->element('footer')?>
