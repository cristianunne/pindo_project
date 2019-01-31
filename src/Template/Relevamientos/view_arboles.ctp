<?= $this->Html->script('index/index.js') ?>
<?= $this->Html->script('li_change.js') ?>
<?= $this->Html->css('relevamientos.css') ?>

<?= $this->element('header')?>
<?= $this->element('sidebar')?>


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <?= $this->element('panel_header')?>
        <?= $this->Flash->render() ?>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box box-success">
                        <div class="box-header">
                            <h3 class="box-title"><?= h('Lista de Árboles de la Parcela: '.$id.' - (Rodal: '. $id_rodal. ') - (SAP: '. $sap).')' ?> </h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive">
                            <table id="example2" class="table table-bordered table-hover dataTable">
                                <thead>
                                <tr>
                                    <th style="vertical-align: middle; text-align: center;" scope="col"><?= $this->Paginator->sort('Id') ?></th>
                                    <th style="vertical-align: middle; text-align: center;" scope="col"><?= $this->Paginator->sort('Marca') ?></th>
                                    <th style="vertical-align: middle; text-align: center;" scope="col"><?= $this->Paginator->sort('DAP') ?></th>
                                    <th style="vertical-align: middle; text-align: center;" scope="col"><?= $this->Paginator->sort('Altura') ?></th>
                                    <th style="vertical-align: middle; text-align: center;" scope="col"><?= $this->Paginator->sort('Altura de Poda') ?></th>
                                    <th style="vertical-align: middle; text-align: center;" scope="col"><?= $this->Paginator->sort('DMSM') ?></th>
                                    <th style="vertical-align: middle; text-align: center;" scope="col"><?= $this->Paginator->sort('Calidad') ?></th>
                                    <th style="vertical-align: middle; text-align: center;" scope="col"><?= $this->Paginator->sort('Cosechado') ?></th>
                                    <th style="vertical-align: middle; text-align: center;" scope="col"><?= $this->Paginator->sort('Fecha') ?></th>
                                    <th style="vertical-align: middle; text-align: center;" scope="col"><?= __('Acciones') ?></th>

                                </tr>
                                </thead>
                                <tbody>

                                <?php foreach ($arbolesRelTable as $arbol): ?>
                                    <tr>
                                        <td style="font-weight: bold; vertical-align: middle; text-align: center;"><?= h($arbol->idarbol) ?></td>
                                        <td style="vertical-align: middle; text-align: center;"><?= h($arbol->marca) ?></td>
                                        <td style="vertical-align: middle; text-align: center;"><?= h($arbol->dap) ?></td>
                                        <td style="vertical-align: middle; text-align: center;"><?= h($arbol->altura) ?></td>
                                        <td style="vertical-align: middle; text-align: center;"><?= h($arbol->altura_poda) ?></td>
                                        <td style="vertical-align: middle; text-align: center;"><?= h($arbol->dmsm) ?></td>
                                        <td style="vertical-align: middle; text-align: center;"><?= h($arbol->calidad) ?></td>

                                        <td style="vertical-align: middle; text-align: center;">
                                            <?php  if($arbol->cosechado == false){

                                                echo 'No';
                                            } else {

                                                echo 'Si';
                                            }?>
                                        </td>

                                        <?php if (!empty($arbol->fecha_rel)):?>
                                            <td style="vertical-align: middle; text-align: center;"><?= h($arbol->fecha_rel->format('d-m-Y')) ?></td>
                                        <?php else:?>
                                            <td></td>
                                        <?php endif;?>

                                        <td style="vertical-align: middle; text-align: center;">

                                            <?= $this->Html->link($this->Html->tag('span', '', ['class' => 'glyphicon glyphicon-edit', 'aria-hidden' => 'true']),
                                                ['controller' => 'Relevamientos', 'action' => 'editArboles','?' => ['Accion' => 'Editar Árbol', 'Categoria' => 'Relevamientos',
                                                    'id_arbol' => $arbol->idarbol, 'id' => $id, 'id_rodal' => $id_rodal, 'sap' => h($sap)]],
                                                ['class' => 'btn btn-warning', 'escape' => false]) ?>


                                            <?= $this->Form->postLink(__($this->Html->tag('span', '', ['class' => 'glyphicon glyphicon-remove', 'aria-hidden' => 'true'])),
                                                ['controller' => 'Relevamientos', 'action' => 'deleteArboles',
                                                    '?' => ['Accion' => 'Ver Árboles', 'Categoria' => 'Relevamientos', 'id_arbol' => $arbol->idarbol,
                                                        'id' => $id, 'id_rodal' => $id_rodal, 'sap' => h($sap)]],
                                                ['confirm' => __('Eliminar el Árbol: {0}?', $arbol->idarbol), 'class' => 'btn btn-danger', 'escape' => false]) ?>


                                        </td>
                                    </tr>

                                <?php endforeach; ?>
                                </tbody>
                            </table>


                        </div>

                        <div class="box-footer">
                            <?= $this->Html->link('Volver', ['controller' => 'Relevamientos', 'action' => 'parcelasView', '?' =>
                                ['Accion' => 'Ver Relevamientos', 'Categoria' => 'Relevamientos', 'id' => $id_rodal, 'sap' => h($sap)]],
                                ['class' => 'btn btn-default pull-left'], ['escape' => false]) ?>

                        </div>

                    </div>
                </div>
            </div>
        </section>

    </div>

<?= $this->element('footer')?>


<script>

    $(function () {
        $('#example2').DataTable({

            'language' : {
                'search': "Buscar:",
                'paginate': {
                    'first':      "Primer",
                    'previous':   "Anterior",
                    'next':       "Siguiente",
                    'last':       "Anterior"
                }},
            "pageLength": 40,
            'lengthChange': true,
            'searching'   : true,
            'ordering'    : true,
            'autoWidth': false
        });


    })
</script>
