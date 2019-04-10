
<?= $this->Html->script('index/index.js') ?>
<?= $this->Html->script('li_change.js') ?>
<?= $this->Html->script('administracion/administracion.js') ?>

<?= $this->Html->css('administracion/administracion.css') ?>

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
                      <h3 class="box-title" style="color: green;">Filtros y Consulta de Rodales</h3>
                    </div>

                    <div class="box-body">
                        <div class="container-fluid">
                            <div class="row">

                                <div class="col-md-2">
                                    <button type="button" class="btn btn-md btn-warning" data-toggle="modal" data-target="#modal-success">
                                        <span class="glyphicon glyphicon-plus"></span> Agregar Filtro
                                    </button>


                                </div>
                                <div class="col-md-8">
                                    <div class="callout callout-success">
                                        <h4>Filtros Aplicados</h4>
                                        <p>Esta sección muestra los filtros aplicados a la búsqueda de Rodales</p>
                                    </div>

                                    <div id="panel_filtros" class="panel_filtros" style="height: 300px; width: 100%; border: solid 1px #c0c0c0;">


                                    </div>


                                </div>
                                <div class="col-md-10" style="margin-top: 20px;">
                                    <button type="button" class="btn btn-success pull-right" onclick="applyFiltroGeneral()">Aplicar</button>


                                </div>

                            </div>

                        </div>
                    </div>

                 <!-- /.box-header -->

                    <!-- Ac iria el Modal-->

                    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="modal-success" aria-hidden="true" id="modal-success">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title">Seleccione el Filtro a Aplicar</h4>
                                </div>
                                <div class="modal-body">

                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Seleccione una categoría</label>
                                            <select class="form-control" id="FormSelectCategory" onchange="select_category()">
                                                <option>Seleccione una categoría..</option>

                                                <?php  foreach ($tabla_filtros as $tabla):?>

                                                    <?php echo '<option id="'. $tabla.'">'. $tabla.'</option>'  ?>

                                                <?php  endforeach;?>

                                            </select>
                                        </div>

                                    <div class="row">
                                        <!--Una tabla que tenga las variables-->
                                        <div id="variables_category" class="col-md-5">



                                        </div>

                                        <div id="operador_category" class="col-md-5 pull-right" style="margin-right: 15px; margin-bottom: 15px;">
                                            <button attr="=" class="btn btn-default margin-boton" onclick="buttonOperatorPut(this)">=</button>
                                            <button attr=">" class="btn btn-default margin-boton" onclick="buttonOperatorPut(this)">></button>
                                            <button attr="<" class="btn btn-default margin-boton" onclick="buttonOperatorPut(this)"><</button>
                                            <button attr=">=" class="btn btn-default margin-boton" onclick="buttonOperatorPut(this)">>=</button>
                                            <button attr="<=" class="btn btn-default margin-boton" onclick="buttonOperatorPut(this)"><=</button>
                                            <button attr="<>" class="btn btn-default margin-boton" onclick="buttonOperatorPut(this)"><></button>
                                            <button attr="And" class="btn btn-default margin-boton" onclick="buttonOperatorPut(this)">And</button>
                                            <button attr="Or" class="btn btn-default margin-boton" onclick="buttonOperatorPut(this)">Or</button>
                                            <button attr="Not" class="btn btn-default margin-boton" onclick="buttonOperatorPut(this)">Not</button>
                                            <button attr="Like" class="btn btn-default margin-boton" onclick="buttonOperatorPut(this)">Like</button>
                                            <button attr="LAST" class="btn btn-default margin-boton" onclick="buttonOperatorPut(this)">Last</button>

                                        </div>

                                        <div id="list_uniques_values" class="col-md-5 pull-right" style="margin-right: 15px; margin-bottom: 15px;">

                                            <div class="form-group">
                                                <label>Obtener lista de valores unicos:</label>
                                                <select id="select_uniques" class="form-control" size="5">
                                                </select>

                                            </div>

                                            <button class="btn btn-success pull-right" onclick="listarUniques()">Listar</button>

                                        </div>



                                        <div id="query_construct" class="col-md-11 query_construct">

                                            <textarea class="form-control rounded-0" id="text_area_query" rows="10"></textarea>

                                        </div>
                                        <h4 class="text_info_fecha">Para Insertar valores de fecha use la siguiente notación 'YYYY-MM-DD'</h4>

                                    </div>




                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                    <button type="button" class="btn btn-success" data-dismiss="modal" onclick="applyFiltro()">Aplicar</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div> <!--vid box-->

            </div>
            <!--div resut-->
            <div class="col-xs-12 col-sm-12">

                <div class="box box-success">
                    <div class="box-header">
                        <h3 class="box-title" style="color: green;">Resultado</h3>
                    </div>

                    <div id="box_body" class="box-body table-responsive">









                    </div>
                </div>

            </div>

        </div>
     </section>
</div>
<?= $this->element('footer')?>

