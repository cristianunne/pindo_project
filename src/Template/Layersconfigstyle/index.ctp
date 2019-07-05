<?= $this->Html->script('index/index.js') ?>
<?= $this->Html->script('li_change.js') ?>


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
                        <h3 class="box-title" style="color: green;">Configuración de los Layers que se muestran en los Mapas</h3>

                        <?= $this->Html->link($this->Html->tag('span', '', ['class' => 'glyphicon glyphicon-plus', 'aria-hidden' => 'true']),
                            ['controller' => 'Layersconfigstyle', 'action' => 'add', '?' => ['Accion' => '>', 'Categoria' => 'Mapa']],
                            ['class' => 'btn btn-success pull-right', 'escape' => false]) ?>



                    </div>


                    <div class="box-body table-responsive">
                        <table id="example1" class="table table-bordered table-hover dataTable">
                            <thead>
                            <tr>
                                <th scope="col"><?= $this->Paginator->sort('N°') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('Nombre') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('Variable de Clasificación') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('Paleta de colores') ?></th>
                                <th scope="col"><?= __('Acciones') ?></th>

                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($layersconfig as $tabla): ?>
                                <tr>
                                    <td style="font-weight: bold;"><?= h($i); $i++ ?></td>
                                    <td><?= h($tabla->nombre) ?></td>
                                    <td><?= h($tabla->campo_clasified) ?></td>
                                    <td><?= h($tabla->paleta) ?></td>
                                    <td align="center" valign="middle">


                                        <?= $this->Html->link($this->Html->tag('span', '', ['class' => 'glyphicon glyphicon-edit', 'aria-hidden' => 'true']),
                                            ['controller' => 'Layersconfigstyle', 'action' => 'edit','?' => ['Accion' => 'Editar conf. de Layers', 'Categoria' => 'Mapa',
                                                'id' => $tabla->id]], ['class' => 'btn btn-warning', 'escape' => false]) ?>

                                        <?= $this->Form->postLink(__($this->Html->tag('span', '', ['class' => 'glyphicon glyphicon-remove', 'aria-hidden' => 'true'])), ['action' => 'delete', $tabla->id],
                                            ['confirm' => __('Eliminar la Configuración: {0}?', $tabla->seccion), 'class' => 'btn btn-danger', 'escape' => false]) ?>


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
