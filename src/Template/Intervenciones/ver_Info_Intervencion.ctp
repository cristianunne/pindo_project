<?= $this->Html->css('Empresas/empresas.css') ?>
<?= $this->Html->css('Rodales/rodales.css') ?>
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
            <div class="col-md-9 col-xs-12">

                <div class="box box-success">
                    <div class="box-header">
                        <h3 class="box-title" style="color: green;">Intervención</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <table id="example3" class="table table-bordered table-hover dataTable">
                            <thead>
                            <tr>
                                <th scope="col"><?= $this->Paginator->sort('N°') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('Fecha') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('Tipo de Intervención') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('Levante') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('Intensidad') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('Criterio') ?></th>



                            </tr>
                            </thead>
                            <tbody>
                            <?php

                            if(isset($intervenciones)): ?>

                                <?php foreach ($intervenciones as $inter): ?>
                                    <tr>
                                        <td style="font-weight: bold; vertical-align: middle;"><?= h($inter->idintervencion) ?></td>
                                        <td style="vertical-align: middle;"><?= h($inter->fecha->format('d-m-Y')) ?></td>
                                        <td style="vertical-align: middle;"><?= h($inter->tipo_intervencion) ?></td>
                                        <td style="vertical-align: middle;"><?= h($inter->levante) ?></td>
                                        <td style="vertical-align: middle;"><?= h($inter->intensidad) ?></td>
                                        <td style="vertical-align: middle;"><?= h($inter->criterio) ?></td>

                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                            </tbody>
                        </table>


                    </div>

                </div> <!--vid box-->


            </div>
            <div class="col-md-12 col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Información de la Intervención</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <table id="example2" class="table table-bordered table-hover dataTable">
                            <thead>
                            <tr>
                                <th scope="col"><?= $this->Paginator->sort('N° Intervención') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('Código SAP') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('Fecha') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('Arboles Extraídos') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('Arb/Podados') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('Arb/Ha/Deseada') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('Altura Poda') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('Arb. No Podados') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('DAP') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('Altura') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('DMSM') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('% Removido') ?></th>
                                <th scope="col"><?= __('Acciones') ?></th>

                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($infoIntervencion as $info): ?>
                                <tr>
                                    <td style="font-weight: bold; vertical-align: middle;""><?= h($info->intervencion_idintervencion) ?></td>
                                    <td align="center" style="vertical-align: middle;"><?= h($info->cod_sap) ?></td>
                                    <td align="center" style="vertical-align: middle;"><?= h($info->fecha->format('d-m-Y')) ?></td>
                                    <td align="center" style="vertical-align: middle;"><?= h($info->arb_ha) ?></td>
                                    <td align="center" style="vertical-align: middle;"><?= h($info->arb_podados) ?></td>
                                    <td align="center" style="vertical-align: middle;"><?= h($info->arb_alt_deseada) ?></td>
                                    <td align="center" style="vertical-align: middle;"><?= h($info->alt_poda) ?></td>
                                    <td align="center" style="vertical-align: middle;"><?= h($info->arb_no_podados) ?></td>
                                    <td align="center" style="vertical-align: middle;"><?= h($info->dap) ?></td>
                                    <td align="center" style="vertical-align: middle;"><?= h($info->altura) ?></td>
                                    <td align="center" style="vertical-align: middle;"><?= h($info->dmsm) ?></td>
                                    <td align="center" style="vertical-align: middle;"><?= h($info->porc_removido) ?></td>

                                    <td align="center" valign="middle">

                                        <?= $this->Html->link(__('Editar'), ['action' => 'editInfoIntervencion','?' => ['Accion' => 'Editar Empresas', 'Categoria' => 'Empresa', 'id' => $info->intervencion_idintervencion,
                                            'id_rodal' => $id_rodal]],
                                            ['class' => 'btn btn-warning']) ?>

                                        <?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $info->intervencion_idintervencion],
                                            ['confirm' => __('Eliminar la Empresa: {0}?', $info->intervencion_idintervencion), 'class' => 'btn btn-danger']) ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>


                    </div>

                </div>
            </div>
            <div class="col-md-1 col-xs-5 pull-right">
                <div class="box">
                    <?= $this->Html->link(__('Volver'), ['controller' => 'Rodales', 'action' => 'view','?' => ['Accion' => 'Ver Empresas', 'Rodales' => 'Rodales','id' => $id_rodal]],
                        ['class' => 'btn btn-block btn-success']) ?>
                </div> <!--vid box-->
            </div>
        </div>
    </section>





</div>

<?= $this->element('footer')?>


<script>
    $(function () {
        $('#example1').DataTable()
        $('#example2').DataTable({
            'paging'      : true,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : false
        })
        $('#example3').DataTable({
            'paging'      : true,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : false
        })
    })
</script>
