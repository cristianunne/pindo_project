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

            <div class="col-md-12">

                <div class="callout bg-gray-active">
                    <h4>Simulaciones</h4>

                    <p>Lista de Simulaciones realizadas sobre los Rodales.</p>
                </div>

                <div class="box box-success">
                    <div class="box-header">
                        <h3 class="box-title" style="color: green;">Simulaciones</h3>
                    </div>

                    <div class="box-body table-responsive">
                        <table id="example3" class="table table-bordered table-hover dataTable" style="font-size: 13px;">
                            <thead>
                            <tr>
                                <th scope="col"><?= $this->Paginator->sort('N° de Simulación') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('Fecha') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('Rodal') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('Tipo de Simulación') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('Sistema de Cosecha') ?></th>
                                <th scope="col"><?= __('Acciones') ?></th>

                            </tr>
                            </thead>
                            <tbody>

                            <?php if(isset($simulaciones)): ?>
                                <?php foreach ($simulaciones as $sim): ?>
                                    <tr>
                                            <td style="font-weight: bold; vertical-align: middle;"><?= h($sim->idsimulaciones) ?></td>
                                            <td style="font-weight: bold; vertical-align: middle;"><?= h($sim->fecha->format('d-m-Y')) ?></td>
                                            <td style="font-weight: bold; vertical-align: middle;">
                                                <?= $this->Html->link($sim->rodales_idrodales, ['controller' => 'Rodales', 'action' => 'view','?' =>
                                                    ['Accion' => 'Ver Rodales', 'Categoria' => 'Rodales', 'id' => $sim->rodales_idrodales]]) ?>
                                            </td>

                                            <td style="vertical-align: middle;"><?= h($sim->tipo_simulacion) ?></td>

                                            <td style="vertical-align: middle;"><?= h($sim->sistema_cosecha) ?></td> <!--pruebaa-->
                                            <td align="center" valign="middle">

                                                <?= $this->Html->link($this->Html->tag('span', '', ['class' => 'glyphicon glyphicon-search', 'aria-hidden' => 'true']),
                                                    ['controller' => 'Simulaciones', 'action' => 'view', '?' => ['Accion' => 'Ver Simulación', 'Categoria' => 'SIMNEA', 'id' => $sim->idsimulaciones]], ['class' => 'btn btn-success', 'escape' => false]) ?>

                                                <?= $this->Form->postLink($this->Html->tag('span', '', ['class' => 'glyphicon glyphicon-remove', 'aria-hidden' => 'true']), ['action' => 'delete', $sim->idsimulaciones],
                                                    ['confirm' => __('Eliminar la Simulación: {0}?', $sim->idsimulaciones), 'class' => 'btn btn-danger', 'escape' => false]) ?>

                                            </td>

                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
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

        $('#example3').DataTable({
            'paging'      : true,
            'lengthChange': true,
            'searching'   : true,
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

</script>