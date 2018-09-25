

<?= $this->Html->script('index/index.js') ?>
<?= $this->Html->script('li_change.js') ?>
<?= $this->Html->css('Procedencias/procedencias.css') ?>


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
            <div class="box  box-purple">
                <div class="box-header">
                  <h3 class="box-title">Lista de Pocedencias</h3>
                </div>
                 <!-- /.box-header -->
                <div class="box-body table-responsive">
                    <table id="example2" class="table table-bordered table-hover dataTable">
                        <thead>
                            <tr>
                                 <th scope="col"><?= $this->Paginator->sort('Id') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('Nombre') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('Especie') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('Origen') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('Mejora') ?></th>
                                 <th scope="col"><?= $this->Paginator->sort('Vivero') ?></th>

                                <th scope="col"><?= __('Acciones') ?></th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($procedencias as $procedencia): ?>
                            <tr>
                                <td><?= h($procedencia->idprocedencias) ?></td>
                                <td style="font-weight: bold;"><?= h($procedencia->nombre) ?></td>
                                <td><?= h($procedencia->especie) ?></td>
                                <td><?= h($procedencia->origen) ?></td>
                                <td><?= h($procedencia->mejora) ?></td>
                                 <td><?= h($procedencia->vivero) ?></td>

                                <td align="center" valign="middle">

                                    <?= $this->Html->link(__('Editar'), ['action' => 'edit','?' => ['Accion' => 'Editar Procedencias', 'Categoria' => 'Procedencias', 'id' => $procedencia->idprocedencias]],
                                    ['class' => 'btn btn-warning']) ?>

                                    <?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $procedencia->idprocedencias],
                                    ['confirm' => __('Eliminar la Procedencia: {0}?', $procedencia->idprocedencias), 'class' => 'btn btn-danger']) ?>
                                </td>
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


<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>