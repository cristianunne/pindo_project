
<?= $this->Html->script('index/index.js') ?>


<?= $this->element('header')?>
<?= $this->element('sidebar')?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">


      <?= $this->element('panel_header')?>
      <?= $this->Flash->render() ?>

       <!-- Main content -->
    <section class="content">
         <div class="row">

            <?= $this->Form->create($empresa, ['id' => 'myform']) ?>
                <!-- left column -->
                <div class="col-md-6" style="float: none; margin: 0 auto">
                    <!-- Form Element sizes -->
                    <div class="box box-success">
                        <div class="box-header with-border">
                            <h3 class="box-title">Editar Empresa </h3>
                        </div>
                        <div class="box-body">
                            <?= $this->Form->input('nombre', ['class' => 'form-control', 'placeholder' => 'Nombre', 'label' => false, 'required']) ?>
                            <br>
                            <?= $this->Form->input('domicilio', ['class' => 'form-control', 'placeholder' => 'Domicilio', 'label' => false, 'required']) ?>
                            <br>
                            <?= $this->Form->input('telefono', ['class' => 'form-control', 'placeholder' => 'Telefono', 'label' => false, 'required']) ?>
                            <br>
                            <?= $this->Form->input('email', ['class' => 'form-control', 'placeholder' => 'Email', 'label' => false, 'required']) ?>

                        </div>

                        <div class="box-footer">
                            <?= $this->Form->button('Editar', ['class' => 'btn btn-success pull-right']) ?>
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