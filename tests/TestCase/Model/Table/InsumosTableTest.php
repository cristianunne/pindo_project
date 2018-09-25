<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\InsumosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\InsumosTable Test Case
 */
class InsumosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\InsumosTable
     */
    public $Insumos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.insumos'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Insumos') ? [] : ['className' => InsumosTable::class];
        $this->Insumos = TableRegistry::get('Insumos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Insumos);

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
