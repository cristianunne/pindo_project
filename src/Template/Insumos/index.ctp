<?= $this->Html->script('index/index.js') ?>
<?= $this->Html->script('li_change.js') ?>


<?= $this->element('header')?>
<?= $this->element('sidebar')?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <?= $this->element('panel_header')?>
    <?= $this->Flash->render() ?>

    <section class="content">
        <div class="row">

            <div class="col-md-3" style="float: none; margin: 0 auto">
                <!-- Form Element sizes -->
                <div class="box box-success">


                    <div class="box-header with-border">
                        <h3 class="box-title">Insumos de Máquinas</h3>
                    </div>

                    <?php foreach ($insumos as $ins): ?>

                        <div class="box-body">
                            <table class="table table-bordered table-hover dataTable">

                                <thead>
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col" style="vertical-align: middle; text-align: center;"><?= __('Precio') ?></th>

                                </tr>
                                </thead>
                                <tbody>

                                <tr>
                                    <td class="row-label" style="vertical-align: middle; text-align: left; width: 30%;" >Precio del combustible (sin IVA) ($/l)</td>

                                    <td style="vertical-align: middle; width: 20%; text-align: center;">  <?= h($ins->pres_comb_siva) ?></td>

                                </tr>

                                <tr>
                                    <td class="row-label" style="vertical-align: middle; text-align: left;" > Precio del aceite de motor ($/l)</td>

                                    <td style="vertical-align: middle; width: 20%; text-align: center;"> <?= h($ins->pres_aceite_motor) ?> </td>


                                </tr>
                                <tr>
                                    <td class="row-label" style="vertical-align: middle; text-align: left;" >Precio del aceite de transmisión ($/l)</td>

                                    <td style="vertical-align: middle; width: 20%; text-align: center;"> <?= h($ins->pres_aceite_trans) ?></td>


                                </tr>

                                <tr>
                                    <td class="row-label" style="vertical-align: middle; text-align: left;" > Precio del aceite hidráulico ($/l)</td>

                                    <td style="vertical-align: middle; width: 20%; text-align: center;"> <?= h($ins->pres_aceite_hidra) ?> </td>


                                </tr>

                                <tr>
                                    <td class="row-label" style="vertical-align: middle; text-align: left;" >Precio aceite de cadena ($/l)</td>

                                    <td style="vertical-align: middle; width: 20%; text-align: center;"> <?= h($ins->precio_aceite_cadena) ?></td>


                                </tr>

                                <tr>
                                    <td class="row-label" style="vertical-align: middle; text-align: left;" >Precio de una espada de harvester ($/espada)</td>

                                    <td style="vertical-align: middle; width: 20%; text-align: center;"> <?= h($ins->precio_espada) ?> </td>



                                </tr>

                                <tr>
                                    <td class="row-label" style="vertical-align: middle; text-align: left;" >Precio de una cadena de harvester ($/cadena)</td>

                                    <td style="vertical-align: middle; width: 20%; text-align: center;"><?= h($ins->precio_cadena) ?> </td>

                                </tr>

                                <tr>
                                    <td class="row-label" style="vertical-align: middle; text-align: left;" >Precio de la grasa ($/kg)</td>

                                    <td style="vertical-align: middle; width: 20%; text-align: center;"><?= h($ins->pres_grasa) ?> </td>

                                </tr>

                                </tbody>

                            </table>
                            <br>
                        </div>
                        <div class="box-header with-border">
                            <h3 class="box-title">Uniformes</h3>
                        </div>

                        <div class="box-body">
                            <table class="table table-bordered table-hover dataTable">

                                <thead>
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col" style="vertical-align: middle; text-align: center;"><?= __('Precio') ?></th>

                                </tr>
                                </thead>
                                <tbody>

                                <tr>
                                    <td class="row-label" style="vertical-align: middle; text-align: left; width: 30%;" >Uniforme completo ($/semestre)</td>

                                    <td style="vertical-align: middle; width: 20%; text-align: center;">  <?= h($ins->uniforme) ?></td>

                                </tr>

                                <tr>
                                    <td class="row-label" style="vertical-align: middle; text-align: left;" >Botines de seguridad ($/semestre)</td>

                                    <td style="vertical-align: middle; width: 20%; text-align: center;"> <?= h($ins->botin_seguridad) ?> </td>


                                </tr>
                                <tr>
                                    <td class="row-label" style="vertical-align: middle; text-align: left;" >Guantes ($/semestre)</td>

                                    <td style="vertical-align: middle; width: 20%; text-align: center;"> <?= h($ins->guante) ?></td>


                                </tr>

                                <tr>
                                    <td class="row-label" style="vertical-align: middle; text-align: left;" >Gafas y protección auditiva ($/semestre)</td>

                                    <td style="vertical-align: middle; width: 20%; text-align: center;"> <?= h($ins->protector_auditivo) ?> </td>


                                </tr>

                                <tr>
                                    <td class="row-label" style="vertical-align: middle; text-align: left;" >Casco y chaleco ($/semestre)</td>

                                    <td style="vertical-align: middle; width: 20%; text-align: center;"> <?= h($ins->casco_chaleco) ?></td>


                                </tr>

                                <tr>
                                    <td class="row-label" style="vertical-align: middle; text-align: left;" >Pantalon de seguridad ($/semestre)</td>

                                    <td style="vertical-align: middle; width: 20%; text-align: center;"> <?= h($ins->pantalon_seguridad) ?> </td>



                                </tr>


                                </tbody>

                            </table>
                            <br>
                        </div>

                        <div class="box-header with-border">
                            <h3 class="box-title">Otros Gastos</h3>
                        </div>

                        <div class="box-body">
                            <table class="table table-bordered table-hover dataTable">

                                <thead>
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col" style="vertical-align: middle; text-align: center;"><?= __('Precio') ?></th>

                                </tr>
                                </thead>
                                <tbody>

                                <tr>
                                    <td class="row-label" style="vertical-align: middle; text-align: left; width: 30%;" >Alojamiento ($/dia)</td>

                                    <td style="vertical-align: middle; width: 20%; text-align: center;">  <?= h($ins->alojamiento_dia_persona) ?></td>

                                </tr>

                                <tr>
                                    <td class="row-label" style="vertical-align: middle; text-align: left;" >Comida ($/dia)</td>

                                    <td style="vertical-align: middle; width: 20%; text-align: center;"> <?= h($ins->vianda_dia) ?> </td>


                                </tr>
                                <tr>
                                    <td class="row-label" style="vertical-align: middle; text-align: left;" >Movil de traslado de personal ($/km)</td>

                                    <td style="vertical-align: middle; width: 20%; text-align: center;"> <?= h($ins->movil_traslado_costo) ?></td>

                                </tr>

                                </tbody>

                            </table>
                            <br>
                        </div>


                        <?php break; ?>

                    <?php endforeach; ?>
                </div>


            </div>

        </div>
    </section>
</div>
<?= $this->element('footer')?>
