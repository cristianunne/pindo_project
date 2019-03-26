<?= $this->Html->script('index/index.js') ?>
<?= $this->Html->script('li_change.js') ?>
<?= $this->Html->script('administracion/administracion.js') ?>

<?= $this->element('header')?>
<?= $this->element('sidebar')?>

    <div class="content-wrapper">
        <?= $this->element('panel_header')?>
        <?= $this->Flash->render() ?>
        <section class="content">
            <div class="row">


                <div class="col-xs-4 col-sm-4" style="float: none; margin: 0 auto">
                    <div class="box box-success">
                        <div class="box-header">
                            <h3 class="box-title" style="color: green;">Seleccione las Columnas para los Filtros y Consultas</h3>

                        </div>

                        <div class="box-body table-responsive">

                            <table id="example1" class="table table-bordered table-hover dataTable">
                                <thead>
                                <tr>
                                    <th scope="col"><?= $this->Paginator->sort('Columna') ?></th>
                                    <th scope="col"><?= $this->Paginator->sort('Descripción') ?></th>
                                    <th scope="col"><?= __('') ?></th>

                                </tr>
                                </thead>
                                <tbody>
                                <?php  foreach ($tabla_columns_filtros as $col): ?>

                                    <tr>
                                        <td style="font-weight: bold; text-align: left;"><?= h($col->name_column) ?></td>
                                        <?php if(!empty($col->descripcion)): ?>
                                            <td style="text-align: left;"><?= h($col->descripcion) ?></td>
                                        <?php else: ?>
                                            <td style="text-align: left;"><?= h("") ?></td>
                                        <?php endif; ?>
                                        <td align="center" valign="middle">

                                            <?= $this->Html->link($this->Html->tag('span', '', ['class' => 'glyphicon glyphicon-edit', 'aria-hidden' => 'true']),
                                                ['controller' => 'Administracion', 'action' => 'editColumnFiltro','?' => ['Accion' => 'Filtro de Rodales', 'Categoria' => 'Administracion',
                                                    'id' => $col->id_columns_filtro, 'id_table' => $id_table, 'table_name' => $table_name]], ['class' => 'btn btn-warning', 'escape' => false]) ?>

                                            <?= $this->Html->link($this->Html->tag('span', '', ['class' => 'glyphicon glyphicon-remove', 'aria-hidden' => 'true']),
                                                ['controller' => 'Administracion', 'action' => 'deleteColumnFiltro','?' => ['Accion' => 'Filtro de Rodales', 'Categoria' => 'Administracion',
                                                    'id' => $col->id_columns_filtro, 'id_table' => $id_table]], ['class' => 'btn btn-danger', 'escape' => false]) ?>

                                        </td>
                                    </tr>
                                <?php endforeach; ; ?>
                                </tbody>
                            </table>


                        </div>

                        <div class="box-footer">
                            <?= $this->Html->link('Volver', ['controller' => 'Administracion', 'action' => 'config', '?' => ['Accion' => 'Filtro de Rodales', 'Categoria' => 'Administracion']],
                                ['class' => 'btn btn-default pull-left'], ['escape' => false]) ?>

                        </div>

                        <!-- /.box-header -->

                    </div> <!--vid box-->


                </div>







            </div>
        </section>
    </div>
<?= $this->element('footer')?>