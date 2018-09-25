<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * VariablesGlobalesFixture
 *
 */
class VariablesGlobalesFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'idvariables_globales' => ['type' => 'integer', 'length' => 10, 'autoIncrement' => true, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'tasa_int_cap_propio' => ['type' => 'float', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'ausentismo' => ['type' => 'float', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'margen_ganancia' => ['type' => 'float', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'costo_administrativo' => ['type' => 'float', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'contador_publico' => ['type' => 'float', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'impuestos_totales' => ['type' => 'float', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'tasa_seguro' => ['type' => 'float', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'traslado_personal' => ['type' => 'float', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'dias_mes' => ['type' => 'float', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'emsefor_idemsefor' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['idvariables_globales'], 'length' => []],
            'fk_varglob_emsefor' => ['type' => 'foreign', 'columns' => ['emsefor_idemsefor'], 'references' => ['emsefor', 'idemsefor'], 'update' => 'noAction', 'delete' => 'cascade', 'length' => []],
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
            'idvariables_globales' => 1,
            'tasa_int_cap_propio' => 1,
            'ausentismo' => 1,
            'margen_ganancia' => 1,
            'costo_administrativo' => 1,
            'contador_publico' => 1,
            'impuestos_totales' => 1,
            'tasa_seguro' => 1,
            'traslado_personal' => 1,
            'dias_mes' => 1,
            'emsefor_idemsefor' => 1
        ],
    ];
}
