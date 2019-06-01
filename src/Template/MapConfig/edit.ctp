<?= $this->Html->script('index/index.js') ?>


<?= $this->element('header')?>
<?= $this->element('sidebar')?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <?= $this->element('panel_header')?>
    <?= $this->Flash->render() ?>

    <section class="content">


        <div class="row">

            <?= $this->Form->create($mapconfig, ['id' => 'myform']) ?>
            <!-- left column -->
            <div class="col-md-6" style="float: none; margin: 0 auto">
                <!-- Form Element sizes -->
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Agregar/Editar datos del Mapa</h3>
                    </div>
                    <div class="box-body">
                        <?= $this->Form->input('crs', ['class' => 'form-control', 'placeholder' => 'CRS', 'label' => 'CRS:', 'required']) ?>
                        <br>
                        <?= $this->Form->input('center', ['class' => 'form-control', 'placeholder' => 'Center', 'label' => 'Center:', 'required']) ?>
                        <br>
                        <?= $this->Form->input('zoom', ['class' => 'form-control', 'placeholder' => 'Zoom', 'label' => 'Zoom:', 'required']) ?>
                        <br>
                        <?= $this->Form->input('minzoom', ['class' => 'form-control', 'placeholder' => 'MinZoom', 'label' => 'MinZoom:', 'required']) ?>
                        <br>
                        <?= $this->Form->input('maxzoom', ['class' => 'form-control', 'placeholder' => 'MaxZoom', 'label' => 'MaxZoom:']) ?>
                        <br>
                        <?= $this->Form->input('renderer', ['class' => 'form-control', 'placeholder' => 'Renderer', 'label' => 'Renderer:']) ?>

                    </div>

                    <div class="box-footer">
                        <?= $this->Form->button('Editar', ['class' => 'btn btn-success pull-right']) ?>
                        <?= $this->Html->link('Volver', ['controller' => 'MapConfig', 'action' => 'index', '?' => ['Accion' => 'Ver Configuraciones de Mapa', 'Categoria' => 'Mapa']],
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