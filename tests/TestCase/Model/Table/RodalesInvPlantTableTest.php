<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RodalesInvPlantTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RodalesInvPlantTable Test Case
 */
class RodalesInvPlantTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\RodalesInvPlantTable
     */
    public $RodalesInvPlant;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.rodales_inv_plant',
        'app.rods'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('RodalesInvPlant') ? [] : ['className' => RodalesInvPlantTable::class];
        $this->RodalesInvPlant = TableRegistry::get('RodalesInvPlant', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->RodalesInvPlant);

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
