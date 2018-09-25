<?= $this->Html->script('index/index.js') ?>
<?= $this->Html->script('li_change.js') ?>


<?= $this->element('header')?>
<?= $this->element('sidebar')?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
      <?= $this->element('panel_header')?>

      <!-- Main content -->
    <section class="content">

        <div class="row">

            <?= $this->Form->create($maquina, ['type' => 'file']) ?>
                <!-- left column -->
                <div class="col-md-6" style="float: none; margin: 0 auto">
                    <!-- Form Element sizes -->
                    <div class="box box-success">
                        <div class="box-header with-border">
                            <h3 class="box-title">Agregar Maquina</h3>
                        </div>
                        <div class="box-body">
                            <?= $this->Form->input('marca', ['class' => 'form-control', 'placeholder' => 'Marca', 'label' => false, 'required']) ?>
                            <br>
                            <?= $this->Form->input('modelo', ['class' => 'form-control', 'placeholder' => 'Modelo', 'label' => false, 'required']) ?>
                            <br>
                            <?= $this->Form->input('photo', ['type' => 'file', 'class' => 'form-control', 'placeholder' => 'Foto', 'label' => false, 'required']) ?>
                            <br>

                        </div>

                        <div class="box-footer">
                            <?= $this->Form->button('Agregar', ['class' => 'btn btn-success pull-right']) ?>
                            <?= $this->Html->link('Volver', ['controller' => 'Maquinas', 'action' => 'index', '?' => ['Accion' => 'Ver Maquinas', 'Categoria' => 'Maquinas']],
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