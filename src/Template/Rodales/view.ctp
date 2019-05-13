<?= $this->Html->css('Empresas/empresas.css') ?>
 <?= $this->Html->css('Rodales/rodales.css') ?>
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
            <div class="col-md-3">
                 <!-- Profile Image -->
                <div class="box box-success div-panel-emp" style="color: green;">
                    <div class="box-body box-profile">
                        <?php echo $this->Html->image('bosque.png', ['class' => 'profile-user-img img-responsive img-circle', 'alt' => 'Rodal imagen']) ?>

                        <h3 class="profile-username text-center"><strong> <?= h("Rodal N°: ".$rodale->idrodales) ?></strong></h3>

                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b>Código SAP: </b> <a><?= h($rodale->cod_sap) ?></a>
                            </li>
                            <li class="list-group-item">
                                <b>Telefono: </b> <a><?= h($rodale->campo) ?></a>
                            </li>
                            <li class="list-group-item">
                                <b>Uso: </b> <a><?= h($rodale->uso) ?></a>
                            </li>
                            <li class="list-group-item">
                                <b>Finalizado: </b>
                                <a>
                                    <?php  if($rodale->finalizado == false){

      					                echo 'No';
      					            } else {

      					                echo 'Si';
      					            }?>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.box-body -->
              </div>
              <!-- /.box -->


                <div class="callout callout-info">
                    <h4>EMPRESA</h4>

                    <p>Empresa que administra el Rodal.</p>
                </div>

                <div class="box box-primary div-panel-emp">
                    <div class="box-body box-profile">
                        <?php echo $this->Html->image('business.png', ['class' => 'profile-user-img img-responsive img-circle', 'alt' => 'Empresa imagen']) ?>

                        <h3 class="profile-username text-center"> <?= h($empresa->nombre) ?></h3>

                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b>Domicilio: </b> <a><?= h($empresa->domicilio) ?></a>
                            </li>
                            <li class="list-group-item">
                                <b>Telefono: </b> <a><?= h($empresa->telefono) ?></a>
                            </li>
                            <li class="list-group-item">
                                <b>Email: </b> <a><?= h($empresa->email) ?></a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.box-body -->
                </div>
                <?php  if($user_rol == 'admin'): ?>
                    <div class="callout callout-success">
                        <h4>Acciones</h4>

                        <p>Realice una serie de acciones a modo de completar la información del rodal.</p>
                    </div>

                   <div class="box">
                        <div class="box-header">
                            <h3 class="box-title text-green">Acciones del Rodal</h3>
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
                                     <?php

                                        if(!isset($plantaciones->plantacione)){

                                            ?>
                                                <td style="vertical-align: middle;" ><i class="fa fa-fw fa-tasks"></i></td>
                                                <td style="vertical-align: middle;">Asignar Plantación al Rodal</td>
                                                <td style="vertical-align: middle;">


                                                            <?= $this->Html->link(__('Asignar'), ['controller' => 'Plantaciones', 'action' => 'asignar','?' => ['Accion' => 'Asignar Plantación a Rodal', 'Categoria' => 'Rodal', 'id' => $rodale->idrodales]],
                                                                ['class' => 'btn btn-success']) ?>

                                                </td>
                                    <?php }  else {

                                            $id_platnacion = $plantaciones->plantacione->toArray()['nro_plantacion'];
                                            ?>
                                            <?php  if($user_rol == 'admin'): ?>
                                                <td style="vertical-align: middle;" ><i class="fas fa-times"></i></td>
                                                <td style="vertical-align: middle;">Eliminar la actual Plantación</td>
                                                <td style="vertical-align: middle;">

                                                    <?= $this->Form->postLink(__('Eliminar'), ['controller' => 'Plantaciones', 'action' => 'delete', $id_platnacion, '?' => ['Accion' => 'Eliminar Plantación',
                                                                    'Categoria' => 'Rodales', 'id' => $rodale->idrodales]], ['confirm' => __('Eliminar la Plantación'), 'class' => 'btn btn-block btn-danger']) ?>

                                                </td>
                                            <?php endif; ?>

                                    <?php } ?>

                                </tr>

                                <tr>

                                    <td style="vertical-align: middle;" ><i class="fa fa-fw fa-tasks"></i></td>
                                    <td style="vertical-align: middle;">Agregar Intervención</td>
                                    <td style="vertical-align: middle;">
                                        <?php
                                        $res = isset($plantaciones->plantacione);

                                        if($res){ ?>

                                        <?= $this->Html->link(__('Intervención'), ['controller' => 'Intervenciones', 'action' => 'add','?' => ['Accion' => 'Asignar Intervención a Rodal', 'Categoria' => 'Rodal', 'id' => $rodale->idrodales]],
                                                                ['class' => 'btn btn-block btn-success']) ?>
                                        <?php }?>
                                    </td>

                                </tr>

                                <tr>

                                    <td style="vertical-align: middle;" ><i class="fa fa-fw fa-tasks"></i></td>
                                    <td style="vertical-align: middle;">Realizar Inventario</td>
                                    <td style="vertical-align: middle;">
                                        <?php
                                        if (isset($plantaciones->plantacione)){ ?>

                                        <?= $this->Html->link(__('Inventario'), ['controller' => 'Inventario', 'action' => 'add','?' => ['Accion' => 'Realizar Inventario del Rodal', 'Categoria' => 'Rodal',
                                                'id' => $rodale->idrodales, 'cod_sap' => $rodale->cod_sap]], ['class' => 'btn btn-block btn-success']) ?>
                                        <?php }?>
                                    </td>

                                </tr>

                            </table>
                        </div>
                        <!-- /.box-body -->
                   </div>
                <?php endif; ?>

            </div> <!-- /div de md-3 -->

            <div class="col-md-9">

                <div class="box box-success box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">Plantaciones</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                        </div>
                        <!-- /.box-tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="box-body table-responsive" style="max-height: 900px;">

                            <?php

                                if($plant_count == 0){ ?>

                                    <div class="callout callout-warning">
                                        <h4>No Existen Plantaciones Asignadas!</h4>
                                        <p>Realice una Asignación de Plantación al Presente Rodal</p>
                                    </div>


                            <?php } else {?>


                                    <!-- AGREGAR LA PROCEDENCIA DE LA PLANTACION-->
                                    <table id="example2" class="table table-bordered table-hover dataTable" style="font-size: 13px;">
                                        <thead style="font-size: 14px;">
                                            <tr>
                                                <th scope="col"><?= $this->Paginator->sort('Número') ?></th>
                                                <th scope="col"><?= $this->Paginator->sort('Fecha') ?></th>
                                                <th scope="col"><?= $this->Paginator->sort('N° de Árboles Plantados') ?></th>
                                                <th scope="col"><?= $this->Paginator->sort('Superficie') ?></th>
                                                <th scope="col"><?= $this->Paginator->sort('Densidad') ?></th>
                                                <th scope="col"><?= $this->Paginator->sort('Distancia entre Líneas') ?></th>
                                                <th scope="col"><?= $this->Paginator->sort('Distancia entre Plantas') ?></th>
                                                <th scope="col"><?= $this->Paginator->sort('Sobrevivencia') ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>



                                            <tr>
                                                <td align="center" style="font-weight: bold; vertical-align: middle;"><?= h($plantaciones->plantacione->nro_plantacion) ?></td>
                                                <td align="center" style="vertical-align: middle;"><?= h($plantaciones->plantacione->fecha->format('d-m-Y')) ?></td>
                                                <td align="center" style="vertical-align: middle;"><?= h($plantaciones->plantacione->num_arbol_plantado) ?></td>
                                                <td align="center" style="vertical-align: middle;"><?= h($plantaciones->plantacione->superficie) ?></td>
                                                <td align="center" style="vertical-align: middle;"><?= h($plantaciones->plantacione->densidad) ?></td>
                                                <td align="center" style="vertical-align: middle;"><?= h($plantaciones->plantacione->dist_lineas) ?></td>
                                                <td align="center" style="vertical-align: middle;"><?= h($plantaciones->plantacione->dist_plantas) ?></td>
                                                <td align="center" style="vertical-align: middle;"><?= h($plantaciones->plantacione->sobrevivencia) ?></td>
                                            </tr>

                                        </tbody>
                                    </table>

                            <?php } ?>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>

             <?php
            if(!empty($plantaciones->plantacione)){ ?>
                    <div class="row">

                        <div class="col-md-5">

                            <div class="box box-success div-panel-emp">
                                <div class="box-body box-profile">
                                    <?php echo $this->Html->image('procedencias.jpg', ['class' => 'profile-user-img img-responsive img-rounded', 'alt' => 'Procedencias imagen']) ?>



                                        <h3 class="profile-username text-center"> <b>Procedencia: </b><?= h($procedencias->nombre) ?></h3>

                                        <ul class="list-group list-group-unbordered">
                                            <li class="list-group-item">
                                                <b>Especie: </b> <a><?= h($procedencias->especie) ?></a>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Origen: </b> <a><?= h($procedencias->origen) ?></a>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Mejora: </b> <a><?= h($procedencias->mejora) ?></a>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Vivero: </b> <a><?= h($procedencias->vivero) ?></a>
                                            </li>
                                        </ul>

                                </div>
                            <!-- /.box-body -->
                            </div>

                        </div>

                        <div class="col-md-5">

                            <div class="box box-primary div-panel-emp">
                                <div class="box-body box-profile">
                                    <?php echo $this->Html->image('emsefor.png', ['class' => 'profile-user-img img-responsive img-rounded', 'alt' => 'Emsefor imagen']) ?>

                                    <h3 class="profile-username text-center"><b>Emsefor: </b> <?= h($emsefor->nombre) ?></h3>

                                    <ul class="list-group list-group-unbordered">
                                        <li class="list-group-item">
                                            <b>Contratista: </b> <a><?= h($emsefor->contratista) ?></a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Domicilio: </b> <a><?= h($emsefor->domicilio) ?></a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Telefono: </b> <a><?= h($emsefor->telefono) ?></a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Email: </b> <a><?= h($emsefor->email) ?></a>
                                        </li>
                                    </ul>
                                </div>
                            <!-- /.box-body -->
                            </div>


                        </div>

                    </div>
            <?php } ?>

            </div> <!-- /div md-9 -->


            <!-- Contiene los datos de las intervenciones -->
            <div class="col-md-9">

                <div class="box box-success">
                    <div class="box-header">
                      <h3 class="box-title" style="color: green;">Intervenciones</h3>
                    </div>
                     <!-- /.box-header -->
                    <div class="box-body table-responsive">
                    <table id="example3" class="table table-bordered table-hover dataTable" style="font-size: 13px;">
                        <thead style="font-size: 14px;">
                            <tr>
                                <th scope="col"><?= $this->Paginator->sort('N°') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('Tipo de Intervención') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('Fecha') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('Levante') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('Intensidad') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('Criterio') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('Emsefor') ?></th>

                                <th scope="col"><?= __('Acciones') ?></th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            if(isset($intervencion)): ?>

                            <?php foreach ($intervencion as $inter): ?>
                            <tr>
                                <td style="font-weight: bold; vertical-align: middle;"><?= h($inter->nro) ?></td>
                                <td style="vertical-align: middle;"><?= h($inter->tipo_intervencion) ?></td>
                                <td style="vertical-align: middle;"><?= h($inter->fecha->format('d-m-Y')) ?></td>
                                <td style="vertical-align: middle;"><?= h($inter->levante) ?></td>
                                <td style="vertical-align: middle;"><?= h($inter->intensidad) ?></td>
                                <td style="vertical-align: middle;"><?= h($inter->criterio) ?></td>
                                <td style="vertical-align: middle;">
                                    <?= $this->Html->link($inter->emsefor->nombre, ['controller' => 'Emsefor', 'action' => 'view','?' => ['Accion' => 'Ver Emsefor', 'Categoria' => 'Emsefor', 'id_ems' => $inter->emsefor->idemsefor]]) ?>
                                </td>
                                <td align="center" valign="middle">

                                    <?= $this->Html->link($this->Html->tag('span', '', ['class' => 'glyphicon glyphicon-eye-open', 'aria-hidden' => 'true']),
  							    	['controller' => 'Intervenciones', 'action' => 'verInfoIntervencion','?' => ['Accion' => 'Ver Intervención', 'Categoria' => 'Rodales', 'id' => $inter->idintervencion, 'id_rodal' => $id_rodal]], ['class' => 'btn btn-default', 'escape' => false]) ?>

                                    <!-- Verifico el rol de usuario -->
                                    <?php  if($user_rol == 'admin'): ?>

  							    	<?= $this->Html->link($this->Html->tag('span', '', ['class' => 'glyphicon glyphicon-edit', 'aria-hidden' => 'true']),
  							    	['controller' => 'Intervenciones', 'action' => 'edit','?' => ['Accion' => 'Editar Intervención', 'Categoria' => 'Rodales', 'id' => $inter->idintervencion,  'id_rodal' => $id_rodal]], ['class' => 'btn btn-warning', 'escape' => false]) ?>

  							    	<?= $this->Html->link($this->Html->tag('span', '', ['class' => 'glyphicon glyphicon-plus', 'aria-hidden' => 'true']),
  							    	['controller' => 'Intervenciones', 'action' => 'addInfoIntervencion','?' => ['Accion' => 'Editar Intervención', 'Categoria' => 'Rodales', 'id' => $inter->idintervencion,
                                        'id_rodal' => $id_rodal]], ['class' => 'btn btn-success', 'escape' => false]) ?>



                                    <?= $this->Form->postLink(__($this->Html->tag('span', '', ['class' => 'glyphicon glyphicon-remove', 'aria-hidden' => 'true'])),
                                        ['controller' => 'Intervenciones', 'action' => 'delete', $inter->idintervencion, '?' =>
                                            ['Accion' => 'Eliminar Intervención', 'Categoria' => 'Rodales', $inter->idintervencion, 'id_rodal' => $id_rodal]],
                                        ['confirm' => __('Eliminar la intervención: {0}?',
                                            $inter->idintervencion), 'class' => 'btn btn-danger','escape' => false]) ?>
                                    <?php endif; ?>

                                </td>




                            </tr>
                            <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>


                </div>

                </div> <!--vid box-->

            </div>

        </div> <!--div row -->


        <div class="row">

                  <!-- Contiene los datos de las intervenciones -->
            <div class="col-md-12">

                <div class="callout bg-gray-active">
                    <h4>Inventario</h4>

                    <p>Lista de Inventarios realizados en el Actual Rodal.</p>
                </div>


                <div class="box box-success">
                    <div class="box-header">
                      <h3 class="box-title" style="color: green;">Inventario</h3>
                    </div>
                     <!-- /.box-header -->
                    <div class="box-body table-responsive">
                    <table id="example1" class="table table-bordered table-hover dataTable" style="font-size: 13px;">
                        <thead>
                            <tr>
                                <th scope="col"><?= $this->Paginator->sort('ID') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('Código SAP') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('Fecha') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('N° de árboles') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('DAP') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('Altura') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('Volumen Medio') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('Volumen Total') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('Área Basal') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('Forma') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('Daño') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('Tipo de Inventario') ?></th>
                                <!--Estas son las claves de las demas tablas-->
                                <th scope="col"><?= $this->Paginator->sort('Intervención') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('Emsefor') ?></th>

                                <?php  if($user_rol == 'admin'): ?>
                                    <th scope="col"><?= __('Acciones') ?></th>
                                <?php endif; ?>

                            </tr>
                        </thead>
                        <tbody>

                            <?php if(isset($inventario)): ?>
                            <?php foreach ($inventario->inventario as $inv): ?>
                            <tr>
                                <td style="font-weight: bold; vertical-align: middle;"><?= h($inv->idinventario) ?></td>
                                <td style="font-weight: bold; vertical-align: middle;"><?= h($inv->cod_sap) ?></td>
                                <td style="vertical-align: middle;"><?= h($inv->fecha->format('d-m-Y')) ?></td>
                                <td style="vertical-align: middle;"><?= h($inv->num_arbol) ?></td>
                                <td style="vertical-align: middle;"><?= h($inv->dap) ?></td>
                                <td style="vertical-align: middle;"><?= h($inv->altura) ?></td>
                                <td style="vertical-align: middle;"><?= h($inv->vol_medio) ?></td>
                                <td style="vertical-align: middle;"><?= h($inv->vol_total) ?></td>
                                <td style="vertical-align: middle;"><?= h($inv->area_basal) ?></td>
                                <td style="vertical-align: middle;"><?= h($inv->forma) ?></td>
                                <td style="vertical-align: middle;"><?= h($inv->dano) ?></td>
                                <td style="vertical-align: middle;"><?= h($inv->tipo_inventario) ?></td>

                                <?php if(isset($inv->intervencione->idintervencion)){ ?>
                                <td style="vertical-align: middle;">
                                    <?= $this->Html->link($inv->intervencione->nro. " " . $inv->intervencione->tipo_intervencion, ['controller' => 'Intervenciones', 'action' => 'verInfoIntervencion','?' => ['Accion' => 'Ver Intervención',
                                        'Categoria' => 'Rodales', 'id' => $inv->intervencione->idintervencion, 'id_rodal' => $id_rodal]]) ?>
                                </td>
                                <?php } else {  ?>
                                    <td style="vertical-align: middle;"></td>
                                <?php }?>

                                <td style="vertical-align: middle;">
                                    <?= $this->Html->link($inv->emsefor->nombre, ['controller' => 'Emsefor', 'action' => 'view','?' => ['Accion' => 'Ver Emsefor', 'Categoria' => 'Emsefor', 'id_ems' => $inv->emsefor_idemsefor]]) ?>
                                </td>

                                <td align="center" valign="middle">



  							    	  <?php  if($user_rol == 'admin'): ?>
                                          <?= $this->Html->link($this->Html->tag('span', '', ['class' => 'glyphicon glyphicon-edit', 'aria-hidden' => 'true']),
                                              ['controller' => 'Inventario', 'action' => 'edit','?' => ['Accion' => 'Editar Inventario', 'Categoria' => 'Rodales', 'id' => $inv->idinventario, 'id_rodal' => $id_rodal, 'cod_sap' => $rodale->cod_sap]], ['class' => 'btn btn-warning', 'escape' => false]) ?>


                                          <?= $this->Html->link($this->Html->tag('span', '', ['class' => 'glyphicon glyphicon-remove', 'aria-hidden' => 'true']),
                                            ['controller' => 'Inventario', 'action' => 'delete', $inv->idinventario, '?' => ['Accion' => 'Eliminar Inventario', 'Categoria' => 'Rodales',
                                                'id_rodal' => $id_rodal]], ['class' => 'btn btn-danger', 'escape' => false]) ?>

                                    <?php endif; ?>


                                </td>

                                </td>


                            </tr>
                            <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>


                </div>

                </div> <!--vid box-->
                <div class="callout bg-gray-active">
                    <h4>Mapa del Actual Rodal</h4>

                    <p>En el siguiente mapa se muestran las parcelas correspondiente al Actual Rodal.</p>
                </div>

                   <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d56504.54157737542!2d-54.664945622972645!3d-26.41025081252591!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94f76e75d69d55cd%3A0x125744858e20bdca!2sEldorado%2C+Misi%C3%B3nes!5e1!3m2!1ses-419!2sar!4v1519943618230" width="100%" height="700" frameborder="0" style="border:0" allowfullscreen></iframe>


            </div>




        </div>
    </section>



</div>



<?= $this->element('footer')?>


<script>
  $(function () {
    $('#example1').DataTable({
        'language' : {
        'search': "Buscar:",

    'paginate': {
            'first':      "Primer",
            'previous':   "Anterior",
            'next':       "Siguiente",
            'last':       "Anterior"
        }}

    });



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
</script>