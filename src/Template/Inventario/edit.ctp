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

            <?= $this->Form->create($inventario, ['id' => 'myform']) ?>
                <!-- left column -->
                <div class="col-md-6" style="float: none; margin: 0 auto">
                    <!-- Form Element sizes -->
                    <div class="box box-success">
                        <div class="box-header with-border">
                            <h3 class="box-title">Agregar Inventario</h3>
                        </div>
                        <div class="box-body">
                            <?= $this->Form->input('cod_sap', ['class' => 'form-control', 'value' => $cod_sap, 'label' => 'Código SAP', 'disabled' => True]) ?>

                            <?= $this->Form->input('fecha', ['class' => 'form-control', 'label' => 'Fecha:', 'required']) ?>

                            <?= $this->Form->input('num_arbol', ['class' => 'form-control', 'label' => 'N° de Árboles:', 'required']) ?>

                            <?= $this->Form->input('dap', ['class' => 'form-control', 'label' => 'DAP:', 'required']) ?>

                            <?= $this->Form->input('altura', ['class' => 'form-control', 'label' => 'Altura:', 'required']) ?>

                            <?= $this->Form->input('vol_medio', ['class' => 'form-control', 'label' => 'Volumen Medio:', 'required']) ?>

                            <?= $this->Form->input('vol_total', ['class' => 'form-control', 'label' => 'Volumen Total:', 'required']) ?>

                            <?= $this->Form->input('area_basal', ['class' => 'form-control', 'label' => 'Área Basal:', 'required']) ?>

                            <?= $this->Form->input('forma', ['class' => 'form-control', 'label' => 'Forma:', 'required']) ?>

                            <?= $this->Form->input('dano', ['class' => 'form-control', 'label' => 'Daño', 'required']) ?>

                            <?= $this->Form->input('tipo_inventario', ['options' => ['INTERVENCION' => 'INTERVENCION', 'TEMPORAL' => 'TEMPORAL', 'PERMANENTE' => 'PERMANENTE'], 'empty' => '(Elija un Tipo de Inventario)',
                                'class' => 'form-control', 'label' => 'Tipo de Inventario', 'required', 'onchange' => 'changeDisplayIntervencion(this)']) ?>


                            <label id='label_intervencion-idintervencion' class="intervencion" for="intervencion-idintervencion">Intervención:</label>
                            <?= $this->Form->input('intervencion_idintervencion', ['options' => $intervenciones, 'empty' => '(Elija una Intervención)', 'type' => 'select',
                                'class' => 'form-control intervencion', 'label' => false, 'id' => 'intervencion-idintervencion']) ?>

                            <?= $this->Form->input('emsefor_idemsefor', ['options' => $emsefor, 'empty' => '(Elija una Emsefor)', 'type' => 'select',
                                'class' => 'form-control', 'label' => 'Emsefor:', 'required']) ?>

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
    </section>


</div>

<?= $this->element('footer')?>