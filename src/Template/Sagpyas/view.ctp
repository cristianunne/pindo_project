
<?= $this->Html->css('Empresas/empresas.css') ?>
 <?= $this->Html->css('Rodales/rodales.css') ?>
<?= $this->Html->script('index/index.js') ?>
<?= $this->Html->script('li_change.js') ?>


<?= $this->element('header')?>
<?= $this->element('sidebar')?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
      <?= $this->element('panel_header')?>

         <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-3">
                 <!-- Profile Image -->
                <div class="box box-warning div-panel-emp">
                    <div class="box-body box-profile">
                        <?php echo $this->Html->image('archivo.png', ['class' => 'profile-user-img img-responsive img-circle', 'alt' => 'Empresa imagen']) ?>

                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b>Operaciones: </b> <a><?= h($sagpya->operaciones) ?></a>
                            </li>
                            <li class="list-group-item">
                                <b>Fecha: </b> <a><?= h($sagpya->fecha ->format('d-m-Y')) ?></a>
                            </li>
                            <li class="list-group-item">
                                <b>Superficie Aprobada: </b> <a><?= h($sagpya->sup_aprobada) ?></a>
                            </li>
                            <li class="list-group-item">
                                <b>Expediente: </b> <a><?= h($sagpya->expediente) ?></a>
                            </li>
                            <li class="list-group-item">
                                <b>Turno Mínimo: </b> <a><?= h($sagpya->turno_minimo) ?></a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.box-body -->
                </div>
              <!-- /.box -->

                <?php  if($user_rol == 'admin'): ?>
                <div class="callout callout-warning">
                    <h4>Acciones</h4>
                    <p>Acciones de Sagpya a Rodales</p>
                </div>

                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title text-yellow">Acciones de Sagpya</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                        <table class="table table-condensed">
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Acción</th>
                                <th></th>

                            </tr>
                            <tr>
                                <td style="vertical-align: middle;" ><i class="fa fa-fw fa-tasks"></i></td>
                                <td style="vertical-align: middle;">Asignar Sagpya a Rodal</td>
                                <td style="vertical-align: middle;">


                                        <?= $this->Html->link(__('Asignar'), ['controller' => 'RodalSagpya', 'action' => 'asignar','?' => ['Accion' => 'Asignar Sagpya', 'Categoria' => 'Sagpya', 'id' => $sagpya->idsagpya]],
                                        ['class' => 'btn btn-warning']) ?>

                                </td>
                            </tr>
                        </table>
                    </div>

                    <!-- /.box-body -->
                  </div>
                <?php endif; ?>
            </div> <!--DIV MD3-->
            <div class="col-md-9">

                <div class="box box-warning box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">Rodales Sagpya</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                        </div>
                        <!-- /.box-tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                    <div class="box-body table-responsive" style="max-height: 900px;">
                        <table id="example2" class="table table-bordered table-hover dataTable">
                            <thead>
                                <tr>
                                    <th scope="col"><?= $this->Paginator->sort('Id') ?></th>
                                    <th scope="col"><?= $this->Paginator->sort('Código SAP') ?></th>
                                    <th scope="col"><?= $this->Paginator->sort('Campo') ?></th>
                                    <th scope="col"><?= $this->Paginator->sort('Uso') ?></th>
                                    <th scope="col"><?= $this->Paginator->sort('Finalizado') ?></th>
                                    <th scope="col"><?= $this->Paginator->sort('Empresa') ?></th>
                                    <th scope="col"><?= __('Acciones') ?></th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($rodales as $rodal): ?>
                                <tr>
                                    <td style="font-weight: bold; vertical-align: middle;"><?= h($rodal->idrodales) ?></td>
                                    <td style="vertical-align: middle;"><?= h($rodal->cod_sap) ?></td>
                                    <td align="center" style="vertical-align: middle;"><?= h($rodal->campo) ?></td>
                                    <td align="center" style="vertical-align: middle;"><?= h($rodal->uso) ?></td>
                                    <td align="center" style="vertical-align: middle;">
                                           <?php  if($rodal->finalizado == false){

      					                        echo 'No';
      					                        } else {

      					                        echo 'Si';
      					                    }?>

                                    </td>
                                    <td align="center" style="vertical-align: middle;">

                                        <?= $this->Html->link($rodal->_matchingData['Empresa']['nombre'],
                                        ['controller' => 'Empresa', 'action' => 'view','?' => ['Accion' => 'Ver Empresa', 'Categoria' => 'Empresa', 'id' => $rodal->_matchingData['Empresa']['idempresa']]]) ?>

                                   </td>
                                    <td align="center" style="vertical-align: middle;">

                                         <?= $this->Html->link(__('Ver'), ['controller' => 'Rodales', 'action' => 'view','?' => ['Accion' => 'ver Rodales', 'Categoria' => 'Rodales', 'id' => $rodal->idrodales]],
                                        ['class' => 'btn btn-warning']) ?>
                                         <?php  if($user_rol == 'admin'): ?>
                                            <?= $this->Form->postLink(__('Eliminar'), ['controller' => 'RodalSagpya', 'action' => 'delete', '?' => ['id_sagpya' => $sagpya->idsagpya,'id_rodal' => $rodal->idrodales]],
                                            ['confirm' => __('Eliminar el Sagpya del Rodal: {0}?', $rodal->idrodales), 'class' => 'btn btn-danger']) ?>
                                         <?php endif; ?>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>


                </div>
                    </div>
                    <!-- /.box-body -->
                </div>

            </div>

        </div>
    </section>

</div>

<?= $this->element('footer')?>

<script>
    $(function () {
        $('#example2').DataTable({
            'language' : {
                'search': "Buscar:",
                'paginate': {
                    'first':      "Primer",
                    'previous':   "Anterior",
                    'next':       "Siguiente",
                    'last':       "Anterior"
                }},
            "pageLength": 40,
            'lengthChange': true,
            'searching'   : true,
            'ordering'    : true

        });

    })
</script>