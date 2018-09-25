

<?= $this->Html->script('index/index.js') ?>
<?= $this->Html->css('Procedencias/procedencias.css') ?>

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

            <?= $this->Form->create($procedencia) ?>
                <!-- left column -->
                <div class="col-md-6" style="float: none; margin: 0 auto">
                    <!-- Form Element sizes -->
                    <div class="box box-purple">
                        <div class="box-header with-border">
                            <h3 class="box-title">Agregar Procedencias</h3>
                        </div>
                        <div class="box-body">
                            <?= $this->Form->input('nombre', ['class' => 'form-control', 'placeholder' => 'Nombre', 'label' => 'Nombre:', 'required']) ?>
                            <br>
                            <?= $this->Form->input('especie', ['class' => 'form-control', 'placeholder' => 'Especie', 'label' => 'Especie:', 'required']) ?>
                            <br>
                            <?= $this->Form->input('origen', ['class' => 'form-control', 'placeholder' => 'Origen', 'label' => 'Origen:', 'required']) ?>
                            <br>
                            <?= $this->Form->input('mejora', ['class' => 'form-control', 'placeholder' => 'Mejora', 'label' => 'Mejora:', 'required']) ?>
                             <br>
                            <?= $this->Form->input('vivero', ['class' => 'form-control', 'placeholder' => 'Vivero', 'label' => 'Vivero:', 'required']) ?>

                        </div>

                        <div class="box-footer">
                            <?= $this->Form->button('Agregar', ['class' => 'btn btn-purple pull-right']) ?>
                            <?= $this->Html->link('Volver', ['controller' => 'Procedencias', 'action' => 'index', '?' => ['Accion' => 'Ver Procedencias', 'Categoria' => 'Procedencias']],
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