<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\GisTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\GisTable Test Case
 */
class GisTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\GisTable
     */
    public $Gis;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.gis'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Gis') ? [] : ['className' => GisTable::class];
        $this->Gis = TableRegistry::get('Gis', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Gis);

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
