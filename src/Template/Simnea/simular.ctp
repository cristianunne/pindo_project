

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
            <div class="container-fluid">
                <div class="row" id="contenedor_principal_simnea">

                    <?php
                            //compruebo que las variabels globales esten cargadas
                    if (!$is_insumos){

                        ?>

                            <div id="simnea_seleccion_rodal" class="col-md-10 col-xs-10 col-sm-10"
                                 style="float: none; margin: auto auto; background-color: #ececec;padding: 15px 15px 15px 15px;">
                                <div class="callout callout-danger">
                                    <h4>No se han especificado los Precios de Insumos. Por favor, complete estos datos e intente nuevamente la Simulación. Para acceder a Insumos haga click en el siguiente enlace:
                                        <?= $this->Html->link(' Agregar Insumos',
                                            ['controller' => 'Insumos', 'action' => 'add', '?' => ['Accion' => 'Editar Precios de Insumos', 'Categoria' => 'Insumos']], ['escape' => false]) ?>

                                    </h4>

                                </div>
                            </div>

                    <?php
                    } else {

                        //Compruebo los Modelos
                        if (!$is_modelos) {
                            ?>
                            <div id="simnea_seleccion_rodal" class="col-md-10 col-xs-10 col-sm-10"
                                 style="float: none; margin: auto auto; background-color: #ececec;padding: 15px 15px 15px 15px;">
                                <div class="callout callout-danger">
                                    <h4>No se han especificado Modelos. Por favor, complete estos datos e intente
                                        nuevamente la Simulación. Para acceder a Insumos haga click en el siguiente
                                        enlace:
                                        <?= $this->Html->link(' Agregar Modelos',
                                            ['controller' => 'Modelos', 'action' => 'add', '?' => ['Accion' => 'Ver SIMNEA', 'Categoria' => 'SIMNEA']], ['escape' => false]) ?>

                                    </h4>

                                </div>
                            </div>

                            <?php
                        } else {
                            ?>
                            <div id="simnea_seleccion_rodal" class="col-md-10 col-xs-10 col-sm-10"
                                 style="float: none; margin: auto auto; background-color: #ececec;padding: 15px 15px 15px 15px;">
                                <div class="callout callout-info">
                                    <h4>SELECCIONE UN RODAL:</h4>

                                </div>

                                <div class="box box-info">
                                    <div class="box-header">
                                        <h3 class="box-title" style="color: green;">Lista de Rodales</h3>
                                    </div>
                                    <!-- /.box-header -->

                                    <div class="box-body table-responsive">
                                        <table id="example1" class="table table-bordered table-hover dataTable">
                                            <thead>
                                            <tr>
                                                <th scope="col"><?= $this->Paginator->sort('Rodal N°') ?></th>
                                                <th scope="col"><?= $this->Paginator->sort('Código SAP') ?></th>
                                                <th scope="col"><?= $this->Paginator->sort('Campo') ?></th>
                                                <th scope="col"><?= $this->Paginator->sort('Uso') ?></th>
                                                <th scope="col"><?= $this->Paginator->sort('Empresa') ?></th>
                                                <th scope="col"><?= __('Acciones') ?></th>

                                            </tr>
                                            </thead>
                                            <tbody>

                                            <?php foreach ($rodales as $rodal): ?>
                                                <tr>
                                                    <td style="font-weight: bold;"><?= h($rodal->idrodales) ?></td>
                                                    <td><?= h($rodal->cod_sap) ?></td>
                                                    <td><?= h($rodal->campo) ?></td>
                                                    <td><?= h($rodal->uso) ?></td>
                                                    <td>
                                                        <?= h($rodal->empresa->nombre) ?>

                                                    </td>
                                                    <td align="center" valign="middle">

                                                        <?= $this->Html->link($this->Html->tag('span', '', ['class' => 'glyphicon glyphicon-ok', 'aria-hidden' => 'true']),
                                                            ['controller' => 'Simnea', 'action' => 'sitio', $rodal->idrodales, '?' => ['Accion' => 'Simular', 'Categoria' => 'SIMNEA']], ['class' => 'btn btn-info', 'escape' => false]) ?>


                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>

                                            </tbody>
                                        </table>

                                    </div>

                                </div> <!--vid box-->
                                <!--Agrego los botonoes de avanzar-->

                            </div>


                            <?php
                        }
                    }
                    ?>

                </div>

            </div>
        </div>
    </section>
</div>

<?= $this->Html->script('simnea.js') ?>

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
    })
</script>