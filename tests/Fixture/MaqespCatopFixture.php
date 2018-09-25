<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * MaqespCatopFixture
 *
 */
class MaqespCatopFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'maqesp_catop';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'cat_operarios_idcat_operarios' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'maquina_especifica_idmaquina_especifica' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'sal_basico_mes' => ['type' => 'float', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['cat_operarios_idcat_operarios', 'maquina_especifica_idmaquina_especifica'], 'length' => []],
            'uq_maqesp' => ['type' => 'unique', 'columns' => ['maquina_especifica_idmaquina_especifica'], 'length' => []],
            'fk_maqesp' => ['type' => 'foreign', 'columns' => ['maquina_especifica_idmaquina_especifica'], 'references' => ['maquina_especifica', 'idmaquina_especifica'], 'update' => 'noAction', 'delete' => 'cascade', 'length' => []],
            'fk_maqesp_catop' => ['type' => 'foreign', 'columns' => ['cat_operarios_idcat_operarios'], 'references' => ['cat_operarios', 'idcat_operarios'], 'update' => 'noAction', 'delete' => 'cascade', 'length' => []],
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
            'cat_operarios_idcat_operarios' => 1,
            'maquina_especifica_idmaquina_especifica' => 1,
            'sal_basico_mes' => 1
        ],
    ];
}
