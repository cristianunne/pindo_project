<?= $this->Html->script('index/index.js') ?>
<?= $this->Html->script('li_change.js') ?>
<?= $this->Html->script('administracion/administracion.js') ?>

<?= $this->element('header')?>
<?= $this->element('sidebar')?>

<div class="content-wrapper">
    <?= $this->element('panel_header')?>

    <section class="content">
        <div class="row">


            <div class="col-xs-7 col-sm-7" style="float: none; margin: 0 auto">
                <div class="box box-success">
                    <div class="box-header">
                        <h3 class="box-title" style="color: green;">Seleccione una Tablas para los Filtros y Consultas</h3>

                    </div>


                    <?= $this->Form->create('modelTablaFiltro') ?>
                    <div class="box-body ">


                        <?= $this->Form->input('tabla_name', ['options' => $tables, 'empty' => '(Elija una Tabla)', 'type' => 'select',
                            'class' => 'form-control', 'placeholder' => 'Tablas', 'label' => 'Tablas:', 'required']) ?>



                    </div>

                    <div class="box-footer">
                        <?= $this->Form->button('Agregar', ['class' => 'btn btn-success pull-right']) ?>
                        <?= $this->Html->link('Volver', ['controller' => 'Administracion', 'action' => 'config', '?' => ['Accion' => 'Filtro de Rodales', 'Categoria' => 'Administracion']],
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

