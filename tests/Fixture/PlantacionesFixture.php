<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PlantacionesFixture
 *
 */
class PlantacionesFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'nro_plantacion' => ['type' => 'integer', 'length' => 10, 'autoIncrement' => true, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'rodales_idrodales' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'fecha' => ['type' => 'date', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null],
        'superficie' => ['type' => 'float', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'densidad' => ['type' => 'float', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'dist_lineas' => ['type' => 'float', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'dist_plantas' => ['type' => 'float', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'num_arbol_plantado' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'sobrevivencia' => ['type' => 'float', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'emsefor_idemsefor' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'procedencias_idprocedencias' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        '_indexes' => [
            'plantaciones_rodales_idrodales' => ['type' => 'index', 'columns' => ['rodales_idrodales'], 'length' => []],
            'plantaciones_emsefor_idemsefor' => ['type' => 'index', 'columns' => ['emsefor_idemsefor'], 'length' => []],
            'plantaciones_procedencias_idprocedencias' => ['type' => 'index', 'columns' => ['procedencias_idprocedencias'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['nro_plantacion'], 'length' => []],
            'plantaciones_emsefor_idemsefor' => ['type' => 'foreign', 'columns' => ['emsefor_idemsefor'], 'references' => ['emsefor', 'idemsefor'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'plantaciones_procedencias_idprocedencias' => ['type' => 'foreign', 'columns' => ['procedencias_idprocedencias'], 'references' => ['procedencias', 'idprocedencias'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'nro_plantacion' => 1,
            'rodales_idrodales' => 1,
            'fecha' => '2019-07-05',
            'superficie' => 1,
            'densidad' => 1,
            'dist_lineas' => 1,
            'dist_plantas' => 1,
            'num_arbol_plantado' => 1,
            'sobrevivencia' => 1,
            'emsefor_idemsefor' => 1,
            'procedencias_idprocedencias' => 1
        ],
    ];
}
