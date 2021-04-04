<?= $this->Html->script('index/index.js') ?>
<?= $this->Html->script('li_change.js') ?>


<?= $this->element('header')?>
<?= $this->element('sidebar')?>


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <?= $this->element('panel_header')?>

        <section class="content">
            <div class="row">
                <?= $this->Form->create($users, ['id' => 'myform']) ?>
                <!-- left column -->
                <div class="col-md-6" style="float: none; margin: 0 auto">
                    <!-- Form Element sizes -->
                    <div class="box box-success">
                        <div class="box-header with-border">
                            <h3 class="box-title">Editar Usuario </h3>
                        </div>
                        <div class="box-body">

                            <?= $this->Form->input('email', ['class' => 'form-control', 'placeholder' => 'Email', 'label' => 'Email:', 'required']) ?>
                            <br>
                            <?= $this->Form->input('password', ['class' => 'form-control', 'placeholder' => 'Email', 'label' => 'Contraseña:', 'required']) ?>
                            <br>
                            <?= $this->Form->input('firstname', ['class' => 'form-control', 'placeholder' => 'Nombre', 'label' => 'Nombre:', 'required']) ?>
                            <br>
                            <?= $this->Form->input('lastname', ['class' => 'form-control', 'placeholder' => 'Apellido', 'label' => 'Apellido:', 'required']) ?>
                            <br>
                            <?= $this->Form->input('role', ['options' => ['admin' => 'admin', 'user' => 'user'], 'empty' => '(Elija una opción)', 'class' => 'form-control',
                                'placeholder' => 'Rol', 'label' => 'Rol:', 'required']) ?>
                            <br>

                            <?= $this->Form->input('active', ['options' => [0 => 'No', 1 => 'Si'], 'empty' => '(Elija una opción)', 'class' => 'form-control',
                                'placeholder' => 'Activo', 'label' => 'Activo?', 'required']) ?>
                            <br>


                        </div>

                        <div class="box-footer">
                            <?= $this->Form->button('Editar', ['class' => 'btn btn-success pull-right']) ?>
                            <?= $this->Html->link('Volver', ['controller' => 'AdministracionUsuarios', 'action' => 'index', '?' =>
                                ['Accion' => 'Administrar Usuarios', 'Categoria' => 'AdministracionUsuarios']],
                                ['class' => 'btn btn-default pull-left'], ['escape' => false]) ?>

                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>

                <?= $this->Form->end() ?>

            </div>
        </section>
    </div>

<?= $this->element('footer')?>