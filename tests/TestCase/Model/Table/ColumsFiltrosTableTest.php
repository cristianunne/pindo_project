<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ColumsFiltrosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ColumsFiltrosTable Test Case
 */
class ColumsFiltrosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ColumsFiltrosTable
     */
    public $ColumsFiltros;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.colums_filtros'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ColumsFiltros') ? [] : ['className' => ColumsFiltrosTable::class];
        $this->ColumsFiltros = TableRegistry::get('ColumsFiltros', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ColumsFiltros);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
