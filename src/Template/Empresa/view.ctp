
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
              <!-- /.box -->
            </div>

            <!-- SECCION QUE MUESTRA LOS RODALES DE LA EMPRESA EN CUESTIÓN -->
            <div class="col-md-9">
                <div class="box box-success div-panel-emp" >
                    <div class="row" style="padding: 15px 15px 15px 15px;">

                        <div class="col-md-12 panel-rodal-empresa">

                            <h3 class="timeline-header no-border"><strong><a style="color:#36755b;">RODALES DE LA EMPRESA</a></strong>
                            </h3>
                        </div>
                         <?php  foreach($rodales as $rodal): ?>
  					<div id="<?= h($rodal->idrodales) ?>" class="col-xs-11 col-sm-2 div-panel">
  					    <div class="header-panel">
  					            <strong><?= "Rodal N°: " . h($rodal->idrodales) ?></strong>

  					     </div>
  					    <div class="div-subpanel">
      					    <h6 id="text-color-list">
      					        <strong>Código SAP: </strong>
      						     <?= h($rodal->cod_sap) ?>
      						</h6>
      						<h6 id="text-color-list">
      					        <strong>Campo: </strong>
      						     <?= h($rodal->campo) ?>
      						</h6>
      						<h6 id="text-color-list">
      					        <strong>Uso: </strong>
      						     <?= h($rodal->uso) ?>
      						</h6>
      						<h6 id="text-color-list">
      					        <strong>Finalizado: </strong>
      					            <?php  if($rodal->finalizado == false){

      					                echo 'No';
      					            } else {

      					                echo 'Si';
      					            }?>

      						</h6>

  							<?php echo $this->Html->image('bosque.png', ['class' => 'img-responsive img-rounded center-img']) ?>
  							<div style="padding-top:5px;">
  							    <?= $this->Html->link($this->Html->tag('span', '', ['class' => 'glyphicon glyphicon-search', 'aria-hidden' => 'true']),
  							    	['controller' => 'Rodales', 'action' => 'view', '?' => ['Accion' => 'Ver Rodales', 'Categoria' => 'Rodales', 'id' => $rodal->idrodales]], ['class' => 'btn btn-block btn-success', 'escape' => false]) ?>

  							</div>

  						</div>
  					</div>
  					<?php endforeach; ?>

                    </div>
                </div>
            </div>


        </div>
    </section>

</div>

<?= $this->element('footer')?>