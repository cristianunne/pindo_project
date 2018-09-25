
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

                <?= $this->Form->create($intervenciones, ['id' => 'myform']) ?>
                    <!-- left column -->
                    <div class="col-md-6" style="float: none; margin: 0 auto">
                        <!-- Form Element sizes -->
                        <div class="box box-success">
                            <div class="box-header with-border">
                                <h3 class="box-title">Editar Intervención del Rodal</h3>
                            </div>
                            <div class="box-body">
                                <?= $this->Form->input('fecha', ['class' => 'form-control', 'placeholder' => 'Fecha:', 'label' => 'Fecha:', 'required']) ?>
                                <br>
                                <?= $this->Form->input('nro', ['class' => 'form-control', 'placeholder' => 'Número', 'label' => 'Número:', 'required']) ?>
                                <br>
                                 <!-- Deberia ser una lista de opciones-->
                                <?= $this->Form->input('tipo_intervencion', ['options' => ['PODA' => 'PODA', 'RALEO' => 'RALEO', 'TALARAZA' => 'TALARAZA'], 'empty' => '(Elija un Tipo de Intervención)'
                                , 'class' => 'form-control', 'label' => 'Tipo de Intervención:', 'required']) ?>
                                <br>

                                <?= $this->Form->input('levante', ['class' => 'form-control', 'placeholder' => 'Levante', 'label' => 'Levante:', 'required']) ?>
                                <br>

                                <?= $this->Form->input('intensidad', ['class' => 'form-control', 'placeholder' => 'Intensidad', 'label' => 'Intensidad:', 'required']) ?>
                                <br>

                                 <?= $this->Form->input('criterio', ['class' => 'form-control', 'placeholder' => 'Criterio', 'label' => 'Criterio:', 'required']) ?>
                                <br>


                                <?= $this->Form->input('emsefor_idemsefor', ['options' => $emsefor, 'empty' => '(Elija una Emsefor)', 'type' => 'select',
                                    'class' => 'form-control', 'label' => 'Emsefor:', 'required']) ?>
                                <br>

                            </div>

                            <div class="box-footer">
                                <?= $this->Form->button('Editar', ['class' => 'btn btn-success pull-right']) ?>
                                <?= $this->Html->link('Volver', ['controller' => 'Rodales', 'action' => 'view', '?' => ['Accion' => 'Ver Rodales', 'Categoria' => 'Rodales', 'id' => $id_rodal]],
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