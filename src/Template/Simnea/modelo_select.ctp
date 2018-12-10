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

                                <div class="col-md-10">
                                    <div class="box-header with-border">
                                        <h4 class="box-title">Corte:</h4>
                                    </div>

                                    <div class="box-body table-responsive" style="border: solid 1px #cecece;">
                                        <table id="example1" class="table table-bordered table-hover dataTable">
                                            <thead>
                                            <tr>
                                                <th scope="col"><?= $this->Paginator->sort('N°') ?></th>
                                                <th scope="col"><?= $this->Paginator->sort('Nombre') ?></th>
                                                <th scope="col"><?= $this->Paginator->sort('Modelo Maq.') ?></th>
                                                <th align="center" scope="col"><?= __('Modelo') ?></th>

                                            </tr>
                                            </thead>
                                            <tbody>

                                            <?php foreach ($maquinas as $maq): ?>

                                                        <?php if($maq->tarea == 'Corte'): ?>
                                                            <tr>
                                                                <td><?= h($maq->idmaquina_especifica) ?></td>
                                                                <td><?= h($maq->nombre) ?></td>
                                                                <td><?= h($maq->modelo) ?></td>
                                                                <td align="center">
                                                                    <?= $this->Form->input($maq->idmaquina_especifica, ['options' => $modelos_corte, 'empty' => '(Elija un Modelo)', 'type' => 'select',
                                                                        'class' => 'form-control', 'label' => false, 'required']) ?>
                                                                </td>
                                                            </tr>
                                                        <?php endif; ?>

                                            <?php endforeach; ?>

                                            </tbody>
                                        </table>

                                    </div>

                                </div> <!-- fin md-7 -->


                                <div class="col-md-10" style="margin-top: 30px;">
                                    <div class="box-header with-border">
                                        <h4 class="box-title">Extracción:</h4>
                                    </div>

                                    <div class="box-body table-responsive" style="border: solid 1px #cecece;">
                                        <table id="example2" class="table table-bordered table-hover dataTable">
                                            <thead>
                                            <tr>
                                                <th scope="col"><?= $this->Paginator->sort('N°') ?></th>
                                                <th scope="col"><?= $this->Paginator->sort('Nombre') ?></th>
                                                <th scope="col"><?= $this->Paginator->sort('Modelo') ?></th>
                                                <th scope="col"><?= __('Selección') ?></th>

                                            </tr>
                                            </thead>
                                            <tbody>

                                                <?php foreach ($maquinas as $maq): ?>

                                                    <?php if($maq->tarea == 'Extraccion'): ?>
                                                        <tr>
                                                            <td><?= h($maq->idmaquina_especifica) ?></td>
                                                            <td><?= h($maq->nombre) ?></td>
                                                            <td><?= h($maq->modelo) ?></td>

                                                            <td align="center">
                                                                <?= $this->Form->input($maq->idmaquina_especifica, ['options' => $modelos_extraccion, 'empty' => '(Elija un Modelo)', 'type' => 'select',
                                                                    'class' => 'form-control', 'label' => false, 'required']) ?>
                                                            </td>
                                                        </tr>
                                                    <?php endif; ?>

                                                <?php endforeach; ?>

                                            </tbody>
                                        </table>

                                    </div>

                                </div> <!-- fin md-6 -->

                                <div class="col-md-10" style="margin-top: 30px;">
                                    <div class="box-header with-border">
                                        <h4 class="box-title">Proceso:</h4>
                                    </div>

                                    <div class="box-body table-responsive" style="border: solid 1px #cecece;">
                                        <table id="example3" class="table table-bordered table-hover dataTable">
                                            <thead>
                                            <tr>
                                                <th scope="col"><?= $this->Paginator->sort('N°') ?></th>
                                                <th scope="col"><?= $this->Paginator->sort('Nombre') ?></th>
                                                <th scope="col"><?= $this->Paginator->sort('Modelo') ?></th>
                                                <th scope="col"><?= __('Selección') ?></th>

                                            </tr>
                                            </thead>
                                            <tbody>

                                            <?php foreach ($maquinas as $maq): ?>

                                                <?php if($maq->tarea == 'Proceso'): ?>
                                                    <tr>
                                                        <td><?= h($maq->idmaquina_especifica) ?></td>
                                                        <td><?= h($maq->nombre) ?></td>
                                                        <td><?= h($maq->modelo) ?></td>

                                                        <td align="center">
                                                            <?= $this->Form->input($maq->idmaquina_especifica, ['options' => $modelos_proceso, 'empty' => '(Elija un Modelo)', 'type' => 'select',
                                                                'class' => 'form-control', 'label' => false, 'required']) ?>
                                                        </td>
                                                    </tr>
                                                <?php endif; ?>

                                            <?php endforeach; ?>

                                            </tbody>
                                        </table>

                                    </div>

                                </div> <!-- fin md-6 -->

                                <div class="col-md-10" style="margin-top: 30px;">
                                    <div class="box-header with-border">
                                        <h4 class="box-title">Carga:</h4>
                                    </div>

                                    <div class="box-body table-responsive" style="border: solid 1px #cecece;">
                                        <table id="example4" class="table table-bordered table-hover dataTable">
                                            <thead>
                                            <tr>
                                                <th scope="col"><?= $this->Paginator->sort('N°') ?></th>
                                                <th scope="col"><?= $this->Paginator->sort('Nombre') ?></th>
                                                <th scope="col"><?= $this->Paginator->sort('Modelo') ?></th>
                                                <th scope="col"><?= __('Selección') ?></th>

                                            </tr>
                                            </thead>
                                            <tbody>

                                            <?php foreach ($maquinas as $maq): ?>

                                                <?php if($maq->tarea == 'Carga'): ?>
                                                    <tr>
                                                        <td><?= h($maq->idmaquina_especifica) ?></td>
                                                        <td><?= h($maq->nombre) ?></td>
                                                        <td><?= h($maq->modelo) ?></td>

                                                        <td align="center">
                                                            <?= $this->Form->input($maq->idmaquina_especifica, ['options' => $modelos_carga, 'empty' => '(Elija un Modelo)', 'type' => 'select',
                                                                'class' => 'form-control', 'label' => false, 'required']) ?>
                                                        </td>
                                                    </tr>
                                                <?php endif; ?>

                                            <?php endforeach; ?>

                                            </tbody>
                                        </table>

                                    </div>

                                </div> <!-- fin md-6 -->




                            </div>

                            <div class="box-footer"  style="background-color: inherit;">

                                <?= $this->Form->button($this->Html->tag('span', ' Simular', ['class' => 'glyphicon glyphicon-calendar', 'aria-hidden' => 'true']),
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
