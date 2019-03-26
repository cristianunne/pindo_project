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


                <div class="col-xs-3 col-sm-3" style="float: none; margin: 0 auto">
                    <div class="box box-success">
                        <div class="box-header">
                            <h3 class="box-title" style="color: green;">Seleccione las Columnas para los Filtros y Consultas</h3>

                        </div>


                        <?= $this->Form->create('modelTablaFiltro') ?>
                        <div class="box-body table-responsive">

                            <table id="example1" class="table table-bordered table-hover dataTable">
                                <thead>
                                <tr>
                                    <th scope="col"><?= $this->Paginator->sort('Columna') ?></th>
                                    <th scope="col"><?= __('') ?></th>

                                </tr>
                                </thead>
                                <tbody>
                                <?php  foreach ($options as $op): ?>

                                    <tr>
                                        <td style="font-weight: bold; text-align: left;"><?= h($op) ?></td>

                                        <td style="text-align: center;" id="<?= h("columna_".$op) ?>"> <?= $this->Form->checkbox($op, ['value' => $op,'label' => false, 'id' => 'ems_check']) ?> </td>

                                    </tr>


                                <?php endforeach; ; ?>

                                </tbody>
                            </table>





                        </div>

                        <div class="box-footer">
                            <?= $this->Form->button('Agregar', ['class' => 'btn btn-success pull-right']) ?>
                            <?= $this->Html->link('Volver', ['controller' => 'Administracion', 'action' => 'config', '?' => ['Accion' => 'Filtro de Rodales', 'Categoria' => 'Administracion']],
                                ['class' => 'btn btn-default pull-left'], ['escape' => false]) ?>

                        </div>
                        <?= $this->Form->end() ?>

                        <!-- /.box-header -->

                    </div> <!--vid box-->


                </div>







            </div>
        </section>
    </div>
<?= $this->element('footer')?>