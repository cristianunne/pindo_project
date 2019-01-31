<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RelevamientoResumenTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RelevamientoResumenTable Test Case
 */
class RelevamientoResumenTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\RelevamientoResumenTable
     */
    public $RelevamientoResumen;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.relevamiento_resumen'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('RelevamientoResumen') ? [] : ['className' => RelevamientoResumenTable::class];
        $this->RelevamientoResumen = TableRegistry::get('RelevamientoResumen', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->RelevamientoResumen);

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
