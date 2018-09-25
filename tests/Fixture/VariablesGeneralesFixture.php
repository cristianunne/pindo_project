<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * VariablesGeneralesFixture
 *
 */
class VariablesGeneralesFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'idvariablesgenerales' => ['type' => 'integer', 'length' => 10, 'autoIncrement' => true, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'fecha_act_costos' => ['type' => 'date', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null],
        'tasa_int_cap_propio' => ['type' => 'float', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'pres_comb_siva' => ['type' => 'float', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'pres_aceite_motor' => ['type' => 'float', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'pres_aceite_trans' => ['type' => 'float', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'pres_aceite_hidra' => ['type' => 'float', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'pres_grasa' => ['type' => 'float', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'costo_administrativo' => ['type' => 'float', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'seguridad_social_24241' => ['type' => 'float', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'art' => ['type' => 'float', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'seguridad_social_23660' => ['type' => 'float', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'carga_social_12' => ['type' => 'float', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'vacaciones_enfermedad' => ['type' => 'float', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'inssjp_19032' => ['type' => 'float', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'asignacion_familiar_24714' => ['type' => 'float', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'sac' => ['type' => 'float', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'seguro_vida' => ['type' => 'float', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'uniforme' => ['type' => 'float', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'botin_seguridad' => ['type' => 'float', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'guante' => ['type' => 'float', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'protector_auditivo' => ['type' => 'float', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'casco_chaleco' => ['type' => 'float', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'alojamiento_dia_persona' => ['type' => 'float', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'vianda_dia' => ['type' => 'float', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'ausentismo' => ['type' => 'float', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'precio_aceite_cadena' => ['type' => 'float', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'emsefor_idemsefor' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'duracion_turnos_hs' => ['type' => 'float', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'turnos_dia' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'dias_por_semana' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'dias_por_mes' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'margen_ganancia' => ['type' => 'float', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'factor_ajuste' => ['type' => 'float', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['idvariablesgenerales'], 'length' => []],
            'unique_fk_fk' => ['type' => 'unique', 'columns' => ['emsefor_idemsefor'], 'length' => []],
            'var_gen_emsefor_fk' => ['type' => 'foreign', 'columns' => ['emsefor_idemsefor'], 'references' => ['emsefor', 'idemsefor'], 'update' => 'noAction', 'delete' => 'cascade', 'length' => []],
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'idvariablesgenerales' => 1,
            'fecha_act_costos' => '2018-04-06',
            'tasa_int_cap_propio' => 1,
            'pres_comb_siva' => 1,
            'pres_aceite_motor' => 1,
            'pres_aceite_trans' => 1,
            'pres_aceite_hidra' => 1,
            'pres_grasa' => 1,
            'costo_administrativo' => 1,
            'seguridad_social_24241' => 1,
            'art' => 1,
            'seguridad_social_23660' => 1,
            'carga_social_12' => 1,
            'vacaciones_enfermedad' => 1,
            'inssjp_19032' => 1,
            'asignacion_familiar_24714' => 1,
            'sac' => 1,
            'seguro_vida' => 1,
            'uniforme' => 1,
            'botin_seguridad' => 1,
            'guante' => 1,
            'protector_auditivo' => 1,
            'casco_chaleco' => 1,
            'alojamiento_dia_persona' => 1,
            'vianda_dia' => 1,
            'ausentismo' => 1,
            'precio_aceite_cadena' => 1,
            'emsefor_idemsefor' => 1,
            'duracion_turnos_hs' => 1,
            'turnos_dia' => 1,
            'dias_por_semana' => 1,
            'dias_por_mes' => 1,
            'margen_ganancia' => 1,
            'factor_ajuste' => 1
        ],
    ];
}
