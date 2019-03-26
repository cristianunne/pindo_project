<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TablasFiltrosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TablasFiltrosTable Test Case
 */
class TablasFiltrosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TablasFiltrosTable
     */
    public $TablasFiltros;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.tablas_filtros'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('TablasFiltros') ? [] : ['className' => TablasFiltrosTable::class];
        $this->TablasFiltros = TableRegistry::get('TablasFiltros', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TablasFiltros);

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
