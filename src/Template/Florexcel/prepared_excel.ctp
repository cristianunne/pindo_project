<?= $this->Html->script('index/index.js') ?>
<?= $this->Html->script('li_change.js') ?>
<?= $this->Html->css('relevamientos.css') ?>

<?= $this->element('header')?>
<?= $this->element('sidebar')?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <?= $this->element('panel_header')?>
    <?= $this->Flash->render() ?>

    <!-- Main content -->
    <section class="content">
        <div class="row">

            <div class="col-xs-3" style="float: none; margin: 0 auto">
                <div class="box box-success">
                    <div class="box-header">
                        <h3 class="box-title"><?= h('Descargar las parcelas para Flor-Excel') ?> </h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive">



                    </div>

                    <div class="box-footer">
                        <?= $this->Html->link('Volver', ['controller' => 'Relevamientos', 'action' => 'index', '?' => ['Accion' => 'Ver Relevamientos', 'Categoria' => 'Relevamientos']],
                            ['class' => 'btn btn-default pull-left'], ['escape' => false]) ?>

                        <?= $this->Html->link($this->Html->tag('span', '', ['class' => 'glyphicon far fa-file-excel', 'aria-hidden' => 'true']). ' Descargar',
                            ['controller' => 'Florexcel', 'action' => 'downloadAsExcel'],
                            ['class' => 'btn btn-success pull-right', 'escape' => false]) ?>

                    </div>

                </div>
            </div>

        </div>
    </section>





</div>

<?= $this->element('footer')?>

