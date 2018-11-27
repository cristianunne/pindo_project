<?= $this->Html->script('index/index.js') ?>

<?= $this->Html->script('li_change.js') ?>


<?= $this->Html->script('simnea.js') ?>
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
                            <h4>Operación: <?= h($operacion) ?> </h4>
                            <h4>Sistema de Cosecha: <?= h($sist_cos) ?> </h4>

                        </div>

                        <div class="callout callout-info">
                            <h4>SELECCIONE LAS EMSEFOR:</h4>

                        </div>

                        <div class="box box-info container">
                            <div class="box-header">
                                <h3 class="box-title" style="color: green;">Emsefor Disponibles</h3>
                            </div>
                            <!-- /.box-header -->

                            <div class="row">
                                <div class="col-md-8">

                                    <div class="box-body table-responsive">
                                        <table id="example1" class="table table-bordered table-hover dataTable">
                                            <thead>
                                                <tr>
                                                    <th scope="col"><?= $this->Paginator->sort('ID Emsefor') ?></th>
                                                    <th scope="col"><?= $this->Paginator->sort('Nombre') ?></th>
                                                    <th scope="col"><?= $this->Paginator->sort('Contratista') ?></th>
                                                    <th scope="col"><?= $this->Paginator->sort('CUIT') ?></th>
                                                    <th scope="col"><?= __('') ?></th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php $i = 0; ?>
                                            <?php foreach ($emsefor as $em): ?>
                                                <tr>
                                                    <td style="font-weight: bold; text-align: center;"><?= h($em->idemsefor) ?></td>
                                                    <td><?= h($em->nombre) ?></td>
                                                    <td><?= h($em->contratista) ?></td>
                                                    <td><?= h($em->cuit) ?></td>

                                                    <td style="text-align: center;" id="<?= h("columna_".$i) ?>"> <?= $this->Form->checkbox($em->idemsefor, ['value' => $em->idemsefor,'label' => false, 'id' => 'ems_check', 'onclick' => 'checkBoxFunction(this)']) ?> </td>

                                                </tr>
                                            <?php $i = $i + 1; ?>
                                            <?php endforeach; ?>

                                            </tbody>
                                        </table>

                                    </div>

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


<?= $this->element('footer')?>
