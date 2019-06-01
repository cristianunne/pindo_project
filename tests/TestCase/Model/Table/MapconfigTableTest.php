<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MapconfigTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MapconfigTable Test Case
 */
class MapconfigTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MapconfigTable
     */
    public $Mapconfig;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.mapconfig'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Mapconfig') ? [] : ['className' => MapconfigTable::class];
        $this->Mapconfig = TableRegistry::get('Mapconfig', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Mapconfig);

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
