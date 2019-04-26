<?= $this->Html->script('index/index.js') ?>
<?= $this->Html->script('li_change.js') ?>


<?= $this->element('header')?>
<?= $this->element('sidebar')?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <?= $this->element('panel_header')?>
    <?= $this->Flash->render() ?>

    <section class="content">
        <div class="row">
            <div class="col-md-3">
                <!-- Profile Image -->
                <div class="box box-warning div-panel-emp">
                    <div class="box-body box-profile">

                        <?php
                            if(!empty($user)) {
                                ?>
                                <?php echo $this->Html->image('archivo.png', ['class' => 'profile-user-img img-responsive img-circle', 'alt' => 'Empresa imagen']) ?>

                                <ul class="list-group list-group-unbordered">
                                    <li class="list-group-item">
                                        <b>Email: </b> <a><?= h($user->email) ?></a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Nombre: </b> <a><?= h($user->firstname) ?></a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Apellido: </b> <a><?= h($user->lastname) ?></a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Role: </b> <a><?= h($user->role) ?></a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Activo desde: </b> <a><?= h($user->created->format('d-m-Y')) ?></a>
                                    </li>
                                </ul>
                                <?php
                            }
                        ?>

                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
</div>