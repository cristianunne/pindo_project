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

                <?= $this->Form->create($infoIntervenciones, ['id' => 'myform']) ?>
                    <!-- left column -->
                    <div class="col-md-6" style="float: none; margin: 0 auto">
                        <!-- Form Element sizes -->
                        <div class="box box-success">
                            <div class="box-header with-border">
                                <h3 class="box-title">Agregar la Información Complementaria de la Intervención al Rodal</h3>
                            </div>
                            <div class="box-body">
                                <?= $this->Form->input('cod_sap', ['class' => 'form-control', 'value' => $cod_sap,  'label' => 'Código SAP:', 'disabled' => True]) ?>
                                <br>
                                <?= $this->Form->input('fecha', ['class' => 'form-control', 'placeholder' => 'Fecha:', 'label' => 'Fecha:', 'required']) ?>
                                <br>
                                <?= $this->Form->input('arb_ha', ['class' => 'form-control', 'placeholder' => 'Árboles Extradídos', 'label' => 'Árboles Extradídos:' , 'required']) ?>
                                <br>

                                <?= $this->Form->input('arb_podados', ['class' => 'form-control', 'placeholder' => 'Árboles Podados', 'label' => 'Árboles Podados:', 'required']) ?>
                                <br>

                                <?= $this->Form->input('arb_alt_deseada', ['class' => 'form-control', 'placeholder' => 'Árboles Altura Deseada', 'label' => 'Árboles Altura Deseada:', 'required']) ?>
                                <br>

                                 <?= $this->Form->input('alt_poda', ['class' => 'form-control', 'placeholder' => 'Altura Poda', 'label' => 'Altura Poda:', 'required']) ?>
                                <br>

                                <?= $this->Form->input('arb_no_podados', ['class' => 'form-control', 'placeholder' => 'Árboles No Podados', 'label' => 'Árboles No Podados:', 'required']) ?>
                                <br>
                                <?= $this->Form->input('dap', ['class' => 'form-control', 'placeholder' => 'DAP', 'label' => 'DAP:', 'required']) ?>
                                <br>
                                <?= $this->Form->input('altura', ['class' => 'form-control', 'placeholder' => 'Altura', 'label' => 'Altura:', 'required']) ?>
                                <br>
                                 <?= $this->Form->input('dmsm', ['class' => 'form-control', 'placeholder' => 'DMSM', 'label' => 'DMSM:', 'required']) ?>
                                <br>
                                 <?= $this->Form->input('porc_removido', ['class' => 'form-control', 'placeholder' => '% Removido', 'label' => '% Removido:', 'required']) ?>
                                <br>

                            </div>

                            <div class="box-footer">
                                <?= $this->Form->button('Cargar', ['class' => 'btn btn-success pull-right']) ?>
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