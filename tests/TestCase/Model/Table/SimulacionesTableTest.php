<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SimulacionesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SimulacionesTable Test Case
 */
class SimulacionesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SimulacionesTable
     */
    public $Simulaciones;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.simulaciones'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Simulaciones') ? [] : ['className' => SimulacionesTable::class];
        $this->Simulaciones = TableRegistry::get('Simulaciones', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Simulaciones);

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
