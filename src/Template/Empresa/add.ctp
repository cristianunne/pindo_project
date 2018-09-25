

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

            <?= $this->Form->create() ?>
                <!-- left column -->
                <div class="col-md-6" style="float: none; margin: 0 auto">
                    <!-- Form Element sizes -->
                    <div class="box box-success">
                        <div class="box-header with-border">
                            <h3 class="box-title">Agregar Empresa</h3>
                        </div>
                        <div class="box-body">
                            <?= $this->Form->input('nombre', ['value' => '', 'class' => 'form-control', 'placeholder' => 'Nombre', 'label' => 'Nombre:', 'required']) ?>
                            <br>
                            <?= $this->Form->input('domicilio', ['value' => '', 'class' => 'form-control', 'placeholder' => 'Domicilio', 'label' => 'Domicilio:', 'required']) ?>
                            <br>
                            <?= $this->Form->input('telefono', ['value' => '', 'class' => 'form-control', 'placeholder' => 'Telefono', 'label' => 'Telefono:', 'required']) ?>
                            <br>
                            <?= $this->Form->input('email', ['value' => '', 'class' => 'form-control', 'placeholder' => 'Email', 'label' => 'Email:', 'required']) ?>

                        </div>

                        <div class="box-footer">
                            <?= $this->Form->button('Agregar', ['class' => 'btn btn-success pull-right']) ?>
                            <?= $this->Html->link('Volver', ['controller' => 'Empresa', 'action' => 'index', '?' => ['Accion' => 'Ver Empresas', 'Categoria' => 'Empresa']],
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