<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * InventarioFixture
 *
 */
class InventarioFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'inventario';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'idinventario' => ['type' => 'integer', 'length' => 10, 'autoIncrement' => true, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'cod_sap' => ['type' => 'string', 'length' => 45, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'fecha' => ['type' => 'date', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null],
        'num_arbol' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'dap' => ['type' => 'float', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'altura' => ['type' => 'float', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'vol_medio' => ['type' => 'float', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'vol_total' => ['type' => 'float', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'area_basal' => ['type' => 'float', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'forma' => ['type' => 'string', 'length' => 45, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'dano' => ['type' => 'string', 'length' => 45, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'tipo_inventario' => ['type' => 'text', 'length' => null, 'default' => null, 'null' => false, 'collate' => null, 'comment' => null, 'precision' => null],
        'rodales_idrodales' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'emsefor_idemsefor' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'intervencion_idintervencion' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'modifica' => ['type' => 'boolean', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null],
        '_indexes' => [
            'inventario_rodales_idrodales' => ['type' => 'index', 'columns' => ['rodales_idrodales'], 'length' => []],
            'inventario_emsefor_idemsefor' => ['type' => 'index', 'columns' => ['emsefor_idemsefor'], 'length' => []],
            'inventario_intervencion_idintervencion' => ['type' => 'index', 'columns' => ['intervencion_idintervencion'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['idinventario'], 'length' => []],
            'intervencion_unique' => ['type' => 'unique', 'columns' => ['intervencion_idintervencion'], 'length' => []],
            'inventario_emsefor_idemsefor' => ['type' => 'foreign', 'columns' => ['emsefor_idemsefor'], 'references' => ['emsefor', 'idemsefor'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'inventario_intervencion_idintervencion' => ['type' => 'foreign', 'columns' => ['intervencion_idintervencion'], 'references' => ['intervenciones', 'idintervencion'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'inventario_rodales_idrodales' => ['type' => 'foreign', 'columns' => ['rodales_idrodales'], 'references' => ['rodales', 'idrodales'], 'update' => 'noAction', 'delete' => 'cascade', 'length' => []],
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
            'idinventario' => 1,
            'cod_sap' => 'Lorem ipsum dolor sit amet',
            'fecha' => '2018-04-10',
            'num_arbol' => 1,
            'dap' => 1,
            'altura' => 1,
            'vol_medio' => 1,
            'vol_total' => 1,
            'area_basal' => 1,
            'forma' => 'Lorem ipsum dolor sit amet',
            'dano' => 'Lorem ipsum dolor sit amet',
            'tipo_inventario' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'rodales_idrodales' => 1,
            'emsefor_idemsefor' => 1,
            'intervencion_idintervencion' => 1,
            'modifica' => 1
        ],
    ];
}
