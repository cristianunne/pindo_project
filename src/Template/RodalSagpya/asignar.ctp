<?= $this->Html->script('index/index.js') ?>


<?= $this->element('header')?>
<?= $this->element('sidebar')?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">


      <?= $this->element('panel_header')?>
      <?= $this->Flash->render() ?>

       <!-- Main content -->
    <section class="content">
        <div class="row">

            <?= $this->Form->create('rodal_sagpya') ?>
                <!-- left column -->
                <div class="col-md-6" style="float: none; margin: 0 auto">
                    <!-- Form Element sizes -->
                    <div class="box box-warning">
                        <div class="box-header with-border">
                            <h3 class="box-title">Asignar Sagpya </h3>
                        </div>
                        <div class="box-body">
                            <?= $this->Form->input('rodales_idrodales',  ['options' => $rodales, 'multiple'=>false, 'label' => false]) ?>
                            <br>

                        </div>

                        <div class="box-footer">
                            <?= $this->Form->button('Asignar', ['class' => 'btn btn-warning pull-right']) ?>
                            <?= $this->Html->link('Volver', ['controller' => 'Sagpyas', 'action' => 'view', '?' => ['Accion' => 'Ver Sagpya', 'Categoria' => 'Sagpya', 'id' => $id]],
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