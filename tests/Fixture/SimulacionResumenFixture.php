<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * SimulacionResumenFixture
 *
 */
class SimulacionResumenFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'simulacion_resumen';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'idsimulacion' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'tarea' => ['type' => 'string', 'length' => 15, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'produccion_mes' => ['type' => 'float', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'actividad_lim' => ['type' => 'string', 'length' => 15, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'balance' => ['type' => 'float', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'costo_total' => ['type' => 'float', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'idsim_res' => ['type' => 'integer', 'length' => 10, 'autoIncrement' => true, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'unsigned' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['idsim_res'], 'length' => []],
            'fk_simulacion_res' => ['type' => 'foreign', 'columns' => ['idsimulacion'], 'references' => ['simulaciones', 'idsimulaciones'], 'update' => 'noAction', 'delete' => 'cascade', 'length' => []],
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
            'idsimulacion' => 1,
            'tarea' => 'Lorem ipsum d',
            'produccion_mes' => 1,
            'actividad_lim' => 'Lorem ipsum d',
            'balance' => 1,
            'costo_total' => 1,
            'idsim_res' => 1
        ],
    ];
}
