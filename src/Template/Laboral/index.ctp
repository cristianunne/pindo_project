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
                        <h3 class="box-title">Datos Laborales</h3>
                    </div>

                    <?php foreach ($laboral as $lab): ?>

                        <div class="box-body">
                            <table class="table table-bordered table-hover dataTable">

                                <thead>
                                    <tr>
                                        <th scope="col"><?= $this->Paginator->sort('Categoría') ?></th>
                                        <th scope="col" style="vertical-align: middle; text-align: center;"><?= __('%') ?></th>

                                    </tr>
                                </thead>
                                <tbody>

                                <tr>
                                    <td class="row-label" style="vertical-align: middle; text-align: left; width: 30%;" >Convenio</td>

                                    <td style="vertical-align: middle; width: 20%; text-align: center;">  <?= h($lab->convenio) ?></td>

                                </tr>

                                <tr>
                                    <td class="row-label" style="vertical-align: middle; text-align: left;" > Antigüedad</td>

                                    <td style="vertical-align: middle; width: 20%; text-align: center;"> <?= h($lab->antiguedad) ?> </td>


                                </tr>
                                <tr>
                                    <td class="row-label" style="vertical-align: middle; text-align: left;" >Aguinaldo</td>

                                    <td style="vertical-align: middle; width: 20%; text-align: center;"> <?= h($lab->aguinaldo) ?></td>


                                </tr>

                                <tr>
                                    <td class="row-label" style="vertical-align: middle; text-align: left;" > Suplemento por Antigüedad</td>

                                    <td style="vertical-align: middle; width: 20%; text-align: center;"> <?= h($lab->ant_sup) ?> </td>


                                </tr>

                                <tr>
                                    <td class="row-label" style="vertical-align: middle; text-align: left;" > Feriados</td>

                                    <td style="vertical-align: middle; width: 20%; text-align: center;"> <?= h($lab->feriado) ?></td>


                                </tr>

                                <tr>
                                    <td class="row-label" style="vertical-align: middle; text-align: left;" > Vacaciones</td>

                                    <td style="vertical-align: middle; width: 20%; text-align: center;"> <?= h($lab->vacaciones) ?> </td>



                                </tr>

                                <tr>
                                    <td class="row-label" style="vertical-align: middle; text-align: left;" > Presentismo</td>

                                    <td style="vertical-align: middle; width: 20%; text-align: center;"><?= h($lab->presentismo) ?> </td>

                                </tr>

                                </tbody>

                            </table>
                            <br>
                        </div>
                        <div class="box-header with-border">
                            <h3 class="box-title">Aportes del Empleado</h3>
                        </div>

                        <div class="box-body">
                            <table class="table table-bordered table-hover dataTable">

                                <thead>
                                <tr>
                                    <th scope="col"><?= $this->Paginator->sort('Categoría') ?></th>
                                    <th scope="col" style="vertical-align: middle; text-align: center;"><?= __('%') ?></th>

                                </tr>
                                </thead>
                                <tbody>

                                <tr>
                                    <td class="row-label" style="vertical-align: middle; text-align: left; width: 30%;" >Jubilación</td>

                                    <td style="vertical-align: middle; width: 20%; text-align: center;">  <?= h($lab->empleado_jub) ?></td>

                                </tr>

                                <tr>
                                    <td class="row-label" style="vertical-align: middle; text-align: left;" >Obra Social</td>

                                    <td style="vertical-align: middle; width: 20%; text-align: center;"> <?= h($lab->empleado_obra_social) ?> </td>


                                </tr>
                                <tr>
                                    <td class="row-label" style="vertical-align: middle; text-align: left;" >INSSJP</td>

                                    <td style="vertical-align: middle; width: 20%; text-align: center;"> <?= h($lab->empleado_ley_19032) ?></td>


                                </tr>

                                <tr>
                                    <td class="row-label" style="vertical-align: middle; text-align: left;" >Seguro de Vida</td>

                                    <td style="vertical-align: middle; width: 20%; text-align: center;"> <?= h($lab->empleado_seguro_vida) ?> </td>


                                </tr>

                                <tr>
                                    <td class="row-label" style="vertical-align: middle; text-align: left;" >Sindicato</td>

                                    <td style="vertical-align: middle; width: 20%; text-align: center;"> <?= h($lab->empleado_sindicato) ?></td>


                                </tr>

                                <tr>
                                    <td class="row-label" style="vertical-align: middle; text-align: left;" >RENATEA</td>

                                    <td style="vertical-align: middle; width: 20%; text-align: center;"> <?= h($lab->empleado_renatea) ?> </td>



                                </tr>


                                </tbody>

                            </table>
                            <br>
                        </div>

                        <div class="box-header with-border">
                            <h3 class="box-title">Contribuciones del Empleador</h3>
                        </div>

                        <div class="box-body">
                            <table class="table table-bordered table-hover dataTable">

                                <thead>
                                <tr>
                                    <th scope="col"><?= $this->Paginator->sort('Categoría') ?></th>
                                    <th scope="col" style="vertical-align: middle; text-align: center;"><?= __('%') ?></th>

                                </tr>
                                </thead>
                                <tbody>

                                <tr>
                                    <td class="row-label" style="vertical-align: middle; text-align: left; width: 30%;" >Jubilación</td>

                                    <td style="vertical-align: middle; width: 20%; text-align: center;">  <?= h($lab->empleador_jub) ?></td>

                                </tr>

                                <tr>
                                    <td class="row-label" style="vertical-align: middle; text-align: left;" >Asignaciones familiares</td>

                                    <td style="vertical-align: middle; width: 20%; text-align: center;"> <?= h($lab->empleador_asignacion) ?> </td>


                                </tr>
                                <tr>
                                    <td class="row-label" style="vertical-align: middle; text-align: left;" >Fondo Nac.de empleo</td>

                                    <td style="vertical-align: middle; width: 20%; text-align: center;"> <?= h($lab->empleador_fondo_des) ?></td>


                                </tr>

                                <tr>
                                    <td class="row-label" style="vertical-align: middle; text-align: left;" >INSSJP</td>

                                    <td style="vertical-align: middle; width: 20%; text-align: center;"> <?= h($lab->empleador_inssjp) ?> </td>


                                </tr>

                                <tr>
                                    <td class="row-label" style="vertical-align: middle; text-align: left;" >Obra Social</td>

                                    <td style="vertical-align: middle; width: 20%; text-align: center;"> <?= h($lab->empleador_obra_social) ?></td>


                                </tr>


                                <tr>
                                    <td class="row-label" style="vertical-align: middle; text-align: left;" >Seguro de Vida</td>

                                    <td style="vertical-align: middle; width: 20%; text-align: center;"> <?= h($lab->empleador_seguro_vida) ?> </td>

                                </tr>

                                <tr>
                                    <td class="row-label" style="vertical-align: middle; text-align: left;" >RENATEA</td>

                                    <td style="vertical-align: middle; width: 20%; text-align: center;"> <?= h($lab->empleador_renatea) ?> </td>

                                </tr>


                                </tbody>

                            </table>
                            <br>
                        </div>

                        <div class="box-header with-border">
                            <h3 class="box-title">Previsiones</h3>
                        </div>

                        <div class="box-body">
                            <table class="table table-bordered table-hover dataTable">

                                <thead>
                                <tr>
                                    <th scope="col"><?= $this->Paginator->sort('Categoría') ?></th>
                                    <th scope="col" style="vertical-align: middle; text-align: center;"><?= __('%') ?></th>

                                </tr>
                                </thead>
                                <tbody>

                                <tr>
                                    <td class="row-label" style="vertical-align: middle; text-align: left; width: 30%;" >Previsión Enfermedad</td>

                                    <td style="vertical-align: middle; width: 20%; text-align: center;">  <?= h($lab->prev_enfermedad) ?></td>

                                </tr>

                                <tr>
                                    <td class="row-label" style="vertical-align: middle; text-align: left;" >Previsión Despido</td>

                                    <td style="vertical-align: middle; width: 20%; text-align: center;"> <?= h($lab->prev_despido) ?> </td>


                                </tr>
                                <tr>
                                    <td class="row-label" style="vertical-align: middle; text-align: left;" >Examen Médico Preocup.</td>

                                    <td style="vertical-align: middle; width: 20%; text-align: center;"> <?= h($lab->exam_preocup) ?></td>


                                </tr>

                                <tr>
                                    <td class="row-label" style="vertical-align: middle; text-align: left;" >Seguro Colec. Ley 16.600/op/mes:</td>

                                    <td style="vertical-align: middle; width: 20%; text-align: center;"> <?= h($lab->seguro_colectivo) ?> </td>


                                </tr>

                                </tbody>

                            </table>
                            <br>
                        </div>


                        <div class="box-header with-border">
                            <h3 class="box-title">Otros</h3>
                        </div>

                        <div class="box-body">
                            <table class="table table-bordered table-hover dataTable">

                                <thead>
                                <tr>
                                    <th scope="col"><?= $this->Paginator->sort('Categoría') ?></th>
                                    <th scope="col" style="vertical-align: middle; text-align: center;"><?= __('%') ?></th>

                                </tr>
                                </thead>
                                <tbody>

                                    <tr>
                                        <td class="row-label" style="vertical-align: middle; text-align: left; width: 30%;" >ART - Aporte fijo</td>

                                        <td style="vertical-align: middle; width: 20%; text-align: center;">  <?= h($lab->art_fijo) ?></td>

                                    </tr>

                                    <tr>
                                        <td class="row-label" style="vertical-align: middle; text-align: left;" >ART - Aporte sobre el básico</td>

                                        <td style="vertical-align: middle; width: 20%; text-align: center;"> <?= h($lab->art_prop) ?> </td>

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
