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
            <div class="col-md-3" style="float: none;margin: 0 auto;">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Lista de Categorias de Operarios</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <table id="example2" class="table table-bordered table-hover dataTable">
                            <thead>
                            <tr>
                                <th scope="col"><?= $this->Paginator->sort('Categoría') ?></th>
                                <th scope="col"><?= __('Acciones') ?></th>

                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($categorias_ as $cat): ?>
                                <tr>
                                    <td><?= h($cat->categoria) ?></td>
                                    <?php  if($user_rol == 'admin'): ?>

                                        <td align="center" valign="middle">

                                            <?= $this->Html->link(__('Editar'), ['action' => 'edit','?' => ['Accion' => 'Editar Categorías', 'Categoria' => 'Categorias', 'id' => $cat->idcat_operarios]],
                                                ['class' => 'btn btn-warning']) ?>

                                            <?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $cat->idcat_operarios],
                                                ['confirm' => __('Eliminar la Categoría: {0}?', $cat->categoria), 'class' => 'btn btn-danger']) ?>

                                        </td>
                                    <?php endif; ?>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>


                    </div>

                </div>
            </div>
        </div>
    </section>

</div>
<?= $this->element('footer')?>
