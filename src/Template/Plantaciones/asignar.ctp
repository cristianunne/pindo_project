<?= $this->Html->css('Empresas/empresas.css') ?>
 <?= $this->Html->css('Rodales/rodales.css') ?>
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

            <div class="col-md-12">
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-ban"></i> Advertencia!</h4>
                    Para ASIGNAR la plantación al Rodal debe tener cargado: Rodales, Procedecias y Emsefor.

                </div>

                <?= $this->Form->create($plantacione) ?>
                    <!-- left column -->
                    <div class="col-md-6" style="float: none; margin: 0 auto">
                        <!-- Form Element sizes -->
                        <div class="box box-success">
                            <div class="box-header with-border">
                                <h3 class="box-title">Asignar Plantación a Rodal</h3>
                            </div>
                            <div class="box-body">
                                <?= $this->Form->input('fecha', ['class' => 'form-control', 'placeholder' => 'Fecha:', 'label' => 'Fecha:', 'required']) ?>
                                <br>
                                <?= $this->Form->input('superficie', ['value' => '', 'class' => 'form-control', 'placeholder' => 'Superficie', 'label' => 'Superficie:', 'required']) ?>
                                <br>
                                 <!-- Deberia ser una lista de opciones-->
                                <?= $this->Form->input('densidad', ['value' => '', 'class' => 'form-control', 'placeholder' => 'Densidad', 'label' => 'Densidad:', 'required']) ?>
                                <br>

                                <?= $this->Form->input('num_arbol_plantado', ['value' => '', 'class' => 'form-control', 'placeholder' => 'N° de Arboles Plantados', 'label' => 'N° de Arboles Plantados:', 'required']) ?>
                                <br>

                                <?= $this->Form->input('dist_lineas', ['value' => '', 'class' => 'form-control', 'placeholder' => 'Distancia entre líneas', 'label' => 'Distancia entre líneas:', 'required']) ?>
                                <br>
                                <?= $this->Form->input('dist_plantas', ['value' => '', 'class' => 'form-control', 'placeholder' => 'Distancia entre plantas', 'label' => 'Distancia entre plantas:', 'required']) ?>
                                <br>
                                <?= $this->Form->input('sobrevivencia', ['value' => '', 'class' => 'form-control', 'placeholder' => 'Sobreviviencia', 'label' => 'Sobreviviencia:', 'required']) ?>
                                <br>

                                <?= $this->Form->input('emsefor_idemsefor', ['options' => $emsefor, 'empty' => '(Elija una Emsefor)', 'type' => 'select',
                                    'class' => 'form-control', 'placeholder' => 'Empresa', 'label' => 'Emsefor:', 'required']) ?>
                                <br>

                                <?= $this->Form->input('procedencias_idprocedencias', ['options' => $procedencia, 'empty' => '(Elija una Procedencia)', 'type' => 'select',
                                    'class' => 'form-control', 'placeholder' => 'Empresa', 'label' => 'Procedencia:', 'required']) ?>
                                <br>

                            </div>

                            <div class="box-footer">
                                <?= $this->Form->button('Asignar', ['class' => 'btn btn-success pull-right']) ?>
                                <?= $this->Html->link('Volver', ['controller' => 'Rodales', 'action' => 'index', '?' => ['Accion' => 'Ver Rodales', 'Categoria' => 'Rodales']],
                                ['class' => 'btn btn-default pull-left'], ['escape' => false]) ?>

                            </div>
                            <!-- /.box-body -->
                      </div>
                      <!-- /.box -->
                    </div>

                <?= $this->Form->end() ?>

            </div>

        </div>
    </section>

</div>

<?= $this->element('footer')?>