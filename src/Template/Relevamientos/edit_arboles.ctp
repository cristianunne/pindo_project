<?= $this->Html->script('index/index.js') ?>
<?= $this->Html->script('li_change.js') ?>


<?= $this->element('header')?>
<?= $this->element('sidebar')?>


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <?= $this->element('panel_header')?>
        <?= $this->Flash->render() ?>

        <section class="content">
            <div class="row">
                <?= $this->Form->create($arbolTable, ['id' => 'myform']) ?>
                <!-- left column -->
                <div class="col-md-6" style="float: none; margin: 0 auto">
                    <!-- Form Element sizes -->
                    <div class="box box-success">
                        <div class="box-header with-border">
                            <h3 class="box-title">Editar Árbol </h3>
                        </div>
                        <div class="box-body">
                            <?= $this->Form->input('marca', ['class' => 'form-control',  'label' => 'Marca:']) ?>
                            <br>
                            <?= $this->Form->input('dap', ['class' => 'form-control', 'placeholder' => 'dap', 'label' => 'Dap:']) ?>
                            <br>
                            <?= $this->Form->input('altura', ['class' => 'form-control', 'placeholder' => 'Altura', 'label' => 'Altura:']) ?>
                            <br>
                            <?= $this->Form->input('altura_poda', ['class' => 'form-control', 'placeholder' => 'Altura de Poda', 'label' => 'Altura de Poda:', 'required']) ?>
                            <br>
                            <?= $this->Form->input('dmsm', ['class' => 'form-control', 'placeholder' => 'DMSM', 'label' => 'DMSM:']) ?>
                            <br>
                            <?= $this->Form->input('calidad', ['class' => 'form-control', 'placeholder' => 'Calidad', 'label' => 'Calidad:']) ?>
                            <br>
                            <?= $this->Form->input('cosechado', ['options' => [0 => 'No', 1 => 'Si'], 'empty' => '(Elija una opción)', 'class' => 'form-control', 'placeholder' => 'Finalizado', 'label' => 'Cosechado?', 'required']) ?>
                            <br>

                            <?= $this->Form->input('fecha_rel', ['class' => 'form-control', 'placeholder' => 'Fecha: YYYY-MM-DD', 'minYear' => date('Y') - 20, 'maxYear' => date('Y') + 50, 'label' => false, 'required']) ?>

                            <br>


                        </div>

                        <div class="box-footer">
                            <?= $this->Form->button('Editar', ['class' => 'btn btn-success pull-right']) ?>

                            <?= $this->Html->link('Volver', ['controller' => 'Relevamientos', 'action' => 'viewArboles', '?' => ['Accion' => 'Ver Arboles',
                                'Categoria' => 'Relevamientos', 'id' => $id, 'id_rodal' => $id_rodal, 'sap' => h($sap)]],
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