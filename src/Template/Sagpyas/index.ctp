

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
                  <h3 class="box-title">Lista de Sagpya</h3>
                </div>
                 <!-- /.box-header -->
                <div class="box-body table-responsive">
                    <table id="example2" class="table table-bordered table-hover dataTable">
                        <thead>
                            <tr>
                                 <th scope="col"><?= $this->Paginator->sort('Id') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('Operaciones') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('Fecha') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('Superficie Aprobada') ?></th>
                                 <th scope="col"><?= $this->Paginator->sort('Expediente') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('Turno Mínimo') ?></th>
                                <th scope="col"><?= __('Acciones') ?></th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($sagpyas as $sagpya): ?>
                            <tr>
                                <td><?= h($sagpya->idsagpya) ?></td>
                                <td><?= h($sagpya->operaciones) ?></td>
                                <td><?= h($sagpya->fecha->format('d-m-Y')) ?></td>
                                <td><?= h($sagpya->sup_aprobada) ?></td>
                                 <td><?= h($sagpya->expediente) ?></td>
                                <td><?= h($sagpya->turno_minimo) ?></td>
                                <td align="center" valign="middle">
                                    <?= $this->Html->link(__('Ver'), ['action' => 'view','?' => ['Accion' => 'Ver Sagpya', 'Categoria' => 'Sagpya', 'id' => $sagpya->idsagpya]],
                                        ['class' => 'btn btn-info']) ?>

                                    <?php  if($user_rol == 'admin'): ?>
                                        <?= $this->Html->link(__('Editar'), ['action' => 'edit','?' => ['Accion' => 'Editar Sagpya', 'Categoria' => 'Sagpya', 'id' => $sagpya->idsagpya]],
                                            ['class' => 'btn btn-warning']) ?>
                                        <?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $sagpya->idsagpya],
                                            ['confirm' => __('Eliminar el Sagpya: {0}?', $sagpya->idsagpya), 'class' => 'btn btn-danger']) ?>
                                    <?php endif; ?>


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
        $('#example2').DataTable({
            'language' : {
                'search': "Buscar:",
                'paginate': {
                    'first':      "Primer",
                    'previous':   "Anterior",
                    'next':       "Siguiente",
                    'last':       "Anterior"
                }},
            "pageLength": 50,
            'lengthChange': true,
            'searching'   : true,
            'ordering'    : true,
            'paging'      : true

        });


    })
</script>