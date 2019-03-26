
<?= $this->Html->script('index/index.js') ?>
<?= $this->Html->script('li_change.js') ?>
<?= $this->Html->script('administracion/administracion.js') ?>

<?= $this->element('header')?>
<?= $this->element('sidebar')?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <?= $this->element('panel_header')?>
    <?= $this->Flash->render() ?>

    <section class="content">
        <div class="row">


        <div class="col-xs-7 col-sm-7" style="float: none; margin: 0 auto">
            <div class="box box-success">
                <div class="box-header">
                    <h3 class="box-title" style="color: green;">Tablas utilizadas para los Filtros y Consultas</h3>

                    <?= $this->Html->link($this->Html->tag('span', '', ['class' => 'glyphicon glyphicon-plus', 'aria-hidden' => 'true']),
                        ['controller' => 'Administracion', 'action' => 'addTableFiltro', '?' => ['Accion' => 'Filtro de Rodales', 'Categoria' => 'Administracion']],
                        ['class' => 'btn btn-success pull-right', 'escape' => false]) ?>



                </div>


                <div class="box-body table-responsive">
                    <table id="example1" class="table table-bordered table-hover dataTable">
                        <thead>
                        <tr>
                            <th scope="col"><?= $this->Paginator->sort('N°') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('Nombre de Tabla') ?></th>

                            <th scope="col"><?= __('Acciones') ?></th>

                        </tr>
                        </thead>
                        <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($tabla_filtros as $tabla): ?>
                            <tr>
                                <td style="font-weight: bold;"><?= h($i); $i++ ?></td>
                                <td><?= h($tabla->tabla_name) ?></td>

                                <td align="center" valign="middle">

                                    <?= $this->Html->link($this->Html->tag('span', '', ['class' => 'glyphicon glyphicon-search', 'aria-hidden' => 'true']),
                                        ['controller' => 'Administracion', 'action' => 'viewColumnsFiltros','?' => ['Accion' => 'Filtro de Rodales', 'Categoria' => 'Administracion',
                                            'id' => $tabla->idtablasfiltros, 'table_name' => $tabla->tabla_name]], ['class' => 'btn btn-success', 'escape' => false]) ?>

                                    <?= $this->Html->link($this->Html->tag('span', '', ['class' => 'glyphicon glyphicon-edit', 'aria-hidden' => 'true']),
                                        ['controller' => 'Administracion', 'action' => 'selectColumns','?' => ['Accion' => 'Filtro de Rodales', 'Categoria' => 'Administracion',
                                            'id' => $tabla->idtablasfiltros, 'table_name' => $tabla->tabla_name]], ['class' => 'btn btn-warning', 'escape' => false]) ?>
                                    <?= $this->Form->postLink(__($this->Html->tag('span', '', ['class' => 'glyphicon glyphicon-remove', 'aria-hidden' => 'true'])), ['action' => 'deleteTable', $tabla->idtablasfiltros],
                                        ['confirm' => __('Eliminar la Tabla: {0}?', $tabla->tabla_name), 'class' => 'btn btn-danger', 'escape' => false]) ?>


                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>


                </div>

                <!-- /.box-header -->

            </div> <!--vid box-->


        </div>







        </div>
    </section>
</div>
<?= $this->element('footer')?>
