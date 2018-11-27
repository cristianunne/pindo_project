

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
            <?= $this->Form->create() ?>
                <div class="container-fluid">
                    <div class="row" id="contenedor_principal_simnea">

                        <div id="simnea_seleccion_sis_cosecha" class="col-md-10 col-xs-10 col-sm-10" style="float: none; margin: auto auto; background-color: #ececec;padding: 15px 15px 15px 15px;">
                            <div class="callout callout-success">
                                <h4>Rodal: <?= h($idrodal). " ---- Cod_Sap: ". h($cod_sap)?> </h4>

                            </div>

                            <div class="callout callout-info">
                                <h4>SELECCIONE EL SISTEMA DE COSECHA:</h4>
                            </div>

                            <div class="box box-info container">
                                <div class="box-header">
                                    <h3 class="box-title" style="color: green;">Sistemas de Cosecha</h3>
                                </div>
                                <!-- /.box-header -->

                                <div class="row">
                                    <div class="col-md-4">
                                        <?= $this->Form->input('cosecha', ['options' => ['Cut to lenght' => 'Cut to lenght', 'Full-tree' => 'Full-tree'], 'empty' => '(Elija una Cosecha)', 'type' => 'select',
                                            'class' => 'form-control', 'label' => False, 'required']) ?>

                                        <?= $this->Form->input('sistema_cosecha', ['options' => $sistemas_cosecha, 'empty' => '(Elija un Sistema de Cosecha)', 'type' => 'select',
                                                'class' => 'form-control', 'label' => False, 'required']) ?>
                                    </div>
                                </div>

                                <div class="box-footer"  style="background-color: inherit;">

                                    <?= $this->Form->button($this->Html->tag('span', 'Siguiente', ['class' => 'glyphicon glyphicon-forward', 'aria-hidden' => 'true']),
                                        ['class' => 'btn btn-primary pull-right', 'escape' => false]) ?>

                                </div>

                            </div> <!--vid box-->
                            <!--Agrego los botonoes de avanzar-->

                        </div>

                    </div>

                </div>
            <?= $this->Form->end() ?>
        </div>
    </section>
</div>

<?= $this->Html->script('simnea.js') ?>

<?= $this->element('footer')?>
