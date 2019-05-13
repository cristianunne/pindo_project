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
                <div class="box box-success div-panel-emp">
                    <div class="box-body box-profile">
                        <?php echo $this->Html->image('emsefor.png', ['class' => 'profile-user-img img-responsive img-circle', 'alt' => 'Empresa imagen']) ?>

                        <h3 class="profile-username text-center"> <?= h($emsefor->nombre) ?></h3>

                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b>Contratista: </b> <a><?= h($emsefor->contratista) ?></a>
                            </li>

                            <li class="list-group-item">
                                <b>Domicilio: </b> <a><?= h($emsefor->domicilio) ?></a>
                            </li>
                            <li class="list-group-item">
                                <b>Teléfono: </b> <a><?= h($emsefor->telefono) ?></a>
                            </li>
                            <li class="list-group-item">
                                <b>Email: </b> <a><?= h($emsefor->email) ?></a>
                            </li>
                            <li class="list-group-item">
                                <b>CUIT: </b> <a><?= h($emsefor->cuit) ?></a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.box-body -->
                </div>
              <!-- /.box -->




                <?php  if($user_rol == 'admin'): ?>

                    <div class="callout callout-success">
                        <h4>Acciones</h4>
                        <p>Realice una acción sobre Emsefor</p>
                    </div>
                    <div class="box box-success">
                        <div class="box-header">
                            <h3 class="box-title text-yellow">Acciones de Emsefor</h3>
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
                                    <td style="vertical-align: middle;">Asignar Maquinas a Emsefor</td>
                                    <td style="vertical-align: middle;">
                                        <?= $this->Html->link(__('Asignar'), ['controller' => 'EmsMaq', 'action' => 'asignar','?' => ['Accion' => 'Asignar Maquinas', 'Categoria' => 'Emsefor', 'id_ems' => $emsefor->idemsefor]],
                                        ['class' => 'btn btn-success btn-block']) ?>
                                    </td>

                                </tr>

                                <!--ESTA OPCION ESTA DELIMITADA POR LA EXISTENCIA O NO DE LOS DATOS GENERALES-->

                                <?php
                                        if (is_null($emsefor->variables_globale)){

                                ?>

                                            <tr>
                                                <td style="vertical-align: middle;" ><i class="fa fa-fw fa-tasks"></i></td>
                                                <td style="vertical-align: middle;">Cargar Variables Generales</td>
                                                <td style="vertical-align: middle;">
                                                    <?= $this->Html->link(__('Cargar'), ['controller' => 'VariablesGlobales', 'action' => 'add','?' => ['Accion' => 'Cargar Variables Generales', 'Categoria' => 'Emsefor', 'id_ems' => $emsefor->idemsefor]],
                                                        ['class' => 'btn btn-success btn-block']) ?>
                                                </td>

                                            </tr>

                                <?php
                                        } else {
                                ?>
                                            <tr>
                                                <td style="vertical-align: middle;" ><i class="fa fa-fw fa-tasks"></i></td>
                                                <td style="vertical-align: middle;">Editar Variables Generales</td>
                                                <td style="vertical-align: middle;">
                                                    <?= $this->Html->link(__('Editar'), ['controller' => 'VariablesGlobales', 'action' => 'edit','?' => ['Accion' => 'Editar Variables Generales', 'Categoria' => 'Emsefor',
                                                        'id_ems' => $emsefor->idemsefor, 'id_var_gen' => $emsefor->variables_globale->idvariables_globales]],
                                                        ['class' => 'btn btn-warning btn-block']) ?>
                                                </td>

                                            </tr>

                                            <tr>
                                                <td style="vertical-align: middle;" ><i class="fas fa-eye"></i></td>
                                                <td style="vertical-align: middle;">Ver Variables Generales</td>
                                                <td style="vertical-align: middle;">
                                                    <?= $this->Html->link(__('Ver'), ['controller' => 'VariablesGlobales', 'action' => 'view','?' => ['Accion' => 'Ver Variables Generales', 'Categoria' => 'Emsefor',
                                                        'id_ems' => $emsefor->idemsefor, 'id_var_gen' => $emsefor->variables_globale->idvariables_globales]],
                                                        ['class' => 'btn btn-primary btn-block']) ?>
                                                </td>

                                            </tr>
                                <?php
                                        }

                                ?>




                            </table>
                        </div>
                        <!-- /.box-body -->
                      </div>
                <?php endif; ?>
                </div> <!--DIV MD3-->



            <div class="col-md-9">
                <div class="callout callout-success">
                    <h4>Información</h4>
                    <p>Para cargar los Costos de la Máquina presione "Cargar Costos"</p>
                </div>

                 <div class="box box-success" >
                <div class="box-header">
                  <h3 class="box-title" style="color: green;">Lista de Maquinas</h3>
                </div>
                 <!-- /.box-header -->
                <div class="box-body table-responsive">
                    <table id="example2" class="table table-bordered table-hover dataTable">
                        <thead>
                            <tr>
                                <th scope="col"><?= $this->Paginator->sort('Id') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('Marca') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('Modelo') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('Imagen') ?></th>
                                <th scope="col"><?= __('Acciones') ?></th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($emsefor->maquinas as $maq_ems): ?>
                            <tr>
                                <td style="font-weight: bold; vertical-align: middle;"><?= h($maq_ems->idmaquinas) ?></td>
                                <td style="vertical-align: middle;"><?= h($maq_ems->marca) ?></td>
                                <td style="vertical-align: middle;"><?= h($maq_ems->modelo) ?></td>
                                <td style="vertical-align: middle;">
                                    <?php echo $this->Html->image('../'. $maq_ems->photo_dir . '/' . $maq_ems->photo, ['class' => 'img-responsive img-rounded center-img ']) ?>

                                </td>
                                <td align="center" style="vertical-align: middle;">
                                    <?= $this->Html->link(__('Ver Costos'), ['controller' => 'MaquinaEspecifica', 'action' => 'view','?' => ['Accion' => 'Ver Costos', 'Categoria' => 'Maquinas', 'id_ems' => $id_ems,
                                        'id_maq' => $maq_ems->idmaquinas, 'id_maq_esp' => $maq_ems->_joinData->maquina_especifica_idmaquina_especifica]], ['class' => 'btn btn-warning']) ?>

                                    <?php  if($user_rol == 'admin'): ?>
                                        <?= $this->Html->link(__('Cargar Costos'), ['controller' => 'MaquinaEspecifica', 'action' => 'addCostos','?' => ['Accion' => 'Cargar Costos', 'Categoria' => 'Maquinas', 'id_ems' => $id_ems,
                                        'id_maq' => $maq_ems->idmaquinas, 'id_maq_esp' => $maq_ems->_joinData->maquina_especifica_idmaquina_especifica]], ['class' => 'btn btn-success']) ?>

                                         <?= $this->Form->postLink(__('Eliminar'), ['controller' => 'EmsMaq', 'action' => 'delete','?' => ['Accion' => 'Editar Empresas', 'Categoria' => 'Empresa', 'id_ems' => $id_ems,
                                        'id_maq' => $maq_ems->idmaquinas, 'id_maq_esp' => $maq_ems->_joinData->maquina_especifica_idmaquina_especifica]], ['confirm' => __('Eliminar la Maquina?'), 'class' => 'btn btn-danger']) ?>
                                    <?php endif; ?>

                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>


                </div>

            </div>

            </div>

        </div>
    </section>

</div>

<?= $this->element('footer')?>

<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>