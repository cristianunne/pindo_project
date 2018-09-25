<?php
use Migrations\AbstractMigration;

class Pindo extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function up()
    {

        $this->table('empresa', ['id' => false, 'primary_key' => ['idempresa']])
            ->addColumn('idempresa', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('nombre', 'string', [
                'default' => null,
                'limit' => 45,
                'null' => false,
            ])
            ->addColumn('domicilio', 'string', [
                'default' => null,
                'limit' => 100,
                'null' => true,
            ])
            ->addColumn('telefono', 'string', [
                'default' => null,
                'limit' => 45,
                'null' => true,
            ])
            ->addColumn('email', 'string', [
                'default' => null,
                'limit' => 45,
                'null' => true,
            ])
            ->addColumn('propietario', 'boolean', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->create();


        $this->table('ems_maq', ['id' => false, 'primary_key' => ['emsefor_idemsefor', 'maquinas_idmaquinas', 'maquina_especifica_idmaquina_especifica']])
            ->addColumn('emsefor_idemsefor', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('maquinas_idmaquinas', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('maquina_especifica_idmaquina_especifica', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addIndex(
                [
                    'emsefor_idemsefor',
                ]
            )
            ->addIndex(
                [
                    'maquina_especifica_idmaquina_especifica',
                ]
            )
            ->addIndex(
                [
                    'maquinas_idmaquinas',
                ]
            )
            ->create();

        $this->table('emsefor', ['id' => false, 'primary_key' => ['idemsefor']])
            ->addColumn('idemsefor', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('nombre', 'string', [
                'default' => null,
                'limit' => 100,
                'null' => false,
            ])
            ->addColumn('contratista', 'string', [
                'default' => null,
                'limit' => 100,
                'null' => false,
            ])
            ->addColumn('domicilio', 'string', [
                'default' => null,
                'limit' => 100,
                'null' => false,
            ])
            ->addColumn('telefono', 'string', [
                'default' => null,
                'limit' => 45,
                'null' => true,
            ])
            ->addColumn('email', 'string', [
                'default' => null,
                'limit' => 45,
                'null' => true,
            ])
            ->create();

        $this->table('gis', ['id' => false, 'primary_key' => ['idgis']])
            ->addColumn('idgis', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('superficie', 'float', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('perimetro', 'float', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('departamento', 'string', [
                'default' => null,
                'limit' => 10,
                'null' => true,
            ])
            ->addColumn('municipio', 'string', [
                'default' => null,
                'limit' => 10,
                'null' => true,
            ])
            ->addColumn('seccion', 'string', [
                'default' => null,
                'limit' => 10,
                'null' => true,
            ])
            ->addColumn('chacra', 'string', [
                'default' => null,
                'limit' => 10,
                'null' => true,
            ])
            ->addColumn('manzana', 'string', [
                'default' => null,
                'limit' => 10,
                'null' => true,
            ])
            ->addColumn('parcela', 'string', [
                'default' => null,
                'limit' => 10,
                'null' => true,
            ])
            ->addColumn('sub_parcela', 'string', [
                'default' => null,
                'limit' => 10,
                'null' => true,
            ])
            ->addColumn('partida', 'string', [
                'default' => null,
                'limit' => 10,
                'null' => true,
            ])
            ->addColumn('rodales_idrodales', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addIndex(
                [
                    'rodales_idrodales',
                ]
            )
            ->create();

        $this->table('info_intervencion', ['id' => false, 'primary_key' => ['intervencion_idintervencion']])
            ->addColumn('intervencion_idintervencion', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('cod_sap', 'string', [
                'default' => null,
                'limit' => 45,
                'null' => true,
            ])
            ->addColumn('fecha', 'date', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('arb_ha', 'string', [
                'default' => null,
                'limit' => 45,
                'null' => true,
            ])
            ->addColumn('arb_podados', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addColumn('arb_alt_deseada', 'float', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('alt_poda', 'float', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('arb_no_podados', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addColumn('dap', 'float', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('altura', 'float', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('dmsm', 'float', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('porc_removido', 'float', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->create();


        $this->table('intervenciones', ['id' => false, 'primary_key' => ['idintervencion']])
            ->addColumn('idintervencion', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('fecha', 'date', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('nro', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('tipo_intervencion', 'text', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('levante', 'string', [
                'default' => null,
                'limit' => 45,
                'null' => true,
            ])
            ->addColumn('intensidad', 'string', [
                'default' => null,
                'limit' => 45,
                'null' => true,
            ])
            ->addColumn('criterio', 'string', [
                'default' => null,
                'limit' => 45,
                'null' => true,
            ])
            ->addColumn('rodales_idrodales', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('emsefor_idemsefor', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addIndex(
                [
                    'emsefor_idemsefor',
                ]
            )
            ->addIndex(
                [
                    'rodales_idrodales',
                ]
            )
            ->create();

        $this->table('inventario', ['id' => false, 'primary_key' => ['idinventario']])
            ->addColumn('idinventario', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('cod_sap', 'string', [
                'default' => null,
                'limit' => 45,
                'null' => true,
            ])
            ->addColumn('fecha', 'date', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('num_arbol', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addColumn('dap_1', 'float', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('dap_2', 'float', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('altura', 'float', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('forma', 'string', [
                'default' => null,
                'limit' => 45,
                'null' => true,
            ])
            ->addColumn('dano', 'string', [
                'default' => null,
                'limit' => 45,
                'null' => true,
            ])
            ->addColumn('tipo_inventario', 'text', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('rodales_idrodales', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('emsefor_idemsefor', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('intervencion_idintervencion', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addColumn('modifica', 'boolean', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addIndex(
                [
                    'emsefor_idemsefor',
                ]
            )
            ->addIndex(
                [
                    'intervencion_idintervencion',
                ]
            )
            ->addIndex(
                [
                    'rodales_idrodales',
                ]
            )
            ->create();

        $this->table('maquina_especifica', ['id' => false, 'primary_key' => ['idmaquina_especifica']])
            ->addColumn('idmaquina_especifica', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('modelo', 'string', [
                'default' => null,
                'limit' => 145,
                'null' => true,
            ])
            ->addColumn('nombre', 'string', [
                'default' => null,
                'limit' => 145,
                'null' => true,
            ])
            ->addColumn('cosecha', 'string', [
                'default' => null,
                'limit' => 145,
                'null' => true,
            ])
            ->addColumn('tarea', 'string', [
                'default' => null,
                'limit' => 45,
                'null' => true,
            ])
            ->addColumn('act_costos', 'date', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('eficiencia', 'float', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('tasa_seguro', 'float', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('valor_maquina', 'float', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('va_imp', 'float', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('va_sis_rod_maq', 'float', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('va_sis_rod_imp', 'float', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('vida_util_maq', 'string', [
                'default' => null,
                'limit' => 8,
                'null' => true,
            ])
            ->addColumn('vida_util_maq_year', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addColumn('vida_util_imp', 'string', [
                'default' => null,
                'limit' => 8,
                'null' => true,
            ])
            ->addColumn('vida_util_imp_year', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addColumn('vida_util_srod_maq', 'string', [
                'default' => null,
                'limit' => 8,
                'null' => true,
            ])
            ->addColumn('vida_util_srod_imp', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addColumn('fac_arreglo_mec', 'float', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('leasing_credito', 'boolean', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('cuota_maq_mes', 'float', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('cuota_mes_imp', 'float', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('fac_var_res', 'float', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('cons_comb', 'float', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('con_aceite_motor', 'float', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('con_aceite_trans', 'float', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('con_aceite_hidra', 'float', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('con_grasa', 'float', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('costo_hora_filtros', 'float', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('manten_horugas_horas', 'float', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('mangueras_horas', 'float', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('ant_operario', 'float', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('sal_basico_mes', 'float', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('aceite_cadena_hora', 'float', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('espada_hora', 'float', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('cadena_hora', 'float', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('n_turnos', 'float', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('horas_dia', 'float', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->create();

        $this->table('maquinas', ['id' => false, 'primary_key' => ['idmaquinas']])
            ->addColumn('idmaquinas', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('marca', 'string', [
                'default' => null,
                'limit' => 45,
                'null' => false,
            ])
            ->addColumn('modelo', 'string', [
                'default' => null,
                'limit' => 45,
                'null' => false,
            ])
            ->addColumn('photo', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ])
            ->addColumn('photo_dir', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ])
            ->create();

        $this->table('parcelas_gis', ['id' => false, 'primary_key' => ['idparcelas_gis', 'intervencion_idintervencion']])
            ->addColumn('idparcelas_gis', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('intervencion_idintervencion', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('superficie', 'float', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('perimetro', 'float', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addIndex(
                [
                    'intervencion_idintervencion',
                ]
            )
            ->create();

        $this->table('plantaciones', ['id' => false, 'primary_key' => ['nro_plantacion']])
            ->addColumn('nro_plantacion', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('rodales_idrodales', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('fecha', 'date', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('superficie', 'float', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('densidad', 'float', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('distribucion', 'string', [
                'default' => null,
                'limit' => 45,
                'null' => true,
            ])
            ->addColumn('emsefor_idemsefor', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('procedencias_idprocedencias', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addIndex(
                [
                    'emsefor_idemsefor',
                ]
            )
            ->addIndex(
                [
                    'procedencias_idprocedencias',
                ]
            )
            ->addIndex(
                [
                    'rodales_idrodales',
                ]
            )
            ->create();

        $this->table('procedencias', ['id' => false, 'primary_key' => ['idprocedencias']])
            ->addColumn('idprocedencias', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('nombre', 'string', [
                'default' => null,
                'limit' => 100,
                'null' => false,
            ])
            ->addColumn('especie', 'string', [
                'default' => null,
                'limit' => 45,
                'null' => true,
            ])
            ->addColumn('origen', 'string', [
                'default' => null,
                'limit' => 45,
                'null' => true,
            ])
            ->addColumn('mejora', 'string', [
                'default' => null,
                'limit' => 45,
                'null' => true,
            ])
            ->addColumn('vivero', 'string', [
                'default' => null,
                'limit' => 45,
                'null' => true,
            ])
            ->create();

        $this->table('rodal_sagpya', ['id' => false, 'primary_key' => ['rodales_idrodales', 'sagpya_idsagpya']])
            ->addColumn('rodales_idrodales', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('sagpya_idsagpya', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addIndex(
                [
                    'rodales_idrodales',
                ]
            )
            ->addIndex(
                [
                    'sagpya_idsagpya',
                ]
            )
            ->create();

        $this->table('rodales', ['id' => false, 'primary_key' => ['idrodales']])
            ->addColumn('idrodales', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('cod_sap', 'string', [
                'default' => null,
                'limit' => 45,
                'null' => true,
            ])
            ->addColumn('campo', 'string', [
                'default' => null,
                'limit' => 45,
                'null' => true,
            ])
            ->addColumn('uso', 'string', [
                'default' => null,
                'limit' => 45,
                'null' => true,
            ])
            ->addColumn('finalizado', 'boolean', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('empresa_idempresa', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addIndex(
                [
                    'empresa_idempresa',
                ]
            )
            ->create();

        $this->table('sagpyas', ['id' => false, 'primary_key' => ['idsagpya']])
            ->addColumn('idsagpya', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('cod_sap', 'string', [
                'default' => null,
                'limit' => 20,
                'null' => true,
            ])
            ->addColumn('operaciones', 'string', [
                'default' => null,
                'limit' => 45,
                'null' => true,
            ])
            ->addColumn('fecha', 'date', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('sup_aprobada', 'float', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('expediente', 'string', [
                'default' => null,
                'limit' => 45,
                'null' => true,
            ])
            ->addColumn('turno_minimo', 'string', [
                'default' => null,
                'limit' => 45,
                'null' => true,
            ])
            ->create();

        $this->table('users')
            ->addColumn('email', 'string', [
                'default' => null,
                'limit' => 100,
                'null' => false,
            ])
            ->addColumn('password', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('firstname', 'string', [
                'default' => null,
                'limit' => 100,
                'null' => true,
            ])
            ->addColumn('lastname', 'string', [
                'default' => null,
                'limit' => 100,
                'null' => true,
            ])
            ->addColumn('role', 'text', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('active', 'boolean', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('photo', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ])
            ->addColumn('photo_dir', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ])
            ->addIndex(
                [
                    'email',
                ],
                ['unique' => true]
            )
            ->create();

        $this->table('ems_maq')
            ->addForeignKey(
                'emsefor_idemsefor',
                'emsefor',
                'idemsefor',
                [
                    'update' => 'NO_ACTION',
                    'delete' => 'CASCADE'
                ]
            )
            ->addForeignKey(
                'maquina_especifica_idmaquina_especifica',
                'maquina_especifica',
                'idmaquina_especifica',
                [
                    'update' => 'NO_ACTION',
                    'delete' => 'CASCADE'
                ]
            )
            ->addForeignKey(
                'maquinas_idmaquinas',
                'maquinas',
                'idmaquinas',
                [
                    'update' => 'NO_ACTION',
                    'delete' => 'CASCADE'
                ]
            )
            ->update();

        $this->table('gis')
            ->addForeignKey(
                'rodales_idrodales',
                'rodales',
                'idrodales',
                [
                    'update' => 'NO_ACTION',
                    'delete' => 'NO_ACTION'
                ]
            )
            ->update();

        $this->table('info_intervencion')
            ->addForeignKey(
                'intervencion_idintervencion',
                'intervenciones',
                'idintervencion',
                [
                    'update' => 'NO_ACTION',
                    'delete' => 'CASCADE'
                ]
            )
            ->update();

        $this->table('intervenciones')
            ->addForeignKey(
                'emsefor_idemsefor',
                'emsefor',
                'idemsefor',
                [
                    'update' => 'NO_ACTION',
                    'delete' => 'NO_ACTION'
                ]
            )
            ->addForeignKey(
                'rodales_idrodales',
                'rodales',
                'idrodales',
                [
                    'update' => 'NO_ACTION',
                    'delete' => 'CASCADE'
                ]
            )
            ->update();

        $this->table('inventario')
            ->addForeignKey(
                'emsefor_idemsefor',
                'emsefor',
                'idemsefor',
                [
                    'update' => 'NO_ACTION',
                    'delete' => 'NO_ACTION'
                ]
            )
            ->addForeignKey(
                'intervencion_idintervencion',
                'intervenciones',
                'idintervencion',
                [
                    'update' => 'NO_ACTION',
                    'delete' => 'NO_ACTION'
                ]
            )
            ->addForeignKey(
                'rodales_idrodales',
                'rodales',
                'idrodales',
                [
                    'update' => 'NO_ACTION',
                    'delete' => 'CASCADE'
                ]
            )
            ->update();

        $this->table('parcelas_gis')
            ->addForeignKey(
                'intervencion_idintervencion',
                'intervenciones',
                'idintervencion',
                [
                    'update' => 'NO_ACTION',
                    'delete' => 'CASCADE'
                ]
            )
            ->update();

        $this->table('plantaciones')
            ->addForeignKey(
                'emsefor_idemsefor',
                'emsefor',
                'idemsefor',
                [
                    'update' => 'NO_ACTION',
                    'delete' => 'NO_ACTION'
                ]
            )
            ->addForeignKey(
                'procedencias_idprocedencias',
                'procedencias',
                'idprocedencias',
                [
                    'update' => 'NO_ACTION',
                    'delete' => 'NO_ACTION'
                ]
            )
            ->addForeignKey(
                'rodales_idrodales',
                'rodales',
                'idrodales',
                [
                    'update' => 'NO_ACTION',
                    'delete' => 'CASCADE'
                ]
            )
            ->update();

        $this->table('rodal_sagpya')
            ->addForeignKey(
                'rodales_idrodales',
                'rodales',
                'idrodales',
                [
                    'update' => 'NO_ACTION',
                    'delete' => 'CASCADE'
                ]
            )
            ->addForeignKey(
                'sagpya_idsagpya',
                'sagpyas',
                'idsagpya',
                [
                    'update' => 'NO_ACTION',
                    'delete' => 'CASCADE'
                ]
            )
            ->update();

        $this->table('rodales')
            ->addForeignKey(
                'empresa_idempresa',
                'empresa',
                'idempresa',
                [
                    'update' => 'NO_ACTION',
                    'delete' => 'NO_ACTION'
                ]
            )
            ->update();
    }

    public function down()
    {
        $this->table('ems_maq')
            ->dropForeignKey(
                'emsefor_idemsefor'
            )
            ->dropForeignKey(
                'maquina_especifica_idmaquina_especifica'
            )
            ->dropForeignKey(
                'maquinas_idmaquinas'
            );

        $this->table('gis')
            ->dropForeignKey(
                'rodales_idrodales'
            );

        $this->table('info_intervencion')
            ->dropForeignKey(
                'intervencion_idintervencion'
            );

        $this->table('intervenciones')
            ->dropForeignKey(
                'emsefor_idemsefor'
            )
            ->dropForeignKey(
                'rodales_idrodales'
            );

        $this->table('inventario')
            ->dropForeignKey(
                'emsefor_idemsefor'
            )
            ->dropForeignKey(
                'intervencion_idintervencion'
            )
            ->dropForeignKey(
                'rodales_idrodales'
            );

        $this->table('parcelas_gis')
            ->dropForeignKey(
                'intervencion_idintervencion'
            );

        $this->table('plantaciones')
            ->dropForeignKey(
                'emsefor_idemsefor'
            )
            ->dropForeignKey(
                'procedencias_idprocedencias'
            )
            ->dropForeignKey(
                'rodales_idrodales'
            );

        $this->table('rodal_sagpya')
            ->dropForeignKey(
                'rodales_idrodales'
            )
            ->dropForeignKey(
                'sagpya_idsagpya'
            );

        $this->table('rodales')
            ->dropForeignKey(
                'empresa_idempresa'
            );

        $this->dropTable('empresa');
        $this->dropTable('ems_maq');
        $this->dropTable('emsefor');
        $this->dropTable('gis');
        $this->dropTable('info_intervencion');
        $this->dropTable('intervenciones');
        $this->dropTable('inventario');
        $this->dropTable('maquina_especifica');
        $this->dropTable('maquinas');
        $this->dropTable('parcelas_gis');
        $this->dropTable('plantaciones');
        $this->dropTable('procedencias');
        $this->dropTable('rodal_sagpya');
        $this->dropTable('rodales');
        $this->dropTable('sagpyas');
        $this->dropTable('users');
    }


}
