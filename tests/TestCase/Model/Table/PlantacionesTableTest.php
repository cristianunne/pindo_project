<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PlantacionesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PlantacionesTable Test Case
 */
class PlantacionesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PlantacionesTable
     */
    public $Plantaciones;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.plantaciones',
        'app.rodales',
        'app.procedencias',
        'app.emsefor'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Plantaciones') ? [] : ['className' => PlantacionesTable::class];
        $this->Plantaciones = TableRegistry::getTableLocator()->get('Plantaciones', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Plantaciones);

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
