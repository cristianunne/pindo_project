<?= $this->Html->script('index/index.js') ?>
<?= $this->Html->script('li_change.js') ?>
<?= $this->Html->script('administracion/administracion.js') ?>

<?= $this->element('header')?>
<?= $this->element('sidebar')?>

    <div class="content-wrapper">
        <?= $this->element('panel_header')?>
        <?= $this->Flash->render() ?>
        <section class="content">
            <div class="row">


                <div class="col-xs-3 col-sm-3" style="float: none; margin: 0 auto">
                    <div class="box box-success">
                        <div class="box-header">
                            <h3 class="box-title" style="color: green;">Descripción de Columna</h3>

                        </div>


                        <?= $this->Form->create($tabla_col_filtro) ?>
                        <div class="box-body">
                            <?= $this->Form->input('name_column', ['class' => 'form-control', 'placeholder' => 'Nombre', 'label' => false, 'disabled' => true]) ?>
                            <?= $this->Form->input('descripcion', ['class' => 'form-control', 'placeholder' => 'Descripcion', 'label' => false]) ?>


                        </div>

                        <div class="box-footer">
                            <?= $this->Form->button('Aceptar', ['class' => 'btn btn-success pull-right']) ?>
                            <?= $this->Html->link('Volver', ['controller' => 'Administracion', 'action' => 'viewColumnsFiltros', '?' =>
                                ['Accion' => 'Filtro de Rodales', 'Categoria' => 'Administracion', 'id' => $id_table, 'table_name' => $table_name]],
                                ['class' => 'btn btn-default pull-left'], ['escape' => false]) ?>

                        </div>
                        <?= $this->Form->end() ?>

                        <!-- /.box-header -->

                    </div> <!--vid box-->


                </div>


            </div>
        </section>
    </div>
<?= $this->element('footer')?>