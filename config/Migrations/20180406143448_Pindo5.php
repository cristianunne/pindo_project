<?php
use Migrations\AbstractMigration;

class Pindo5 extends AbstractMigration
{
    public function up()
    {

        $this->table('empresa', ['id' => false, 'primary_key' => ['idempresa']])
            ->addColumn('idempresa', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 10,
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
                'limit' => 10,
                'null' => false,
            ])
            ->addColumn('maquinas_idmaquinas', 'integer', [
                'default' => null,
                'limit' => 10,
                'null' => false,
            ])
            ->addColumn('maquina_especifica_idmaquina_especifica', 'integer', [
                'default' => null,
                'limit' => 10,
                'null' => false,
            ])
            ->addIndex(
                [
                    'emsefor_idemsefor',
                ]
            )
            ->addIndex(
                [
                    'maquinas_idmaquinas',
                ]
            )
            ->addIndex(
                [
                    'maquina_especifica_idmaquina_especifica',
                ]
            )
            ->create();

        $this->table('emsefor', ['id' => false, 'primary_key' => ['idemsefor']])
            ->addColumn('idemsefor', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 10,
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

        $this->table('geography_columns', ['id' => false, 'primary_key' => ['']])
            ->addColumn('f_table_catalog', 'string', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('f_table_schema', 'string', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('f_table_name', 'string', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('f_geography_column', 'string', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('coord_dimension', 'integer', [
                'default' => null,
                'limit' => 10,
                'null' => true,
            ])
            ->addColumn('srid', 'integer', [
                'default' => null,
                'limit' => 10,
                'null' => true,
            ])
            ->addColumn('type', 'text', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->create();

        $this->table('geometry_columns', ['id' => false, 'primary_key' => ['']])
            ->addColumn('f_table_catalog', 'string', [
                'default' => null,
                'limit' => 256,
                'null' => true,
            ])
            ->addColumn('f_table_schema', 'string', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('f_table_name', 'string', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('f_geometry_column', 'string', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('coord_dimension', 'integer', [
                'default' => null,
                'limit' => 10,
                'null' => true,
            ])
            ->addColumn('srid', 'integer', [
                'default' => null,
                'limit' => 10,
                'null' => true,
            ])
            ->addColumn('type', 'string', [
                'default' => null,
                'limit' => 30,
                'null' => true,
            ])
            ->create();

        $this->table('gis', ['id' => false, 'primary_key' => ['idgis']])
            ->addColumn('idgis', 'integer', [
                'default' => null,
                'limit' => 10,
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
                'limit' => 10,
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
                'limit' => 10,
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
                'limit' => 10,
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
                'limit' => 10,
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
                'limit' => 10,
                'null' => false,
            ])
            ->addColumn('fecha', 'date', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('nro', 'integer', [
                'default' => null,
                'limit' => 10,
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
                'limit' => 10,
                'null' => false,
            ])
            ->addColumn('emsefor_idemsefor', 'integer', [
                'default' => null,
                'limit' => 10,
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
                'limit' => 10,
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
                'limit' => 10,
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
                'limit' => 10,
                'null' => false,
            ])
            ->addColumn('emsefor_idemsefor', 'integer', [
                'default' => null,
                'limit' => 10,
                'null' => false,
            ])
            ->addColumn('intervencion_idintervencion', 'integer', [
                'default' => null,
                'limit' => 10,
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
                'limit' => 10,
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
            ->addColumn('vida_util_maq', 'float', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('vida_util_maq_year', 'integer', [
                'default' => null,
                'limit' => 10,
                'null' => true,
            ])
            ->addColumn('vida_util_imp', 'float', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('vida_util_imp_year', 'integer', [
                'default' => null,
                'limit' => 10,
                'null' => true,
            ])
            ->addColumn('vida_util_srod_maq', 'float', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('vida_util_srod_imp', 'integer', [
                'default' => null,
                'limit' => 10,
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
            ->addColumn('leas_imp', 'boolean', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('tiene_costos', 'boolean', [
                'default' => false,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('tarea', 'string', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->create();

        $this->table('maquinas', ['id' => false, 'primary_key' => ['idmaquinas']])
            ->addColumn('idmaquinas', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 10,
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
            ->addColumn('tipo', 'string', [
                'default' => null,
                'limit' => 45,
                'null' => true,
            ])
            ->create();

        $this->table('modelos', ['id' => false, 'primary_key' => ['idmodelos']])
            ->addColumn('idmodelos', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 10,
                'null' => false,
            ])
            ->addColumn('cosecha', 'string', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('tipo_maquina', 'string', [
                'default' => null,
                'limit' => 50,
                'null' => true,
            ])
            ->addColumn('modelo', 'string', [
                'default' => null,
                'limit' => 100,
                'null' => true,
            ])
            ->addColumn('operacion', 'string', [
                'default' => null,
                'limit' => 20,
                'null' => true,
            ])
            ->addColumn('tarea', 'string', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('modelo_algoritmo', 'text', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('estado', 'boolean', [
                'default' => true,
                'limit' => null,
                'null' => true,
            ])
            ->create();

        $this->table('parcelas_gis', ['id' => false, 'primary_key' => ['idparcelas_gis', 'intervencion_idintervencion']])
            ->addColumn('idparcelas_gis', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 10,
                'null' => false,
            ])
            ->addColumn('intervencion_idintervencion', 'integer', [
                'default' => null,
                'limit' => 10,
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
                'limit' => 10,
                'null' => false,
            ])
            ->addColumn('rodales_idrodales', 'integer', [
                'default' => null,
                'limit' => 10,
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
                'limit' => 10,
                'null' => false,
            ])
            ->addColumn('procedencias_idprocedencias', 'integer', [
                'default' => null,
                'limit' => 10,
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
                'limit' => 10,
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

        $this->table('raster_columns', ['id' => false, 'primary_key' => ['']])
            ->addColumn('r_table_catalog', 'string', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('r_table_schema', 'string', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('r_table_name', 'string', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('r_raster_column', 'string', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('srid', 'integer', [
                'default' => null,
                'limit' => 10,
                'null' => true,
            ])
            ->addColumn('scale_x', 'float', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('scale_y', 'float', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('blocksize_x', 'integer', [
                'default' => null,
                'limit' => 10,
                'null' => true,
            ])
            ->addColumn('blocksize_y', 'integer', [
                'default' => null,
                'limit' => 10,
                'null' => true,
            ])
            ->addColumn('same_alignment', 'boolean', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('regular_blocking', 'boolean', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('num_bands', 'integer', [
                'default' => null,
                'limit' => 10,
                'null' => true,
            ])
            ->addColumn('pixel_types', 'string', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('nodata_values', 'string', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('out_db', 'string', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('extent', 'string', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('spatial_index', 'boolean', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->create();

        $this->table('raster_overviews', ['id' => false, 'primary_key' => ['']])
            ->addColumn('o_table_catalog', 'string', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('o_table_schema', 'string', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('o_table_name', 'string', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('o_raster_column', 'string', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('r_table_catalog', 'string', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('r_table_schema', 'string', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('r_table_name', 'string', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('r_raster_column', 'string', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('overview_factor', 'integer', [
                'default' => null,
                'limit' => 10,
                'null' => true,
            ])
            ->create();

        $this->table('rodal_sagpya', ['id' => false, 'primary_key' => ['rodales_idrodales', 'sagpya_idsagpya']])
            ->addColumn('rodales_idrodales', 'integer', [
                'default' => null,
                'limit' => 10,
                'null' => false,
            ])
            ->addColumn('sagpya_idsagpya', 'integer', [
                'default' => null,
                'limit' => 10,
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
                'limit' => 10,
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
                'limit' => 10,
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
                'limit' => 10,
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

        $this->table('spatial_ref_sys', ['id' => false, 'primary_key' => ['srid']])
            ->addColumn('srid', 'integer', [
                'default' => null,
                'limit' => 10,
                'null' => false,
            ])
            ->addColumn('auth_name', 'string', [
                'default' => null,
                'limit' => 256,
                'null' => true,
            ])
            ->addColumn('auth_srid', 'integer', [
                'default' => null,
                'limit' => 10,
                'null' => true,
            ])
            ->addColumn('srtext', 'string', [
                'default' => null,
                'limit' => 2048,
                'null' => true,
            ])
            ->addColumn('proj4text', 'string', [
                'default' => null,
                'limit' => 2048,
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
            ->addColumn('created', 'timestamp', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('modified', 'timestamp', [
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

        $this->table('variables_generales', ['id' => false, 'primary_key' => ['idvariablesgenerales']])
            ->addColumn('idvariablesgenerales', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 10,
                'null' => false,
            ])
            ->addColumn('fecha_act_costos', 'date', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('tasa_int_cap_propio', 'float', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('pres_comb_siva', 'float', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('pres_aceite_motor', 'float', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('pres_aceite_trans', 'float', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('pres_aceite_hidra', 'float', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('pres_grasa', 'float', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('costo_administrativo', 'float', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('seguridad_social_24241', 'float', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('art', 'float', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('seguridad_social_23660', 'float', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('carga_social_12', 'float', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('vacaciones_enfermedad', 'float', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('inssjp_19032', 'float', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('asignacion_familiar_24714', 'float', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('sac', 'float', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('seguro_vida', 'float', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('uniforme', 'float', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('botin_seguridad', 'float', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('guante', 'float', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('protector_auditivo', 'float', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('casco_chaleco', 'float', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('alojamiento_dia_persona', 'float', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('vianda_dia', 'float', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('ausentismo', 'float', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('precio_aceite_cadena', 'float', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('emsefor_idemsefor', 'integer', [
                'default' => null,
                'limit' => 10,
                'null' => false,
            ])
            ->addIndex(
                [
                    'emsefor_idemsefor',
                ],
                ['unique' => true]
            )
            ->addIndex(
                [
                    'emsefor_idemsefor',
                ]
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

        $this->table('variables_generales')
            ->addForeignKey(
                'emsefor_idemsefor',
                'emsefor',
                'idemsefor',
                [
                    'update' => 'NO_ACTION',
                    'delete' => 'CASCADE'
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

        $this->table('variables_generales')
            ->dropForeignKey(
                'emsefor_idemsefor'
            );

        $this->dropTable('empresa');
        $this->dropTable('ems_maq');
        $this->dropTable('emsefor');
        $this->dropTable('geography_columns');
        $this->dropTable('geometry_columns');
        $this->dropTable('gis');
        $this->dropTable('info_intervencion');
        $this->dropTable('intervenciones');
        $this->dropTable('inventario');
        $this->dropTable('maquina_especifica');
        $this->dropTable('maquinas');
        $this->dropTable('modelos');
        $this->dropTable('parcelas_gis');
        $this->dropTable('plantaciones');
        $this->dropTable('procedencias');
        $this->dropTable('raster_columns');
        $this->dropTable('raster_overviews');
        $this->dropTable('rodal_sagpya');
        $this->dropTable('rodales');
        $this->dropTable('sagpyas');
        $this->dropTable('spatial_ref_sys');
        $this->dropTable('users');
        $this->dropTable('variables_generales');
    }
}
