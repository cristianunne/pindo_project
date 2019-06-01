<?= $this->Html->script('index/index.js') ?>


<?= $this->element('header')?>
<?= $this->element('sidebar')?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <?= $this->element('panel_header')?>
        <?= $this->Flash->render() ?>
        <section class="content">
            <div class="row">
                <div class="col-md-3" style="float: none;margin: 0 auto;">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Editar una Capa Base</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive">

                            <?= $this->Form->create($capasbasedefault) ?>

                            <?= $this->Form->input('capabase_id', ['options' => $capaBase, 'empty' => '(Elija una Capa Base)', 'type' => 'select',
                                'class' => 'form-control', 'placeholder' => 'Capa Base', 'label' => 'Capa Base:', 'required']) ?>


                            <?= $this->Form->button('Aceptar', ['class' => 'btn btn-success pull-right']) ?>

                            <?= $this->Form->end() ?>


                        </div>

                    </div>
                </div>

            </div>
        </section>
    </div>
<?= $this->element('footer')?>