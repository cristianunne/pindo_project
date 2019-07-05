<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * LayersconfigstyleFixture
 *
 */
class LayersconfigstyleFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'layersconfigstyle';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 10, 'autoIncrement' => true, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'paleta' => ['type' => 'string', 'length' => 40, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'nombre' => ['type' => 'string', 'length' => 15, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'campo_clasified' => ['type' => 'string', 'length' => 30, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
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
            'id' => 1,
            'paleta' => 'Lorem ipsum dolor sit amet',
            'nombre' => 'Lorem ipsum d',
            'campo_clasified' => 'Lorem ipsum dolor sit amet'
        ],
    ];
}
