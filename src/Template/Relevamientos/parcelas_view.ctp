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
                        <h3 class="box-title"><?= h('Lista de Parcelas del Rodal: '.$id_rodal. ' - SAP: '. $sap) ?> </h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <table id="example2" class="table table-bordered table-hover dataTable">
                            <thead>
                            <tr>
                                <th style="vertical-align: middle; text-align: center;" scope="col"><?= $this->Paginator->sort('Id') ?></th>
                                <th style="vertical-align: middle; text-align: center;" scope="col"><?= $this->Paginator->sort('Tipo') ?></th>
                                <th style="vertical-align: middle; text-align: center;" scope="col"><?= $this->Paginator->sort('Fecha') ?></th>
                                <th style="vertical-align: middle; text-align: center;" scope="col"><?= $this->Paginator->sort('Comentarios') ?></th>
                                <th style="vertical-align: middle; text-align: center;" scope="col"><?= $this->Paginator->sort('N° de árboles') ?></th>
                                <th style="vertical-align: middle; text-align: center;" scope="col"><?= __('Acciones') ?></th>

                            </tr>
                            </thead>
                            <tbody>

                            <?php foreach ($parcelasRelTable as $parcelas): ?>
                                <tr>

                                    <td style="font-weight: bold; vertical-align: middle; text-align: center;"><?= h($parcelas->id_parcelas_rel) ?></td>
                                    <td style="vertical-align: middle; text-align: center;"><?= h($parcelas->tipo) ?></td>
                                    <?php if (!empty($parcelas->fecha)):?>
                                        <td style="vertical-align: middle; text-align: center;"><?= h($parcelas->fecha->format('d-m-Y')) ?></td>
                                    <?php else:?>
                                        <td></td>
                                    <?php endif;?>


                                    <td style="vertical-align: middle; text-align: left;"><?= h($parcelas->comentarios) ?></td>

                                    <?php if(!empty($parcelas->arboles_by_parcela)): ?>
                                        <td style="vertical-align: middle; text-align: center;"><?=h($parcelas->arboles_by_parcela->cant_arb)?></td>
                                    <?php else: ?>
                                        <td style="vertical-align: middle; text-align: center;">0</td>
                                    <?php endif; ?>

                                    <td style="vertical-align: middle; text-align: center;">



                                        <?= $this->Html->link($this->Html->tag('span', '', ['class' => 'glyphicon glyphicon-search', 'aria-hidden' => 'true']),
                                            ['controller' => 'Relevamientos', 'action' => 'viewArboles','?' => ['Accion' => 'Ver Arboles', 'Categoria' => 'Relevamientos',
                                                'id' => $parcelas->id_parcelas_rel, 'id_rodal' => $id_rodal, 'sap' => h($sap)]], ['class' => 'btn btn-success', 'escape' => false]) ?>

                                        <?php  if($user_rol == 'admin'): ?>
                                            <?= $this->Html->link($this->Html->tag('span', '', ['class' => 'glyphicon glyphicon-edit', 'aria-hidden' => 'true']),
                                                ['controller' => 'Relevamientos', 'action' => 'editParcelas','?' => ['Accion' => 'Editar Relevamientos', 'Categoria' => 'Relevamientos',
                                                    'id' => $parcelas->id_parcelas_rel, 'id_rodal' => $id_rodal, 'sap' => h($sap)]], ['class' => 'btn btn-warning', 'escape' => false]) ?>

                                            <?= $this->Form->postLink(__($this->Html->tag('span', '', ['class' => 'glyphicon glyphicon-remove', 'aria-hidden' => 'true'])),
                                                ['controller' => 'Relevamientos', 'action' => 'deleteParcelas',
                                                '?' => ['Accion' => 'Ver Relevamientos', 'Categoria' => 'Relevamientos',
                                                    'id' => $parcelas->id_parcelas_rel, 'id_rodal' => $id_rodal, 'sap' => h($sap)]],
                                                ['confirm' => __('Eliminar la Parcela: {0}?', $parcelas->id_parcelas_rel), 'class' => 'btn btn-danger', 'escape' => false]) ?>
                                        <?php endif; ?>

                                    </td>

                                </tr>

                            <?php endforeach; ?>
                            </tbody>
                        </table>


                    </div>

                    <div class="box-footer">
                        <?= $this->Html->link('Volver', ['controller' => 'Relevamientos', 'action' => 'index', '?' => ['Accion' => 'Ver Relevamientos', 'Categoria' => 'Relevamientos']],
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
            'autoWidth': false,
            "columnDefs": [
                { "width": "40%", "targets": 3 }
            ]

        });


    })
</script>