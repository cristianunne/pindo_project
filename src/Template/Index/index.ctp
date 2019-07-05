

 <?= $this->Html->css('content_wrapper.css') ?>
<?= $this->Html->script('index/index.js') ?>

 <?= $this->Html->css('leaflet') ?>
 <?= $this->Html->script('leaflet/leaflet.js') ?>

 <?= $this->Html->script('loadingsettingmap.js') ?>
 <?= $this->Html->script('maps/stylesmap.js') ?>
 <?= $this->Html->script('maps/legend_map.js') ?>

 <?= $this->Html->css('maps/mapa.css') ?>


<?= $this->element('header')?>
<?= $this->element('sidebar')?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <?= $this->Flash->render() ?>

    <section class="content">
        <div class="row">
            <div class="col-lg-3 col-xs-6">
          <!-- small box -->
                  <div class="small-box bg-green">
                    <div class="inner">
                      <h3><?= h($rodal_count)?></h3>

                      <p>Rodales Registrados</p>
                    </div>
                    <div class="icon">
                      <i class="fa fa-tree"></i>
                    </div>
                           <?= $this->Html->link('<i class="fa fa-arrow-circle-right"></i> Ver Detalles', ['controller' => 'Rodales', 'action' => 'index', '?' => ['Accion' => 'Ver Rodales', 'Categoria' => 'Rodales']], ['class' => 'small-box-footer', 'escape' => false]) ?>

                  </div>
            </div>

             <div class="col-lg-3 col-xs-6">
          <!-- small box -->
                  <div class="small-box bg-yellow">
                    <div class="inner">
                      <h3><?= h($ems_count)?></h3>

                      <p>EMSEFOR Registradas</p>
                    </div>
                    <div class="icon">
                      <i class="fa fa-truck"></i>
                    </div>
                           <?= $this->Html->link('<i class="fa fa-arrow-circle-right"></i> Ver Detalles', ['controller' => 'Emsefor', 'action' => 'index', '?' => ['Accion' => 'Ver Emsefor', 'Categoria' => 'Emsefor']], ['class' => 'small-box-footer', 'escape' => false]) ?>

                  </div>
            </div>

            <div class="col-lg-3 col-xs-6">
          <!-- small box -->
                  <div class="small-box bg-purple">
                    <div class="inner">
                      <h3><?= h($maq_count)?></h3>

                      <p>Maquinas Registradas</p>
                    </div>
                    <div class="icon">
                      <i class="fab fa-android"></i>
                    </div>
                           <?= $this->Html->link('<i class="fa fa-arrow-circle-right"></i> Ver Detalles', ['controller' => 'Maquinas', 'action' => 'index', '?' => ['Accion' => 'Ver Maquinas', 'Categoria' => 'Maquinas']], ['class' => 'small-box-footer', 'escape' => false]) ?>

                  </div>
            </div>

              <div class="col-lg-3 col-xs-6">
          <!-- small box -->
                  <div class="small-box bg-navy">
                    <div class="inner">
                      <h3><?= h($proc_count)?></h3>

                      <p>Procedencias Registradas</p>
                    </div>
                    <div class="icon">
                      <i class="fa fa-fw fa-th"></i>
                    </div>
                           <?= $this->Html->link('<i class="fa fa-arrow-circle-right"></i> Ver Detalles', ['controller' => 'Procedencias', 'action' => 'index', '?' => ['Accion' => 'Ver Procedencias', 'Categoria' => 'Procedencias']], ['class' => 'small-box-footer', 'escape' => false]) ?>

                  </div>
            </div>

              <div class="col-lg-3 col-xs-6">
          <!-- small box -->
                  <div class="small-box bg-teal-active">
                    <div class="inner">
                      <h3><?= h($sagpya_count)?></h3>

                      <p>Sagpyas Registradas</p>
                    </div>
                    <div class="icon">
                      <i class="fas fa-file-alt"></i>
                    </div>
                           <?= $this->Html->link('<i class="fa fa-arrow-circle-right"></i> Ver Detalles', ['controller' => 'Sagpyas', 'action' => 'index', '?' => ['Accion' => 'Ver Sagpyas', 'Categoria' => 'Sagpyas']], ['class' => 'small-box-footer', 'escape' => false]) ?>

                  </div>
            </div>

            <div class="col-xs-12 col-sm-12">

                <div id="mapid" style="min-height: 85.5vh !important; height: 85.5vh;">

                </div>


                <div id="legend_container">

                </div>

            </div>

        </div>
    </section>

</div>

<?= $this->element('footer')?>