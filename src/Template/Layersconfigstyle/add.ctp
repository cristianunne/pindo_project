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
            <?= $this->Form->create('layersconfig') ?>
            <!-- left column -->
            <div class="col-md-6" style="float: none; margin: 0 auto">
                <!-- Form Element sizes -->
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Agregar Configuración de Layers</h3>
                    </div>
                    <div class="box-body">

                        <?= $this->Form->input('nombre', ['value' => '', 'class' => 'form-control', 'placeholder' => 'Nombre', 'label' => 'Nombre:', 'required']) ?>
                        <br>


                        <?= $this->Form->input('paleta', ['options' => $paleta, 'empty' => '(Elija una opción)',
                            'class' => 'form-control', 'placeholder' => 'Paleta', 'label' => 'Paleta:', 'required']) ?>
                        <br>

                        <?= $this->Form->input('campo_clasified', ['options' => $var_class, 'empty' => '(Elija una opción)',
                            'class' => 'form-control', 'placeholder' => 'Variable', 'required']) ?>
                        <br>


                    </div>

                    <div class="box-footer">
                        <?= $this->Form->button('Agregar', ['class' => 'btn btn-success pull-right']) ?>
                        <?= $this->Html->link('Volver', ['controller' => 'Layersconfigstyle', 'action' => 'index', '?' => ['Accion' => 'Ver Rodales', 'Categoria' => 'Rodales']],
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

