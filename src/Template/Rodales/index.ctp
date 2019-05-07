
 <?= $this->Html->css('Rodales/rodales.css') ?>
<?= $this->Html->script('index/index.js') ?>
<?= $this->Html->script('li_change.js') ?>


<?= $this->element('header')?>
<?= $this->element('sidebar')?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
      <?= $this->element('panel_header')?>

    <section class="content">
        <div class="row">
            <div class="col-xs-12 col-sm-12">
                <div class="box box-success">
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
                                <th scope="col"><?= $this->Paginator->sort('Finalizado') ?></th>
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
                                     <?php  if($rodal->finalizado == false){

      					                echo 'No';
      					            } else {

      					                echo 'Si';
      					            }?>
                                </td>
                                <td>
                                     <?= $this->Html->link($rodal->empresa->nombre, ['controller' => 'Empresa', 'action' => 'view','?' =>
                                         ['Accion' => 'Ver Empresa', 'Categoria' => 'Empresa', 'id' => $rodal->empresa->idempresa]]) ?>

                                </td>
                                <td align="center" valign="middle">

                                    <?= $this->Html->link($this->Html->tag('span', '', ['class' => 'glyphicon glyphicon-search', 'aria-hidden' => 'true']),
                                        ['controller' => 'Rodales', 'action' => 'view', '?' => ['Accion' => 'Ver Rodales', 'Categoria' => 'Rodales', 'id' => $rodal->idrodales]], ['class' => 'btn btn-success', 'escape' => false]) ?>

                                    <?php  if($user_rol == 'admin'): ?>

                                        <?= $this->Html->link($this->Html->tag('span', '', ['class' => 'glyphicon glyphicon-edit', 'aria-hidden' => 'true']),
                                        ['controller' => 'Rodales', 'action' => 'edit','?' => ['Accion' => 'Editar Rodales', 'Categoria' => 'Rodales', 'id' => $rodal->idrodales]], ['class' => 'btn btn-warning', 'escape' => false]) ?>

                                    <?php endif; ?>

                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>


                    </div>

                </div> <!--vid box-->

             <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d56504.54157737542!2d-54.664945622972645!3d-26.41025081252591!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94f76e75d69d55cd%3A0x125744858e20bdca!2sEldorado%2C+Misi%C3%B3nes!5e1!3m2!1ses-419!2sar!4v1519943618230" width="100%" height="700" frameborder="0" style="border:0" allowfullscreen></iframe>



            </div>
        </div>
     </section>
</div>
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



    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false,
    })
  })
</script>