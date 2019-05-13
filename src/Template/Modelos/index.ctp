
<?= $this->Html->css('Rodales/rodales.css') ?>
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
                        <h3 class="box-title" style="color: green;">Lista de Modelos</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <table id="example2" class="table table-bordered table-hover dataTable">
                            <thead>
                            <tr>
                                <th scope="col"><?= $this->Paginator->sort('Modelo N°') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('Cosecha') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('Tipo de Máquina') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('Modelo') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('Operación') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('Tarea') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('Ecuación') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('Estado') ?></th>
                                <?php  if($user_rol == 'admin'): ?>
                                    <th scope="col"><?= __('Acciones') ?></th>
                                <?php endif; ?>

                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($modelos as $model): ?>
                                <tr>
                                    <td style="font-weight: bold;"><?= h($model->idmodelos) ?></td>
                                    <td><?= h($model->cosecha) ?></td>
                                    <td><?= h($model->tipo_maquina) ?></td>
                                    <td><?= h($model->modelo) ?></td>
                                    <td><?= h($model->operacion) ?></td>
                                    <td><?= h($model->tarea) ?></td>
                                    <td><?= h($model->modelo_algoritmo) ?></td>
                                    <td>
                                        <?php  if($model->estado == false){

                                            echo 'False';
                                        } else {

                                            echo 'Verdadero';
                                        }?>
                                    </td>

                                    <td align="center" valign="middle">

                                        <?php  if($user_rol == 'admin'): ?>

                                            <?= $this->Form->postLink(__($this->Html->tag('span', '', ['class' => 'glyphicon glyphicon-remove', 'aria-hidden' => 'true'])), ['action' => 'delete', $model->idmodelos],
                                                ['confirm' => __('Eliminar el Modelo: {0}?', $model->idmodelos), 'class' => 'btn btn-danger','escape' => false]) ?>

                                            <?= $this->Html->link($this->Html->tag('span', '', ['class' => 'glyphicon glyphicon-edit', 'aria-hidden' => 'true']),
                                                ['controller' => 'Modelos', 'action' => 'edit','?' => ['Accion' => 'Editar SIMNEA', 'Categoria' => 'SIMNEA', 'id' => $model->idmodelos]], ['class' => 'btn btn-warning', 'escape' => false]) ?>

                                        <?php endif; ?>
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
        $('#example2').DataTable({
            'language' : {
                'search': "Buscar:",
                'paginate': {
                    'first':      "Primer",
                    'previous':   "Anterior",
                    'next':       "Siguiente",
                    'last':       "Anterior"
                }},
            "pageLength": 40,
            'lengthChange': true,
            'searching'   : true,
            'ordering'    : true

        });


    })
</script>