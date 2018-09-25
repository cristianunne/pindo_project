

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
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                  <h3 class="box-title" style="color: green;">Lista de EMSEFOR (Empresas de Servicios Forestales)</h3>
                </div>
                 <!-- /.box-header -->
                <div class="box-body table-responsive">
                    <table id="example2" class="table table-bordered table-hover dataTable">
                        <thead>
                            <tr>
                                <th scope="col"><?= $this->Paginator->sort('nombre') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('contratista') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('domicilio') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('telefono') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                                <th scope="col"><?= __('Acciones') ?></th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($emsefor as $emp): ?>
                            <tr>
                                <td style="font-weight: bold;"><?= h($emp->nombre) ?></td>
                                <td><?= h($emp->contratista) ?></td>
                                <td><?= h($emp->domicilio) ?></td>
                                <td><?= h($emp->telefono) ?></td>
                                <td><?= h($emp->email) ?></td>
                                <td align="center" valign="middle">

                                    <?= $this->Html->link(__('Editar'), ['action' => 'edit','?' => ['Accion' => 'Editar Emsefor', 'Categoria' => 'Emsefor', 'id' => $emp->idemsefor]],
                                    ['class' => 'btn btn-warning']) ?>

                                     <?= $this->Html->link(__('Ver'), ['action' => 'view','?' => ['Accion' => 'Ver Emsefor', 'Categoria' => 'Emsefor', 'id_ems' => $emp->idemsefor]],
                                    ['class' => 'btn btn-info']) ?>

                                    <?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $emp->idemsefor],
                                    ['confirm' => __('Eliminar la Emsefor: {0}?', $emp->nombre), 'class' => 'btn btn-danger']) ?>
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