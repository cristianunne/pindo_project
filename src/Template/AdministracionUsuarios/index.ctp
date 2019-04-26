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

            <div class="col-xs-12 col-sm-12">
                <div class="box box-success">
                    <div class="box-header">
                        <h3 class="box-title" style="color: green;">Lista de Usuarios</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <table id="example1" class="table table-bordered table-hover dataTable">
                            <thead>
                            <tr>
                                <th scope="col"><?= $this->Paginator->sort('ID°') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('Email') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('Apellido') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('Nombres') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('Rol') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('Activo') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('Creado') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('Modificado') ?></th>
                                <th scope="col"><?= __('Acciones') ?></th>

                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($tablaUsers as $users): ?>
                                <tr>
                                    <td style="font-weight: bold;"><?= h($users->id) ?></td>
                                    <td><?= h($users->email) ?></td>
                                    <td><?= h($users->firstname) ?></td>
                                    <td><?= h($users->lastname) ?></td>
                                    <td><?= h($users->role) ?></td>
                                    <td style="vertical-align: middle; text-align: center;">
                                        <?php  if($users->active == false){
                                            echo '<p style="color: #ff0000;">No</p>';
                                        } else {
                                            echo '<p style="color: #15991f;">Si</p>';
                                        }?>
                                    </td>
                                    <td><?= h($users->created) ?></td>
                                    <td><?= h($users->modified) ?></td>


                                    <td align="center" valign="middle">

                                        <?= $this->Html->link($this->Html->tag('span', '', ['class' => 'glyphicon glyphicon-edit', 'aria-hidden' => 'true']),
                                            ['controller' => 'AdministracionUsuarios', 'action' => 'edit', '?' =>
                                                ['Accion' => 'Editar', 'Categoria' => 'AdministracionUsuarios', 'id' => $users->id]],
                                            ['class' => 'btn btn-warning', 'escape' => false]) ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>


                    </div>

                </div> <!--vid box-->


            </div>
        </div>
    </section>
</div>

<?= $this->element('footer')?>

<script>
    $(function () {
        $('#example1').DataTable({
            'language' : {
                'search': "Buscar:",

                'paginate': {
                    'first':      "Primer",
                    'previous':   "Anterior",
                    'next':       "Siguiente",
                    'last':       "Anterior"
                }}

        });

    })
</script>
