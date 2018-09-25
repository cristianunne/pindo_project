<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * SimulacionesMaqespFixture
 *
 */
class SimulacionesMaqespFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'simulaciones_maqesp';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'simulaciones_idsimulaciones' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'idmaquina_especifica' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'actividad' => ['type' => 'string', 'length' => 15, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'productividad' => ['type' => 'float', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'productividad_real' => ['type' => 'float', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'produccion_mes' => ['type' => 'float', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'costo_fijo' => ['type' => 'float', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'costo_variable' => ['type' => 'float', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'costo_total' => ['type' => 'float', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['simulaciones_idsimulaciones', 'idmaquina_especifica'], 'length' => []],
            'fk_sim_maqesp' => ['type' => 'foreign', 'columns' => ['idmaquina_especifica'], 'references' => ['maquina_especifica', 'idmaquina_especifica'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_simulaciones' => ['type' => 'foreign', 'columns' => ['simulaciones_idsimulaciones'], 'references' => ['simulaciones', 'idsimulaciones'], 'update' => 'noAction', 'delete' => 'cascade', 'length' => []],
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
            'simulaciones_idsimulaciones' => 1,
            'idmaquina_especifica' => 1,
            'actividad' => 'Lorem ipsum d',
            'productividad' => 1,
            'productividad_real' => 1,
            'produccion_mes' => 1,
            'costo_fijo' => 1,
            'costo_variable' => 1,
            'costo_total' => 1
        ],
    ];
}
