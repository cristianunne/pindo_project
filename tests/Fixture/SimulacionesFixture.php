<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * SimulacionesFixture
 *
 */
class SimulacionesFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'idsimulaciones' => ['type' => 'integer', 'length' => 10, 'autoIncrement' => true, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'fecha' => ['type' => 'date', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null],
        'rodales_idrodales' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'tipo_simulacion' => ['type' => 'string', 'length' => 6, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'sistema_cosecha' => ['type' => 'string', 'length' => 15, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'superficie' => ['type' => 'float', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'vol_medio' => ['type' => 'float', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'dist_extraccion' => ['type' => 'float', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'produccion_total' => ['type' => 'float', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'vol_total' => ['type' => 'float', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'dias_cosecha' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'produccion_equilibrio' => ['type' => 'float', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'costo_prod_bruta' => ['type' => 'float', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'costo_prod_admin' => ['type' => 'float', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'margen_ganancia' => ['type' => 'float', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'tarifa_sin_imp' => ['type' => 'float', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'tarifa_con_imp' => ['type' => 'float', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'beneficio' => ['type' => 'float', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['idsimulaciones'], 'length' => []],
            'fk_simulaciones_rodales' => ['type' => 'foreign', 'columns' => ['rodales_idrodales'], 'references' => ['rodales', 'idrodales'], 'update' => 'noAction', 'delete' => 'cascade', 'length' => []],
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
            'idsimulaciones' => 1,
            'fecha' => '2018-09-18',
            'rodales_idrodales' => 1,
            'tipo_simulacion' => 'Lore',
            'sistema_cosecha' => 'Lorem ipsum d',
            'superficie' => 1,
            'vol_medio' => 1,
            'dist_extraccion' => 1,
            'produccion_total' => 1,
            'vol_total' => 1,
            'dias_cosecha' => 1,
            'produccion_equilibrio' => 1,
            'costo_prod_bruta' => 1,
            'costo_prod_admin' => 1,
            'margen_ganancia' => 1,
            'tarifa_sin_imp' => 1,
            'tarifa_con_imp' => 1,
            'beneficio' => 1
        ],
    ];
}
