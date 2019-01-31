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
            <?= $this->Form->create() ?>
                <div class="col-xs-12">
                    <div class="box box-success">
                        <div class="box-header">
                            <h3 class="box-title">Lista de Rodales con Relevamientos</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive">
                            <table id="example2" class="table table-bordered table-hover dataTable">
                                <thead>
                                <tr>
                                    <th style="vertical-align: middle; text-align: center;" scope="col"><?= $this->Paginator->sort('Rodal N°') ?></th>
                                    <th style="vertical-align: middle; text-align: center;" scope="col"><?= $this->Paginator->sort('Código SAP') ?></th>
                                    <th style="vertical-align: middle; text-align: center;" scope="col"><?= $this->Paginator->sort('Uso') ?></th>
                                    <th style="vertical-align: middle; text-align: center;" scope="col"><?= $this->Paginator->sort('Finalizado') ?></th>
                                    <th style="vertical-align: middle; text-align: center;" scope="col"><?= $this->Paginator->sort('N° de Parcelas') ?></th>
                                    <th style="vertical-align: middle; text-align: center;" scope="col"><?= $this->Paginator->sort('N° de Árboles') ?></th>
                                    <th style="vertical-align: middle; text-align: center;" scope="col"><?= __('Selección') ?></th>

                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($tablaRelResumen as $rodal): ?>
                                    <!-- EL RODAL SOLO SE MOSTRARA SI TIENE PARCELAS y arboles-->


                                        <tr>
                                            <td style="font-weight: bold; vertical-align: middle; text-align: center;"><?= h($rodal->idrodales) ?></td>
                                            <td style="vertical-align: middle; text-align: center;"><?= h($rodal->cod_sap) ?></td>
                                            <td style="vertical-align: middle; text-align: center;"><?= h($rodal->uso) ?></td>
                                            <td style="vertical-align: middle; text-align: center;">
                                                <?php  if($rodal->finalizado == false){

                                                    echo 'No';
                                                } else {

                                                    echo 'Si';
                                                }?>
                                            </td>
                                            <!-- Cuento la cantidad de parcelas-->
                                            <td style="vertical-align: middle; text-align: center;">
                                                <?= h($rodal->cant_parc) ?>
                                            </td>

                                            <td style="vertical-align: middle; text-align: center;">
                                                <?= h($rodal->cant_arb) ?>
                                            </td>

                                            <td style="text-align: center;"> <?= $this->Form->checkbox('rodal_check_'. $rodal->idrodales,
                                                    ['value' => $rodal->idrodales,'label' => false, 'id' => 'maq_cut_check']) ?> </td>

                                        </tr>

                                <?php endforeach; ?>

                                </tbody>
                            </table>


                        </div>

                        <div class="box-footer">


                            <?= $this->Form->button($this->Html->tag('span', 'Siguiente', ['class' => 'glyphicon glyphicon-forward', 'aria-hidden' => 'true']),
                                ['class' => 'btn btn-primary pull-right', 'escape' => false]) ?>

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
            'ordering'    : true

        });


    })
</script>