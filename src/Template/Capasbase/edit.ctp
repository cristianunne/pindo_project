<?= $this->Html->script('index/index.js') ?>


<?= $this->element('header')?>
<?= $this->element('sidebar')?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <?= $this->element('panel_header')?>
        <?= $this->Flash->render() ?>

        <section class="content">

            <div class="row">

                <?= $this->Form->create($capasbase) ?>
                <!-- left column -->
                <div class="col-md-6" style="float: none; margin: 0 auto">
                    <!-- Form Element sizes -->
                    <div class="box box-success">
                        <div class="box-header with-border">
                            <h3 class="box-title">Agregar Capa Base</h3>
                        </div>
                        <div class="box-body">
                            <?= $this->Form->input('nombre', ['class' => 'form-control', 'placeholder' => 'Nombre', 'label' => 'Nombre:', 'required']) ?>
                            <br>
                            <?= $this->Form->input('urlservice', ['class' => 'form-control', 'placeholder' => 'Url de Servicio', 'label' => 'Url de Servicio:', 'required']) ?>
                            <br>
                            <?= $this->Form->input('attribution', ['class' => 'form-control', 'placeholder' => 'Atribuciones', 'label' => 'Atribuciones:', 'required']) ?>
                            <br>
                            <?= $this->Form->input('subdomain', ['class' => 'form-control', 'placeholder' => 'Subdomain', 'label' => 'Subdomain:']) ?>
                            <br>
                            <?= $this->Form->input('minzoom', ['class' => 'form-control', 'placeholder' => 'MinZoom', 'label' => 'MinZoom:']) ?>
                            <br>
                            <?= $this->Form->input('maxzoom', ['class' => 'form-control', 'placeholder' => 'MaxZoom', 'label' => 'MaxZoom:']) ?>
                            <br>
                            <?= $this->Form->input('format', ['class' => 'form-control', 'placeholder' => 'Formato', 'label' => 'Formato:']) ?>
                            <br>
                            <?= $this->Form->input('tilematrixset', ['class' => 'form-control', 'placeholder' => 'TileMatrixSet', 'label' => 'TileMatrixSet:']) ?>
                            <br>
                            <?= $this->Form->input('opacity', ['type' => 'number', 'step' => '0.1', 'class' => 'form-control', 'placeholder' => 'Opacidad', 'label' => 'Opacidad:']) ?>
                            <br>
                            <td class="row-label" style="vertical-align: middle; text-align: right;" > <label for="active">Activo?:</label></td>
                            <?= $this->Form->checkbox('active', ['label' => 'Activo?:']) ?>

                        </div>

                        <div class="box-footer">
                            <?= $this->Form->button('Editar', ['class' => 'btn btn-success pull-right']) ?>
                            <?= $this->Html->link('Volver', ['controller' => 'Capasbase', 'action' => 'index', '?' => ['Accion' => 'Ver Capas Base', 'Categoria' => 'CapasBase']],
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