<?= $this->Html->css('Empresas/empresas.css') ?>
 <?= $this->Html->css('Rodales/rodales.css') ?>
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

            <div class="col-md-12">
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-ban"></i> Advertencia!</h4>
                        Se debe asignar las maquinas según la cantidad que posee la Emsefor.

                </div>

                    <!--Creo una tabla con todos las maquinas disponibles-->
                <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Lista de Maquinas</h3>
                </div>
                 <!-- /.box-header -->
                <div class="box-body table-responsive">
                    <table id="example2" class="table table-bordered table-hover dataTable">
                        <thead>
                            <tr>
                                <th scope="col"><?= $this->Paginator->sort('Id') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('Marca') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('Modelo') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('Imagen') ?></th>
                                <th scope="col"><?= __('Acciones') ?></th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($maquinas as $emp): ?>
                            <tr>
                                <td style="font-weight: bold; vertical-align: middle;"><?= h($emp->idmaquinas) ?></td>
                                <td style="vertical-align: middle;"><?= h($emp->marca) ?></td>
                                <td style="vertical-align: middle;"><?= h($emp->modelo) ?></td>
                                <td style="vertical-align: middle;">
                                    <?php echo $this->Html->image('../'. $emp->photo_dir . '/' . $emp->photo, ['class' => 'img-responsive img-rounded center-img ']) ?>

                                </td>
                                <td align="center" style="vertical-align: middle;">

                                    <?= $this->Html->link(__('Asignar'), ['action' => 'add','?' => ['Accion' => 'Editar Empresas', 'Categoria' => 'Empresa', 'id_ems' => $id_ems, 'id_maq' => $emp->idmaquinas]],
                                    ['class' => 'btn btn-success']) ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>


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