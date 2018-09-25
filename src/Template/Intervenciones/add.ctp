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

                <?= $this->Form->create($intervenciones) ?>
                    <!-- left column -->
                    <div class="col-md-6" style="float: none; margin: 0 auto">
                        <!-- Form Element sizes -->
                        <div class="box box-success">
                            <div class="box-header with-border">
                                <h3 class="box-title">Agregar Intervención al Rodal</h3>
                            </div>
                            <div class="box-body">
                                <?= $this->Form->input('fecha', ['class' => 'form-control', 'placeholder' => 'Fecha:', 'label' => 'Fecha:', 'required']) ?>
                                <br>
                                <?= $this->Form->input('nro', ['value' => '', 'class' => 'form-control', 'placeholder' => 'Número', 'label' => 'Número:', 'required']) ?>
                                <br>
                                 <!-- Deberia ser una lista de opciones-->
                                <?= $this->Form->input('tipo_intervencion', ['options' => ['PODA' => 'PODA', 'RALEO' => 'RALEO', 'TALARAZA' => 'TALARAZA'], 'empty' => '(Elija un Tipo de Intervención)'
                                , 'class' => 'form-control', 'label' => 'Tipo de Intervención:', 'required']) ?>
                                <br>

                                <?= $this->Form->input('levante', ['value' => '', 'class' => 'form-control', 'placeholder' => 'Levante', 'label' => 'Levante:', 'required']) ?>
                                <br>

                                <?= $this->Form->input('intensidad', ['value' => '', 'class' => 'form-control', 'placeholder' => 'Intensidad', 'label' => 'Intensidad:', 'required']) ?>
                                <br>

                                 <?= $this->Form->input('criterio', ['value' => '', 'class' => 'form-control', 'placeholder' => 'Criterio', 'label' => 'Criterio:', 'required']) ?>
                                <br>


                                <?= $this->Form->input('emsefor_idemsefor', ['options' => $emsefor, 'empty' => '(Elija una Emsefor)', 'type' => 'select',
                                    'class' => 'form-control', 'placeholder' => 'Empresa', 'label' => 'Emsefor:', 'required']) ?>
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