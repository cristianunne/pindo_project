<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LayersconfigstyleTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LayersconfigstyleTable Test Case
 */
class LayersconfigstyleTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\LayersconfigstyleTable
     */
    public $Layersconfigstyle;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.layersconfigstyle'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Layersconfigstyle') ? [] : ['className' => LayersconfigstyleTable::class];
        $this->Layersconfigstyle = TableRegistry::getTableLocator()->get('Layersconfigstyle', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Layersconfigstyle);

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
