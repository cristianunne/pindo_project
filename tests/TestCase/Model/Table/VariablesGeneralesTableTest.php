<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\VariablesGeneralesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\VariablesGeneralesTable Test Case
 */
class VariablesGeneralesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\VariablesGeneralesTable
     */
    public $VariablesGenerales;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.variables_generales'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('VariablesGenerales') ? [] : ['className' => VariablesGeneralesTable::class];
        $this->VariablesGenerales = TableRegistry::get('VariablesGenerales', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->VariablesGenerales);

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

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
