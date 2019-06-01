
<?= $this->Html->script('index/index.js') ?>


<?= $this->element('header')?>
<?= $this->element('sidebar')?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <?= $this->element('panel_header')?>
    <?= $this->Flash->render() ?>

    <section class="content">
        <div class="row">
            <div class="col-md-3" style="float: none; margin: 0 auto">
                <!-- Profile Image -->
                <div class="box box-primary" >
                    <div class="box-body box-profile">

                        <?php echo $this->Html->image('mapa.png', ['class' => 'profile-user-img img-responsive img-Rounded', 'alt' => 'Mapa imagen']) ?>

                        <h3 class="profile-username text-center"> <?= h('Configuraciones del Mapa') ?></h3>

                        <?php if(empty($mapaConfig)): ?>

                            <div class="callout callout-danger">
                                <h4>No se han especificado configuraciones al Mapa. Por favor configure y vuelva a consultar.

                                </h4>

                            </div>

                        <?php else: ?>

                            <ul class="list-group list-group-unbordered">
                                <li class="list-group-item">
                                    <b>CRS: </b> <a><?= h($mapaConfig->crs) ?></a>
                                </li>
                                <li class="list-group-item">
                                    <b>Center: </b> <a><?= h($mapaConfig->center) ?></a>
                                </li>
                                <li class="list-group-item">
                                    <b>Zoom: </b> <a><?= h($mapaConfig->zoom) ?></a>
                                </li>
                                <li class="list-group-item">
                                    <b>MinZoom: </b> <a><?= h($mapaConfig->minzoom) ?></a>
                                </li>
                                <li class="list-group-item">
                                    <b>MaxZoom: </b> <a><?= h($mapaConfig->maxzoom) ?></a>
                                </li>
                                <li class="list-group-item">
                                    <b>Renderer: </b> <a><?= h($mapaConfig->renderer) ?></a>
                                </li>
                            </ul>

                        <?php endif; ?>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>


        </div>
    </section>

</div>

<?= $this->element('footer')?>
