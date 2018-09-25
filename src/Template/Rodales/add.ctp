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
             <?= $this->Form->create('rodale') ?>
                <!-- left column -->
                <div class="col-md-6" style="float: none; margin: 0 auto">
                    <!-- Form Element sizes -->
                    <div class="box box-success">
                        <div class="box-header with-border">
                            <h3 class="box-title">Agregar Rodales</h3>
                        </div>
                        <div class="box-body">
                            <?= $this->Form->input('cod_sap', ['value' => '', 'class' => 'form-control', 'placeholder' => 'Código SAP', 'label' => 'Código SAP:', 'required']) ?>
                            <br>
                            <?= $this->Form->input('campo', ['value' => '', 'class' => 'form-control', 'placeholder' => 'Campo', 'label' => 'Campo:', 'required']) ?>
                            <br>
                             <!-- Deberia ser una lista de opciones-->
                            <?= $this->Form->input('uso', ['value' => '', 'class' => 'form-control', 'placeholder' => 'Uso', 'label' => 'Uso:', 'required']) ?>
                            <br>

                            <?= $this->Form->input('finalizado', ['options' => [0 => 'No', 1 => 'Si'], 'empty' => '(Elija una opción)', 'class' => 'form-control', 'placeholder' => 'Finalizado', 'label' => 'Finalizado?:', 'required']) ?>
                            <br>

                            <?= $this->Form->input('empresa_idempresa', ['options' => $empresa, 'empty' => '(Elija una Empresa)', 'type' => 'select',
                            'class' => 'form-control', 'placeholder' => 'Empresa', 'label' => 'Empresa:', 'required']) ?>
                        </div>

                        <div class="box-footer">
                            <?= $this->Form->button('Agregar', ['class' => 'btn btn-success pull-right']) ?>
                            <?= $this->Html->link('Volver', ['controller' => 'Rodales', 'action' => 'index', '?' => ['Accion' => 'Ver Rodales', 'Categoria' => 'Rodales']],
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