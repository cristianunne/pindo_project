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
            <?= $this->Form->create($variablesGlobales) ?>
            <div class="col-md-4" style="margin: 0 auto; float: none;">
                <!-- Form Element sizes -->
                <div class="box box-success">

                    <div class="box-header with-border">
                        <h2 class="box-title" style="color: green;">VARIABLES GENERALES</h2>
                    </div>


                    <div class="box-body">

                    <table class="table" style="width: 0%;">
                        <tbody>

                            <tr>
                                <td class="row-label" style="vertical-align: middle;"> <label for="tasa_int_cap_propio">Tasa Interés Capital Propio (%):</label></td>

                                <td> <?= $this->Form->input('tasa_int_cap_propio', ['class' => 'form-control', 'label' => false, 'required', 'id' => 'tasa_int_cap_propio']) ?> </td>
                            </tr>

                            <tr>
                                <td class="row-label" style="vertical-align: middle;" > <label for="ausentismo">Ausentismo (%):</label></td>

                                <td> <?= $this->Form->input('ausentismo', ['class' => 'form-control', 'label' => false, 'required', 'id' => 'ausentismo']) ?> </td>
                            </tr>

                            <tr>
                                <td class="row-label" style="vertical-align: middle;" > <label for="margen_ganancia">Margen de ganancia (%):</label></td>

                                <td> <?= $this->Form->input('margen_ganancia', ['class' => 'form-control', 'label' => false, 'required', 'id' => 'margen_ganancia']) ?> </td>
                            </tr>

                            <tr>
                                <td class="row-label" style="vertical-align: middle;" > <label for="costo_administrativo">Costos administrativos (%):</label></td>

                                <td> <?= $this->Form->input('costo_administrativo', ['class' => 'form-control', 'label' => false, 'required', 'id' => 'costo_administrativo']) ?> </td>
                            </tr>
                            <tr>
                                <td class="row-label" style="vertical-align: middle;" > <label for="contador_publico">Costo del contador público (%):</label></td>

                                <td> <?= $this->Form->input('contador_publico', ['class' => 'form-control', 'label' => false, 'required', 'id' => 'contador_publico']) ?> </td>
                            </tr>

                            <tr>
                                <td class="row-label" style="vertical-align: middle;" > <label for="impuestos_totales">Impuestos sobre el costo final (%):</label></td>

                                <td> <?= $this->Form->input('impuestos_totales', ['class' => 'form-control', 'label' => false, 'required', 'id' => 'impuestos_totales']) ?> </td>
                            </tr>

                            <tr>
                                <td class="row-label" style="vertical-align: middle;" > <label for="tasa_seguro">Tasa de seguro anual (%):</label></td>

                                <td> <?= $this->Form->input('tasa_seguro', ['class' => 'form-control', 'label' => false, 'required', 'id' => 'tasa_seguro']) ?> </td>
                            </tr>

                            <tr>
                                <td class="row-label" style="vertical-align: middle;" > <label for="traslado_personal">Traslado de personal (km/mes):</label></td>

                                <td> <?= $this->Form->input('traslado_personal', ['class' => 'form-control', 'label' => false, 'required', 'id' => 'traslado_personal']) ?> </td>
                            </tr>

                            <tr>
                                <td class="row-label" style="vertical-align: middle;" > <label for="dias_mes">Dias por mes (días):</label></td>

                                <td> <?= $this->Form->input('dias_mes', ['class' => 'form-control', 'label' => false, 'required', 'id' => 'dias_mes']) ?> </td>
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