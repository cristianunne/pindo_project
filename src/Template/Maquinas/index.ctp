 <?= $this->Html->css('Rodales/rodales.css') ?>
  <?= $this->Html->css('Maquinas/maquinas.css') ?>
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
            <div class="col-xs-12 col-sm-12">
                <div class="row" style="padding-bottom: 15px; padding-left: 15px;">

  				    <?php  foreach($maquinas as $maquina): ?>
  					<div id="<?= h($maquina->idmaquinas) ?>" class="col-xs-11 col-sm-2 div-panel">
  					    <div class="header-panel bg-purple-active">
  					            <strong><?= "Maquina N°: " . h($maquina->idmaquinas) ?></strong>

  					     </div>
  					    <div class="div-subpanel">
      					    <h6 id="text-color-list">
      					        <strong class="strong-color">Marca: </strong>
      						     <?= h($maquina->marca) ?>
      						</h6>
      						<h6 id="text-color-list">
      					        <strong class="strong-color">Modelo: </strong>
      						     <?= h($maquina->modelo) ?>
      						</h6>


  								<?php echo $this->Html->image('../'. $maquina->photo_dir . '/' . $maquina->photo, ['class' => 'img-responsive img-rounded center-img ']) ?>

  								<div style="padding-top:5px;">
  								    <?= $this->Html->link($this->Html->tag('span', '', ['class' => 'glyphicon glyphicon-edit', 'aria-hidden' => 'true']),
  							    	['controller' => 'Maquinas', 'action' => 'edit', '?' => ['Accion' => 'Editar Maquinas', 'Categoria' => 'Maquinas', 'id' => $maquina->idmaquinas]], ['class' => 'btn btn-block bg-purple', 'escape' => false]) ?>

  								    <?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $maquina->idmaquinas],
                                    ['confirm' => __('Eliminar la Maquina: {0}?', $maquina->marca. ' '.$maquina->modelo), 'class' => 'btn btn-block btn-danger', 'style' => 'margin-top: 5px']) ?>
                                </div>



  						</div>
  					</div>
  					<?php endforeach; ?>
  			    </div>

            </div>
        </div>
     </section>
</div>
<?= $this->element('footer')?>
