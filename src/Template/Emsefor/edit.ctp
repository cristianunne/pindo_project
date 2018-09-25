
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

            <?= $this->Form->create($emsefor, ['id' => 'myform']) ?>
                <!-- left column -->
                <div class="col-md-6" style="float: none; margin: 0 auto">
                    <!-- Form Element sizes -->
                    <div class="box box-success">
                        <div class="box-header with-border">
                            <h3 class="box-title">Editar Emsefor </h3>
                        </div>
                        <div class="box-body">
                             <?= $this->Form->input('nombre', ['class' => 'form-control', 'placeholder' => 'Nombre', 'label' => false, 'required']) ?>
                            <br>
                            <?= $this->Form->input('contratista', ['class' => 'form-control', 'placeholder' => 'Contratista', 'label' => false, 'required']) ?>
                            <br>
                            <?= $this->Form->input('domicilio', ['class' => 'form-control', 'placeholder' => 'Domicilio', 'label' => false, 'required']) ?>
                            <br>
                            <?= $this->Form->input('telefono', ['class' => 'form-control', 'placeholder' => 'Telefono', 'label' => false, 'required']) ?>
                            <br>
                            <?= $this->Form->input('email', ['class' => 'form-control', 'placeholder' => 'Email', 'label' => false, 'required']) ?>
                            <br>
                            <?= $this->Form->input('cuit', ['class' => 'form-control', 'placeholder' => 'CUIT', 'label' => false, 'required']) ?>

                        </div>

                        <div class="box-footer">
                            <?= $this->Form->button('Editar', ['class' => 'btn btn-success pull-right']) ?>
                            <?= $this->Html->link('Volver', ['controller' => 'Emsefor', 'action' => 'index', '?' => ['Accion' => 'Ver Emsefor', 'Categoria' => 'Emsefor']],
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