<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\VariablesGlobalesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\VariablesGlobalesTable Test Case
 */
class VariablesGlobalesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\VariablesGlobalesTable
     */
    public $VariablesGlobales;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.variables_globales'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('VariablesGlobales') ? [] : ['className' => VariablesGlobalesTable::class];
        $this->VariablesGlobales = TableRegistry::get('VariablesGlobales', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->VariablesGlobales);

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
