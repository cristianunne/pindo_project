<?= $this->Html->script('index/index.js') ?>


<?= $this->element('header')?>
<?= $this->element('sidebar')?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <?= $this->element('panel_header')?>
    <?= $this->Flash->render() ?>
    <section class="content">
        <div class="row">
            <div class="col-md-3" style="float: none;margin: 0 auto;">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Capa Base Default</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <?php if ($cantidad[0]->count < 1): ?>
                            <?= $this->Html->link(__($this->Html->tag('span', '', ['class' => 'glyphicon glyphicon-plus', 'aria-hidden' => 'true'])), ['action' => 'add','?' =>
                                ['Accion' => 'Agregar Capabase Default', 'Categoria' => 'CapasBase']],
                                ['class' => 'btn btn-block btn-success', 'escape' => false]) ?>
                        <?php else: ?>

                        <table id="example2" class="table table-bordered table-hover dataTable">
                            <thead>
                            <tr>
                                <th scope="col"><?= $this->Paginator->sort('Capa Base') ?></th>
                                <th scope="col"><?= __('Acciones') ?></th>

                            </tr>
                            </thead>
                            <tbody>

                                    <?php foreach ($capasbasedef as $cat): ?>
                                        <tr>
                                            <td style="vertical-align: middle"><?= h($cat->capasbase->nombre) ?></td>

                                            <td align="center" valign="middle">

                                                <?= $this->Html->link(__($this->Html->tag('span', '', ['class' => 'glyphicon glyphicon-edit', 'aria-hidden' => 'true'])), ['action' => 'edit','?' =>
                                                    ['Accion' => 'Editar Capa Base Default', 'Categoria' => 'CapasBase', 'id' => $cat->idcapabasedefault]],
                                                    ['class' => 'btn btn-warning', 'escape' => false]) ?>

                                                <?= $this->Form->postLink(__($this->Html->tag('span', '', ['class' => 'glyphicon glyphicon-remove', 'aria-hidden' => 'true'])),
                                                    ['action' => 'delete', '?' =>
                                                        ['Accion' => 'Editar Capa Base Default', 'Categoria' => 'CapasBase', 'id' => $cat->idcapabasedefault]],
                                                    ['confirm' => __('Eliminar la Capa Base Default: {0}?', $cat->capasbase->nombre), 'class' => 'btn btn-danger', 'escape' => false]) ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>


                                <?php endif; ?>



                            </tbody>
                        </table>


                    </div>

                </div>
            </div>

        </div>
    </section>
</div>
<?= $this->element('footer')?>