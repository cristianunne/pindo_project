
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
                            <h4>Sistema de Cosecha: <?= h($operacion) ?> </h4>
                            <h4>Operación: <?= h($sist_cos) ?> </h4>
                            <h4>Emsefor: <?= h($ems_nombre) ?> </h4>
                        </div>
                        <div class="callout callout-info">
                            <h4>SELECCIONE LAS MÁQUINAS:</h4>

                        </div>

                        <div class="box box-info container">
                            <div class="box-header">
                                <h3 class="box-title" style="color: green;">Maquinas</h3>
                            </div>
                            <!-- /.box-header -->

                            <div class="row">

                                <div class="col-md-7">
                                    <div class="box-header with-border">
                                        <h4 class="box-title">Corte:</h4>
                                    </div>

                                    <div class="box-body table-responsive" style="border: solid 1px #cecece;">
                                        <table id="example1" class="table table-bordered table-hover dataTable">
                                            <thead>
                                            <tr>
                                                <th scope="col"><?= $this->Paginator->sort('Emsefor') ?></th>
                                                <th scope="col"><?= $this->Paginator->sort('Nombre') ?></th>
                                                <th scope="col"><?= $this->Paginator->sort('Modelo') ?></th>
                                                <th scope="col"><?= __('Selección') ?></th>

                                            </tr>
                                            </thead>
                                            <tbody>

                                            <?php foreach ($emsefor_data_maq as $em): ?>

                                                <?php if(!empty($em->ems_maq)): ?>


                                                    <?php foreach ($em->ems_maq as $ems_maq): ?>
                                                        <?php if($ems_maq['maquina_especifica']->tarea == 'Corte' && $ems_maq['maquina_especifica']->tiene_costos == true): ?>
                                                            <?php foreach ($varMaqespCatop as $maqcatop): ?>
                                                                <?php if($maqcatop->maquina_especifica_idmaquina_especifica == $ems_maq['maquina_especifica']->idmaquina_especifica): ?>
                                                                    <tr>
                                                                        <td><?= h($em->nombre) ?></td>
                                                                        <td><?= h($ems_maq['maquina_especifica']->nombre) ?></td>
                                                                        <td><?= h($ems_maq['maquina_especifica']->modelo) ?></td>
                                                                        <td style="text-align: center;"> <?= $this->Form->checkbox('maq_cut_check_'. $ems_maq['maquina_especifica']->idmaquina_especifica, ['value' => $ems_maq['maquina_especifica']->idmaquina_especifica,'label' => false, 'id' => 'maq_cut_check']) ?> </td>
                                                                    </tr>

                                                                <?php endif; ?>

                                                            <?php endforeach; ?>
                                                        <?php endif; ?>
                                                    <?php endforeach; ?>


                                                <?php endif; ?>
                                            <?php endforeach; ?>

                                            </tbody>
                                        </table>

                                    </div>

                                </div> <!-- fin md-7 -->


                                <div class="col-md-7" style="margin-top: 30px;">
                                    <div class="box-header with-border">
                                        <h4 class="box-title">Extracción:</h4>
                                    </div>

                                    <div class="box-body table-responsive" style="border: solid 1px #cecece;">
                                        <table id="example2" class="table table-bordered table-hover dataTable">
                                            <thead>
                                            <tr>
                                                <th scope="col"><?= $this->Paginator->sort('Emsefor') ?></th>
                                                <th scope="col"><?= $this->Paginator->sort('Nombre') ?></th>
                                                <th scope="col"><?= $this->Paginator->sort('Modelo') ?></th>
                                                <th scope="col"><?= __('Selección') ?></th>

                                            </tr>
                                            </thead>
                                            <tbody>

                                            <?php foreach ($emsefor_data_maq as $em): ?>

                                                <?php if(!empty($em->ems_maq)): ?>


                                                    <?php foreach ($em->ems_maq as $ems_maq): ?>
                                                        <?php if($ems_maq['maquina_especifica']->tarea == 'Extraccion' && $ems_maq['maquina_especifica']->tiene_costos == true): ?>
                                                            <?php foreach ($varMaqespCatop as $maqcatop): ?>
                                                                <?php if($maqcatop->maquina_especifica_idmaquina_especifica == $ems_maq['maquina_especifica']->idmaquina_especifica): ?>
                                                                    <tr>
                                                                        <td><?= h($em->nombre) ?></td>
                                                                        <td><?= h($ems_maq['maquina_especifica']->nombre) ?></td>
                                                                        <td><?= h($ems_maq['maquina_especifica']->modelo) ?></td>
                                                                        <td style="text-align: center;"> <?= $this->Form->checkbox('maq_cut_check_'. $ems_maq['maquina_especifica']->idmaquina_especifica, ['value' => $ems_maq['maquina_especifica']->idmaquina_especifica,'label' => false, 'id' => 'maq_cut_check']) ?> </td>
                                                                    </tr>

                                                                <?php endif; ?>

                                                            <?php endforeach; ?>
                                                        <?php endif; ?>
                                                    <?php endforeach; ?>


                                                <?php endif; ?>
                                            <?php endforeach; ?>

                                            </tbody>
                                        </table>

                                    </div>

                                </div> <!-- fin md-6 -->

                                <div class="col-md-7" style="margin-top: 30px;">
                                    <div class="box-header with-border">
                                        <h4 class="box-title">Proceso:</h4>
                                    </div>

                                    <div class="box-body table-responsive" style="border: solid 1px #cecece;">
                                        <table id="example3" class="table table-bordered table-hover dataTable">
                                            <thead>
                                            <tr>
                                                <th scope="col"><?= $this->Paginator->sort('Emsefor') ?></th>
                                                <th scope="col"><?= $this->Paginator->sort('Nombre') ?></th>
                                                <th scope="col"><?= $this->Paginator->sort('Modelo') ?></th>
                                                <th scope="col"><?= __('Selección') ?></th>

                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php foreach ($emsefor_data_maq as $em): ?>

                                                <?php if(!empty($em->ems_maq)): ?>


                                                    <?php foreach ($em->ems_maq as $ems_maq): ?>
                                                        <?php if($ems_maq['maquina_especifica']->tarea == 'Proceso' && $ems_maq['maquina_especifica']->tiene_costos == true): ?>
                                                            <?php foreach ($varMaqespCatop as $maqcatop): ?>
                                                                <?php if($maqcatop->maquina_especifica_idmaquina_especifica == $ems_maq['maquina_especifica']->idmaquina_especifica): ?>
                                                                    <tr>
                                                                        <td><?= h($em->nombre) ?></td>
                                                                        <td><?= h($ems_maq['maquina_especifica']->nombre) ?></td>
                                                                        <td><?= h($ems_maq['maquina_especifica']->modelo) ?></td>
                                                                        <td style="text-align: center;"> <?= $this->Form->checkbox('maq_cut_check_'. $ems_maq['maquina_especifica']->idmaquina_especifica, ['value' => $ems_maq['maquina_especifica']->idmaquina_especifica,'label' => false, 'id' => 'maq_cut_check']) ?> </td>
                                                                    </tr>

                                                                <?php endif; ?>

                                                            <?php endforeach; ?>
                                                        <?php endif; ?>
                                                    <?php endforeach; ?>


                                                <?php endif; ?>
                                            <?php endforeach; ?>


                                            </tbody>
                                        </table>

                                    </div>

                                </div> <!-- fin md-6 -->

                                <div class="col-md-7" style="margin-top: 30px;">
                                    <div class="box-header with-border">
                                        <h4 class="box-title">Carga:</h4>
                                    </div>

                                    <div class="box-body table-responsive" style="border: solid 1px #cecece;">
                                        <table id="example4" class="table table-bordered table-hover dataTable">
                                            <thead>
                                            <tr>
                                                <th scope="col"><?= $this->Paginator->sort('Emsefor') ?></th>
                                                <th scope="col"><?= $this->Paginator->sort('Nombre') ?></th>
                                                <th scope="col"><?= $this->Paginator->sort('Modelo') ?></th>
                                                <th scope="col"><?= __('Selección') ?></th>

                                            </tr>
                                            </thead>
                                            <tbody>

                                            <?php foreach ($emsefor_data_maq as $em): ?>

                                                <?php if(!empty($em->ems_maq)): ?>


                                                    <?php foreach ($em->ems_maq as $ems_maq): ?>
                                                        <?php if($ems_maq['maquina_especifica']->tarea == 'Carga' && $ems_maq['maquina_especifica']->tiene_costos == true): ?>
                                                            <?php foreach ($varMaqespCatop as $maqcatop): ?>
                                                                <?php if($maqcatop->maquina_especifica_idmaquina_especifica == $ems_maq['maquina_especifica']->idmaquina_especifica): ?>
                                                                    <tr>
                                                                        <td><?= h($em->nombre) ?></td>
                                                                        <td><?= h($ems_maq['maquina_especifica']->nombre) ?></td>
                                                                        <td><?= h($ems_maq['maquina_especifica']->modelo) ?></td>
                                                                        <td style="text-align: center;"> <?= $this->Form->checkbox('maq_cut_check_'. $ems_maq['maquina_especifica']->idmaquina_especifica, ['value' => $ems_maq['maquina_especifica']->idmaquina_especifica,'label' => false, 'id' => 'maq_cut_check']) ?> </td>
                                                                    </tr>

                                                                <?php endif; ?>

                                                            <?php endforeach; ?>
                                                        <?php endif; ?>
                                                    <?php endforeach; ?>


                                                <?php endif; ?>
                                            <?php endforeach; ?>

                                            </tbody>
                                        </table>

                                    </div>

                                </div> <!-- fin md-6 -->




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

<script>
    $(function () {
        $('#example1').DataTable({
            'paging'      : true,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : false,
            'language' : {
                'search': "Buscar:",

                'paginate': {
                    'first':      "Primer",
                    'previous':   "Anterior",
                    'next':       "Siguiente",
                    'last':       "Anterior"
                }}
        })

        $('#example2').DataTable({
            'paging'      : true,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : false,
            'language' : {
                'search': "Buscar:",

                'paginate': {
                    'first':      "Primer",
                    'previous':   "Anterior",
                    'next':       "Siguiente",
                    'last':       "Anterior"
                }}
        })
        $('#example3').DataTable({
            'paging'      : true,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : false,
            'language' : {
                'search': "Buscar:",

                'paginate': {
                    'first':      "Primer",
                    'previous':   "Anterior",
                    'next':       "Siguiente",
                    'last':       "Anterior"
                }}
        })
        $('#example4').DataTable({
            'paging'      : true,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : false,
            'language' : {
                'search': "Buscar:",

                'paginate': {
                    'first':      "Primer",
                    'previous':   "Anterior",
                    'next':       "Siguiente",
                    'last':       "Anterior"
                }}
        })
    })
</script>
