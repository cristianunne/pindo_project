<?= $this->Html->css('Simnea/simnea.css') ?>

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

            <?= $this->Form->create() ?>
            <div class="container-fluid">
                <div class="row" id="contenedor_principal_simnea">
                    <!-- CARGAR LOS DATOS DEL SITIO-->
                    <div id="simnea_datos_sitio" class="col-md-10 col-xs-10 col-sm-10" style="float: none; margin: auto auto; background-color: #ececec;padding: 15px 15px 15px 15px;">
                        <div class="callout callout-info">
                            <h4>ESPECIFICAR DATOS DEL SITIO:</h4>
                        </div>

                        <div class="box box-info container">
                                    <div class="row">
                                        <div class="col-md-7">
                                            <div class="box-header">
                                                <h3 class="box-title" style="color: green;">Identificación del Rodal</h3>
                                            </div>
                                            <table class="table">
                                                <tbody>

                                                    <tr>
                                                        <td class="row-label" style="vertical-align: middle; border-top: 1px solid #ddd;" > <label for="cod_sap">Código Sitio (SAP):</label></td>

                                                        <td style="border-top: 1px solid #ddd;"> <?= $this->Form->input('cod_sap', ['value' => $rodales->cod_sap, 'class' => 'form-control', 'label' => false, 'id' => 'cod_sap', 'required']) ?> </td>
                                                    </tr>

                                                    <tr>
                                                        <td class="row-label" style="vertical-align: middle;" > <label for="campo">Campo:</label></td>

                                                        <td > <?= $this->Form->input('campo', ['value' => $rodales->campo, 'class' => 'form-control', 'label' => false, 'id' => 'campo', 'required']) ?> </td>
                                                    </tr>

                                                    <tr>
                                                        <td class="row-label" style="vertical-align: middle;" > <label for="poligono">Poligono:</label></td>

                                                        <td > <?= $this->Form->input('poligono', ['value' => $rodales->idrodales, 'class' => 'form-control', 'label' => false, 'id' => 'poligono', 'required']) ?> </td>
                                                    </tr>

                                                    <tr>
                                                        <td class="row-label" style="vertical-align: middle;" > <label for="Superficie">Superficie:</label></td>

                                                        <td > <?= $this->Form->input('superficie', ['type' => 'number', 'class' => 'form-control', 'label' => false, 'id' => 'Superficie', 'required']) ?> </td>
                                                        <td id="label-units"><label for="Superficie">ha</label></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="row-label" style="vertical-align: middle;" > <label for="Especie">Especie:</label></td>

                                                        <?php
                                                        if (isset($rodales->plantacione->procedencia->especie)){
                                                            ?>
                                                            <td > <?= $this->Form->input('especie', ['value' => $rodales->plantacione->procedencia->especie, 'class' => 'form-control', 'label' => false, 'id' => 'Especie', 'required']) ?> </td>
                                                            <?php
                                                        } else {
                                                        ?>
                                                            <td > <?= $this->Form->input('especie', ['class' => 'form-control', 'label' => false, 'id' => 'Especie', 'required']) ?> </td>

                                                            <?php
                                                        }
                                                        ?>
                                                    </tr>

                                                    <tr>
                                                        <td class="row-label" style="vertical-align: middle;" > <label for="dme">DME:</label></td>

                                                        <td > <?= $this->Form->input('dme', ['type' => 'number', 'class' => 'form-control', 'label' => false, 'id' => 'dme', 'required']) ?> </td>
                                                        <td id="label-units"><label for="dme">m</label></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="row-label" style="vertical-align: middle;" > <label for="pendiente">Pendiente:</label></td>

                                                        <td > <?= $this->Form->input('pendiente', ['type' => 'number', 'step' => '0.01' , 'class' => 'form-control', 'label' => false, 'id' => 'pendiente', 'required']) ?> </td>

                                                        <td id="label-units"><label for="pendiente">Decimal</label></td>
                                                    </tr>


                                                </tbody>
                                            </table>

                                        </div>
                                        <div class="col-md-7">
                                            <div class="box-header">
                                                <h3 class="box-title" style="color: green;">Características Dasométricas</h3>
                                            </div>
                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <td class="row-label" style="vertical-align: middle;" > <label for="Dist_lineas">Distancia entre Líneas:</label></td>

                                                        <?php
                                                        if (isset($rodales->plantacione->dist_lineas)){
                                                            ?>
                                                            <td > <?= $this->Form->input('dist_lineas', ['type' => 'number', 'value' => $rodales->plantacione->dist_lineas, 'class' => 'form-control', 'label' => false, 'id' => 'Dist_lineas', 'required']) ?> </td>
                                                            <?php
                                                        } else {
                                                            ?>
                                                            <td > <?= $this->Form->input('dist_lineas', ['type' => 'number', 'class' => 'form-control', 'label' => false, 'id' => 'Dist_lineas', 'required']) ?> </td>

                                                            <?php
                                                        }
                                                        ?>

                                                        <td id="label-units"><label for="Dist_lineas">m</label></td>
                                                    </tr>


                                                    <tr>
                                                        <td class="row-label" style="vertical-align: middle;" > <label for="num_arboles">N° de Árboles:</label></td>

                                                        <?php
                                                        if (isset($inventario->num_arbol)){
                                                            ?>
                                                            <td > <?= $this->Form->input('num_arboles', ['type' => 'number', 'value' => $inventario->num_arbol, 'class' => 'form-control', 'label' => false, 'id' => 'num_arboles', 'required']) ?> </td>
                                                            <?php
                                                        } else {
                                                            ?>
                                                            <td > <?= $this->Form->input('num_arboles', ['type' => 'number', 'class' => 'form-control', 'label' => false, 'id' => 'num_arboles', 'required']) ?> </td>

                                                            <?php
                                                        }
                                                        ?>
                                                        <td id="label-units"><label for="num_arboles">árboles/ha</label></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="row-label" style="vertical-align: middle;" > <label for="vol_medio">Vol. Árbol Medio:</label></td>

                                                        <?php
                                                        if (isset($inventario->vol_medio)){
                                                            ?>
                                                            <td > <?= $this->Form->input('vol_medio', ['value' => $inventario->vol_medio, 'class' => 'form-control', 'label' => false, 'id' => 'vol_medio', 'required', 'onchange' => 'calc_vol_total(this)']) ?> </td>
                                                            <?php
                                                        } else {
                                                            ?>
                                                            <td > <?= $this->Form->input('vol_medio', ['class' => 'form-control', 'label' => false, 'id' => 'vol_medio', 'required', 'onchange' => 'calc_vol_total(this)']) ?> </td>

                                                            <?php
                                                        }
                                                        ?>
                                                        <td id="label-units"><label for="vol_medio">m³/árbol</label></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="row-label" style="vertical-align: middle;" > <label for="vol_total">Vol. Total por hectárea:</label></td>

                                                        <?php
                                                        if (isset($inventario->vol_total)){
                                                            ?>
                                                            <td > <?= $this->Form->input('vol_total', ['type' => 'number', 'value' => $inventario->vol_total, 'class' => 'form-control', 'label' => false, 'id' => 'vol_total', 'required']) ?> </td>
                                                            <?php
                                                        } else {
                                                            ?>
                                                            <td > <?= $this->Form->input('vol_total', ['type' => 'number', 'class' => 'form-control', 'label' => false, 'id' => 'vol_total', 'required']) ?> </td>

                                                            <?php
                                                        }
                                                        ?>
                                                        <td id="label-units"><label for="vol_total">m³/ha</label></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="row-label" style="vertical-align: middle;" > <label for="dap">DAP:</label></td>

                                                        <?php
                                                        if (isset($inventario->dap)){
                                                            ?>
                                                            <td > <?= $this->Form->input('dap', ['type' => 'number', 'value' => $inventario->dap, 'class' => 'form-control', 'label' => false, 'id' => 'dap', 'required']) ?> </td>
                                                            <?php
                                                        } else {
                                                            ?>
                                                            <td > <?= $this->Form->input('dap', ['type' => 'number', 'class' => 'form-control', 'label' => false, 'id' => 'dap', 'required']) ?> </td>

                                                            <?php
                                                        }
                                                        ?>
                                                        <td id="label-units"><label for="dap">cm</label></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="row-label" style="vertical-align: middle;" > <label for="altura">Altura:</label></td>

                                                        <?php
                                                        if (isset($inventario->altura)){
                                                            ?>
                                                            <td > <?= $this->Form->input('altura', ['type' => 'number', 'value' => $inventario->altura, 'class' => 'form-control', 'label' => false, 'id' => 'altura', 'required']) ?> </td>
                                                            <?php
                                                        } else {
                                                            ?>
                                                            <td > <?= $this->Form->input('altura', ['type' => 'number', 'class' => 'form-control', 'label' => false, 'id' => 'altura', 'required']) ?> </td>

                                                            <?php
                                                        }
                                                        ?>
                                                        <td id="label-units"><label for="altura">m</label></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="row-label" style="vertical-align: middle;" > <label for="area_basal">Área Basal:</label></td>

                                                        <?php
                                                        if (isset($inventario->altura)){
                                                            ?>
                                                            <td > <?= $this->Form->input('area_basal', ['type' => 'number', 'value' => $inventario->area_basal, 'class' => 'form-control', 'label' => false, 'id' => 'area_basal', 'required']) ?> </td>
                                                            <?php
                                                        } else {
                                                            ?>
                                                            <td > <?= $this->Form->input('area_basal', ['type' => 'number', 'class' => 'form-control', 'label' => false, 'id' => 'area_basal', 'required']) ?> </td>

                                                            <?php
                                                        }
                                                        ?>
                                                        <td id="label-units"><label for="area_basal">m²/ha</label></td>
                                                    </tr>


                                                </tbody>
                                            </table>
                                        </div>

                                        <div class="col-md-7">

                                            <div class="box-header">
                                                <h3 class="box-title" style="color: green;">Características de la Operación</h3>
                                            </div>

                                            <table class="table">
                                                <tbody>

                                                    <tr>
                                                        <td class="row-label" style="vertical-align: middle;" > <label for="dhp">Dist. hasta la Planchada:</label></td>

                                                        <td > <?= $this->Form->input('dhp', ['type' => 'number', 'class' => 'form-control', 'label' => false, 'id' => 'dhp', 'required']) ?> </td>

                                                        <td id="label-units"><label for="dhp">m</label></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="row-label" style="vertical-align: middle;" > <label for="Dist_vias">Distancia entre vías de extracción:</label></td>

                                                        <td > <?= $this->Form->input('dist_vias', ['type' => 'number', 'class' => 'form-control', 'label' => false, 'id' => 'Dist_vias', 'required', 'required']) ?> </td>

                                                        <td id="label-units"><label for="dist_vias">m</label></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="row-label" style="vertical-align: middle;" > <label for="intensidad_v">Intensidad de Cosecha:</label></td>

                                                        <td > <?= $this->Form->input('intensidad_v', ['type' => 'number', 'step' => '0.01', 'class' => 'form-control', 'label' => false, 'id' => 'intensidad_v', 'required', 'onchange' => 'calc_vol_cosechar(this)']) ?> </td>

                                                        <td id="label-units"><label for="intensidad_v">Decimal</label></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="row-label" style="vertical-align: middle;" > <label for="prop_vol_ap">Proporcion Volumen Aprovechado (%):</label></td>

                                                        <td > <?= $this->Form->input('prop_vol_ap', ['type' => 'number', 'class' => 'form-control', 'label' => false, 'id' => 'prop_vol_ap', 'required']) ?> </td>

                                                        <td id="label-units"><label for="prop_vol_ap">Decimal</label></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="row-label" style="vertical-align: middle;" > <label for="precio_cont">Precio Contratante ($/m3):</label></td>

                                                        <td > <?= $this->Form->input('precio_cont', ['type' => 'number', 'step' => '0.01', 'class' => 'form-control', 'label' => false, 'id' => 'precio_cont', 'required']) ?> </td>

                                                        <td id="label-units"><label for="precio_cont">$/m³</label></td>
                                                    </tr>


                                                </tbody>

                                            </table>

                                        </div>
                                        <div class="col-md-7">
                                            <div class="box-header">
                                                <h3 class="box-title" style="color: green;">Información</h3>
                                            </div>
                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <td class="row-label" style="vertical-align: middle;" > <label for="vol_cos">Volumen Total a Cosechar:</label></td>

                                                        <td > <?= $this->Form->input('vol_cos', ['type' => 'number', 'class' => 'form-control', 'label' => false, 'id' => 'vol_cos', 'required']) ?> </td>

                                                        <td id="label-units"><label for="vol_cos">m³/rodal</label></td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                            <div class="box-footer"  style="background-color: inherit; border-top: inherit;">

                                                <?= $this->Form->button($this->Html->tag('span', 'Siguiente', ['class' => 'glyphicon glyphicon-forward', 'aria-hidden' => 'true']),
                                                    ['class' => 'btn btn-primary pull-right', 'escape' => false]) ?>

                                            </div>
                                        </div>



                                    </div>

                                </div>

                    </div>

                </div> <!--vid box-->


            </div>
            <?= $this->Form->end() ?>
        </div>
    </section>
</div>

<?= $this->Html->script('simnea.js') ?>

<?= $this->element('footer')?>
