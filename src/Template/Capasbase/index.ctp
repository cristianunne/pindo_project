<?= $this->Html->script('index/index.js') ?>


<?= $this->element('header')?>
<?= $this->element('sidebar')?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <?= $this->element('panel_header')?>
        <?= $this->Flash->render() ?>
        <section class="content">
            <div class="row">
                <div class="col-xs-12 col-sm-12">



                    <div class="box box-primary">
                        <div class="box-header">
                            <h3 class="box-title" style="color: #2981a2;">Lista de Capas Base</h3>
                            <div style="float: right;">
                                <?= $this->Html->link('Agregar', ['controller' => 'Capasbase', 'action' => 'add', '?' => ['Accion' => 'Agregar Capa Base', 'Categoria' => 'Mapa']],
                                    ['class' => 'btn btn-primary pull-left'], ['escape' => false]) ?>

                                <?= $this->Html->link('Set Default', ['controller' => 'Capabasedefault', 'action' => 'index', '?' => ['Accion' => 'Agregar Capa Base', 'Categoria' => 'Mapa']],
                                    ['class' => 'btn btn-success pull-left', 'style' => 'margin-left:5px;'], ['escape' => false]) ?>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive" >
                            <table id="example2" class="table table-bordered table-hover dataTable" style="font-size: smaller;">
                                <thead>
                                <tr>
                                    <th scope="col"><?= $this->Paginator->sort('Id') ?></th>
                                    <th scope="col"><?= $this->Paginator->sort('Nombre') ?></th>
                                    <th scope="col"><?= $this->Paginator->sort('URL Servicio') ?></th>
                                    <th scope="col"><?= $this->Paginator->sort('Atribución') ?></th>
                                    <th scope="col"><?= $this->Paginator->sort('SubDominio') ?></th>
                                    <th scope="col"><?= $this->Paginator->sort('MinZoom') ?></th>
                                    <th scope="col"><?= $this->Paginator->sort('MaxZoom') ?></th>
                                    <th scope="col"><?= $this->Paginator->sort('Formato') ?></th>
                                    <th scope="col"><?= $this->Paginator->sort('Time') ?></th>
                                    <th scope="col"><?= $this->Paginator->sort('TileMatrixSet') ?></th>
                                    <th scope="col"><?= $this->Paginator->sort('Opacidad') ?></th>
                                    <th scope="col"><?= $this->Paginator->sort('Activo') ?></th>
                                    <th scope="col"><?= __('Acciones') ?></th>

                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($capasbase as $capas): ?>
                                    <tr>
                                        <td style="font-weight: bold; text-align: center; vertical-align: middle;"><?= h($capas->idcapasbase) ?></td>
                                        <td style="color: #2981a2; vertical-align: middle;"><?= h($capas->nombre) ?></td>
                                        <td style="text-align: center; vertical-align: middle;"><?= h($capas->urlservice) ?></td>
                                        <td style="text-align: center; vertical-align: middle;"><?= h($capas->attribution) ?></td>
                                        <td><?= h($capas->subdomain) ?></td>
                                        <td style="text-align: center; vertical-align: middle;"><?= h($capas->minzoom) ?></td>
                                        <td style="text-align: center; vertical-align: middle;"><?= h($capas->maxzoom) ?></td>
                                        <td><?= h($capas->format) ?></td>
                                        <td><?= h($capas->time) ?></td>
                                        <td><?= h($capas->tilematrixset) ?></td>
                                        <td style="text-align: center;"><?= h($capas->opacity) ?></td>


                                        <?php if ($capas->active == false || $capas->active == null): ?>
                                            <td style="text-align: center; vertical-align: middle;">No</td>
                                        <?php else: ?>
                                            <td style="text-align: center; vertical-align: middle;">Si</td>
                                        <?php endif; ?>

                                        <td align="center" valign="middle">

                                            <?= $this->Html->link($this->Html->tag('span', '', ['class' => 'glyphicon glyphicon-edit', 'aria-hidden' => 'true']),
                                                ['controller' => 'Capasbase', 'action' => 'edit','?' => ['Accion' => 'Editar Capas Base', 'Categoria' => 'CapasBase', 'id' => $capas->idcapasbase]], ['class' => 'btn btn-warning', 'escape' => false]) ?>

                                            <?= $this->Form->postLink(__($this->Html->tag('span', '', ['class' => 'glyphicon glyphicon-remove', 'aria-hidden' => 'true'])), ['action' => 'delete', $capas->idcapasbase],
                                                ['confirm' => __('Eliminar la Capa Base: {0}?', $capas->idcapasbase), 'class' => 'btn btn-danger', 'escape' => false]) ?>

                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>


                        </div>

                    </div> <!--vid box-->


                </div>

            </div>
        </section>
    </div>

<?= $this->element('footer')?>


<script>
    $(function () {

        $('#example2').removeAttr('width').DataTable({
            'paging'      : true,
            'lengthChange': false,
            'searching'   : true,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : false,
            'fixedColumns': true

        })
    })
</script>


