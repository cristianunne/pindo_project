<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CapabasedefaultFixture
 *
 */
class CapabasedefaultFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'capabasedefault';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'idcapabasedefault' => ['type' => 'integer', 'length' => 10, 'autoIncrement' => true, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'capabase_id' => ['type' => 'integer', 'length' => 10, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['idcapabasedefault'], 'length' => []],
            'fk_capasbase_def' => ['type' => 'foreign', 'columns' => ['capabase_id'], 'references' => ['capasbase', 'idcapasbase'], 'update' => 'noAction', 'delete' => 'cascade', 'length' => []],
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
            'idcapabasedefault' => 1,
            'capabase_id' => 1
        ],
    ];
}
