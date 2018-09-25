<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SimulacionResumenTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SimulacionResumenTable Test Case
 */
class SimulacionResumenTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SimulacionResumenTable
     */
    public $SimulacionResumen;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.simulacion_resumen'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('SimulacionResumen') ? [] : ['className' => SimulacionResumenTable::class];
        $this->SimulacionResumen = TableRegistry::get('SimulacionResumen', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SimulacionResumen);

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
