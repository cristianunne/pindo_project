

 <?= $this->Html->css('content_wrapper.css') ?>
<?= $this->Html->script('index/index.js') ?>


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
                  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d56504.54157737542!2d-54.664945622972645!3d-26.41025081252591!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94f76e75d69d55cd%3A0x125744858e20bdca!2sEldorado%2C+Misi%C3%B3nes!5e1!3m2!1ses-419!2sar!4v1519943618230" width="100%" height="700" frameborder="0" style="border:0" allowfullscreen></iframe>

            </div>

        </div>
    </section>

</div>

<?= $this->element('footer')?>