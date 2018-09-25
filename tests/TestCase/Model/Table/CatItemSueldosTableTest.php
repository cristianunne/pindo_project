<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CatItemSueldosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CatItemSueldosTable Test Case
 */
class CatItemSueldosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CatItemSueldosTable
     */
    public $CatItemSueldos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.cat_item_sueldos'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('CatItemSueldos') ? [] : ['className' => CatItemSueldosTable::class];
        $this->CatItemSueldos = TableRegistry::get('CatItemSueldos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CatItemSueldos);

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
