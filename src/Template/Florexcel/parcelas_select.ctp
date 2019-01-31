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
            <?= $this->Form->create() ?>
            <div class="col-xs-12">
                <div class="box box-success">
                    <div class="box-header">
                        <h3 class="box-title"><?= h('Lista de Parcelas') ?> </h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <table id="example2" class="table table-bordered table-hover dataTable">
                            <thead>
                            <tr>
                                <th style="vertical-align: middle; text-align: center;" scope="col"><?= $this->Paginator->sort('Rodal') ?></th>
                                <th style="vertical-align: middle; text-align: center;" scope="col"><?= $this->Paginator->sort('Id') ?></th>
                                <th style="vertical-align: middle; text-align: center;" scope="col"><?= $this->Paginator->sort('Tipo') ?></th>
                                <th style="vertical-align: middle; text-align: center;" scope="col"><?= $this->Paginator->sort('Fecha') ?></th>
                                <th style="vertical-align: middle; text-align: center;" scope="col"><?= $this->Paginator->sort('Comentarios') ?></th>
                                <th style="vertical-align: middle; text-align: center;" scope="col"><?= $this->Paginator->sort('N° de árboles') ?></th>
                                <th style="vertical-align: middle; text-align: center;" scope="col"><?= __('Selección') ?></th>

                            </tr>
                            </thead>
                            <tbody>

                            <?php foreach ($parcelasRelTable as $parcelas): ?>
                                <tr>
                                    <td style="font-weight: bold; vertical-align: middle; text-align: center;"><?= h($parcelas->rodales_idrodales) ?></td>
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

                                    <td style="text-align: center;"> <?= $this->Form->checkbox('parcela_check_'. $parcelas->id_parcelas_rel,
                                            ['value' => $parcelas->id_parcelas_rel,'label' => false, 'id' => 'parc_check']) ?> </td>

                                </tr>

                            <?php endforeach; ?>
                            </tbody>
                        </table>


                    </div>

                    <div class="box-footer">
                        <?= $this->Html->link('Volver', ['controller' => 'Relevamientos', 'action' => 'index', '?' => ['Accion' => 'Ver Relevamientos', 'Categoria' => 'Relevamientos']],
                            ['class' => 'btn btn-default pull-left'], ['escape' => false]) ?>

                        <?= $this->Form->button($this->Html->tag('span', '', ['class' => 'glyphicon far fa-file-excel', 'aria-hidden' => 'true']). ' Descargar',
                            ['class' => 'btn btn-success pull-right', 'escape' => false]) ?>

                    </div>

                </div>
            </div>
            <?= $this->Form->end() ?>
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