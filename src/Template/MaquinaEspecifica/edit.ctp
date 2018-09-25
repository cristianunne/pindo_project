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

            <?= $this->Form->create($maquina_esp, ['id' => 'myform', 'novalidate']) ?>
                <!-- left column -->
                <div class="col-md-6" style="float: none; margin: 0 auto">
                    <!-- Form Element sizes -->
                    <div class="box box-success">
                        <div class="box-header with-border">
                            <h3 class="box-title">Editar Maquina Específica</h3>
                        </div>
                        <div class="box-body">
                            <?= $this->Form->input('modelo', ['class' => 'form-control', 'placeholder' => 'Modelo', 'label' => 'Modelo', 'required']) ?>
                            <br>
                            <?= $this->Form->input('nombre', ['class' => 'form-control', 'placeholder' => 'Nombre', 'label' => 'Nombre', 'required']) ?>
                            <br>
                            <?= $this->Form->input('cosecha', ['options' => ['Poda' => 'Poda', 'Raleo' => 'Raleo', 'Talaraza' => 'Talaraza'], 'empty' => '(Elija una opción)', 'class' => 'form-control', 'placeholder' => 'Cosecha', 'label' => 'Cosecha', 'required']) ?>
                            <br>
                            <?= $this->Form->input('tarea', ['class' => 'form-control', 'placeholder' => 'Tarea', 'label' => 'Tarea', 'required']) ?>
                            <br>
                            <?= $this->Form->input('act_costos', ['class' => 'form-control', 'placeholder' => 'Act_costos', 'label' => 'Act_costos', 'required']) ?>
                            <br>
                            <?= $this->Form->input('eficiencia', ['class' => 'form-control', 'placeholder' => 'Eficiencia', 'label' => 'Eficiencia', 'required']) ?>
                            <br>

                            <?= $this->Form->input('tasa_seguro', ['class' => 'form-control', 'placeholder' => 'Tasa Seguro', 'label' => 'Tasa Seguro', 'required']) ?>
                            <br>
                            <?= $this->Form->input('valor_maquina', ['class' => 'form-control', 'placeholder' => 'Valor Maquina', 'label' => 'Valor Maquina', 'required']) ?>
                            <br>
                            <?= $this->Form->input('va_imp', ['class' => 'form-control', 'placeholder' => 'va_imp', 'label' => true, 'required']) ?>
                            <br>
                            <?= $this->Form->input('va_sis_rod_maq', ['class' => 'form-control', 'placeholder' => 'va_sis_rod_maq', 'label' => true, 'required']) ?>
                            <br>
                            <?= $this->Form->input('va_sis_rod_imp', ['class' => 'form-control', 'placeholder' => 'va_sis_rod_imp', 'label' => true, 'required']) ?>
                            <br>
                            <?= $this->Form->input('vida_util_maq', ['class' => 'form-control', 'placeholder' => 'vida_util_maq', 'label' => true, 'required']) ?>
                            <br>

                            <?= $this->Form->input('vida_util_maq_year', ['class' => 'form-control', 'placeholder' => 'vida_util_maq_year', 'label' => true, 'required']) ?>
                            <br>
                            <?= $this->Form->input('vida_util_imp', ['class' => 'form-control', 'placeholder' => 'vida_util_imp', 'label' => true, 'required']) ?>
                            <br>
                            <?= $this->Form->input('vida_util_imp_year', ['class' => 'form-control', 'placeholder' => 'vida_util_imp_year', 'label' => true, 'required']) ?>
                            <br>
                            <?= $this->Form->input('vida_util_srod_maq', ['class' => 'form-control', 'placeholder' => 'vida_util_srod_maq', 'label' => true, 'required']) ?>
                            <br>
                            <?= $this->Form->input('vida_util_srod_imp', ['class' => 'form-control', 'placeholder' => 'vida_util_srod_imp', 'label' => true, 'required']) ?>
                            <br>
                            <?= $this->Form->input('fac_arreglo_mec', ['class' => 'form-control', 'placeholder' => 'fac_arreglo_mec', 'label' => true, 'required']) ?>
                            <br>

                            <?= $this->Form->input('leasing_credito', ['options' => [0 => 'No', 1 => 'Si'], 'empty' => '(Elija una opción)', 'class' => 'form-control', 'placeholder' => 'leasing_credito', 'label' => true, 'required']) ?>




                            <br>
                            <?= $this->Form->input('cuota_maq_mes', ['class' => 'form-control', 'placeholder' => 'cuota_maq_mes', 'label' => true, 'required']) ?>
                            <br>
                            <?= $this->Form->input('cuota_mes_imp', ['class' => 'form-control', 'placeholder' => 'cuota_mes_imp', 'label' => true, 'required']) ?>
                            <br>
                            <?= $this->Form->input('fac_var_res', ['class' => 'form-control', 'placeholder' => 'fac_var_res', 'label' => true, 'required']) ?>
                            <br>
                            <?= $this->Form->input('cons_comb', ['class' => 'form-control', 'placeholder' => 'cons_comb', 'label' => true, 'required']) ?>
                            <br>
                            <?= $this->Form->input('con_aceite_motor', ['class' => 'form-control', 'placeholder' => 'con_aceite_motor', 'label' => true, 'required']) ?>
                            <br>

                            <?= $this->Form->input('con_aceite_trans', ['class' => 'form-control', 'placeholder' => 'con_aceite_trans', 'label' => true, 'required']) ?>
                            <br>
                            <?= $this->Form->input('con_aceite_hidra', ['class' => 'form-control', 'placeholder' => 'con_aceite_hidra', 'label' => true, 'required']) ?>
                            <br>
                            <?= $this->Form->input('con_grasa', ['class' => 'form-control', 'placeholder' => 'con_grasa', 'label' => true, 'required']) ?>
                            <br>
                            <?= $this->Form->input('costo_hora_filtros', ['class' => 'form-control', 'placeholder' => 'costo_hora_filtros', 'label' => true, 'required']) ?>
                            <br>
                            <?= $this->Form->input('manten_horugas_horas', ['class' => 'form-control', 'placeholder' => 'manten_horugas_horas', 'label' => true, 'required']) ?>
                            <br>
                            <?= $this->Form->input('mangueras_horas', ['class' => 'form-control', 'placeholder' => 'mangueras_horas', 'label' => true, 'required']) ?>
                            <br>

                            <?= $this->Form->input('ant_operario', ['class' => 'form-control', 'placeholder' => 'ant_operario', 'label' => true, 'required']) ?>
                            <br>
                            <?= $this->Form->input('sal_basico_mes', ['class' => 'form-control', 'placeholder' => 'sal_basico_mes', 'label' => true, 'required']) ?>
                            <br>
                            <?= $this->Form->input('aceite_cadena_hora', ['class' => 'form-control', 'placeholder' => 'aceite_cadena_hora', 'label' => true, 'required']) ?>
                            <br>
                            <?= $this->Form->input('espada_hora', ['class' => 'form-control', 'placeholder' => 'espada_hora', 'label' => true, 'required']) ?>
                            <br>
                            <?= $this->Form->input('cadena_hora', ['class' => 'form-control', 'placeholder' => 'cadena_hora', 'label' => true, 'required']) ?>
                            <br>
                            <?= $this->Form->input('n_turnos', ['class' => 'form-control', 'placeholder' => 'n_turnos', 'label' => true, 'required']) ?>
                            <br>
                            <?= $this->Form->input('horas_dia', ['class' => 'form-control', 'placeholder' => 'horas_dia', 'label' => true, 'required']) ?>
                            <br>
                        </div>

                        <div class="box-footer">
                            <?= $this->Form->button('Editar', ['class' => 'btn btn-success pull-right']) ?>
                            <?= $this->Html->link('Volver', ['controller' => 'Emsefor', 'action' => 'view', '?' => ['Accion' => 'Ver Emsefor', 'Categoria' => 'Emsefor', 'id_ems' => $id_ems]],
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