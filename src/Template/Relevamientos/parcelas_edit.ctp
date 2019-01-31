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
                <?= $this->Form->create($parcelaTable, ['id' => 'myform']) ?>
                <!-- left column -->
                <div class="col-md-6" style="float: none; margin: 0 auto">
                    <!-- Form Element sizes -->
                    <div class="box box-success">
                        <div class="box-header with-border">
                            <h3 class="box-title">Editar Parcela </h3>
                        </div>
                        <div class="box-body">
                            <?= $this->Form->input('rodales_idrodales', ['class' => 'form-control',  'label' => 'Rodal:', 'disabled' => true]) ?>
                            <br>
                            <?= $this->Form->input('comentarios', ['class' => 'form-control', 'placeholder' => 'Comentarios', 'label' => 'Comentarios:']) ?>
                            <br>
                            <?= $this->Form->input('tipo', ['class' => 'form-control', 'placeholder' => 'Tipo', 'label' => 'Tipo:']) ?>
                            <br>
                            <?= $this->Form->input('fecha', ['class' => 'form-control', 'placeholder' => 'Fecha', 'label' => 'Fecha:', 'required']) ?>


                        </div>

                        <div class="box-footer">
                            <?= $this->Form->button('Editar', ['class' => 'btn btn-success pull-right']) ?>
                            <?= $this->Html->link('Volver', ['controller' => 'Relevamientos', 'action' => 'parcelasView', '?' => ['Accion' => 'Ver Relevamientos',
                                'Categoria' => 'Relevamientos', 'id' => $id_rodal, 'sap' => h($sap)]],
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
