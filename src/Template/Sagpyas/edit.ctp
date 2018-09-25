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

                <?= $this->Form->create($sagpya, ['id' => 'myform']) ?>
                <!-- left column -->
                <div class="col-md-6" style="float: none; margin: 0 auto">
                    <!-- Form Element sizes -->
                    <div class="box box-warning">
                        <div class="box-header with-border">
                            <h3 class="box-title">Editar Sagpya</h3>
                        </div>
                        <div class="box-body">
                            <?= $this->Form->input('operaciones', ['class' => 'form-control', 'placeholder' => 'Operaciones', 'label' => false, 'required']) ?>
                            <br>
                            <?= $this->Form->input('fecha', ['class' => 'form-control', 'placeholder' => 'Fecha: YYYY-MM-DD', 'label' => false, 'required']) ?>
                            <br>
                            <?= $this->Form->input('sup_aprobada', ['class' => 'form-control', 'placeholder' => 'Superficie Aprobada', 'label' => false, 'required']) ?>
                            <br>
                            <?= $this->Form->input('expediente', ['class' => 'form-control', 'placeholder' => 'Expediente', 'label' => false, 'required']) ?>
                            <br>
                            <?= $this->Form->input('turno_minimo', ['class' => 'form-control', 'placeholder' => 'Turno Minimo', 'label' => false, 'required']) ?>

                        </div>

                        <div class="box-footer">
                            <?= $this->Form->button('Editar', ['class' => 'btn btn-warning pull-right']) ?>
                            <?= $this->Html->link('Volver', ['controller' => 'Sagpyas', 'action' => 'index', '?' => ['Accion' => 'Ver Sagpya', 'Categoria' => 'Sagpya']],
                                ['class' => 'btn btn-default pull-left'], ['escape' => false]) ?>

                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>

                <?= $this->Form->end() ?>
            </div>
        </section>


    </div>

<?= $this->element('footer')?>