<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CapasbaseTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CapasbaseTable Test Case
 */
class CapasbaseTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CapasbaseTable
     */
    public $Capasbase;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.capasbase'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Capasbase') ? [] : ['className' => CapasbaseTable::class];
        $this->Capasbase = TableRegistry::get('Capasbase', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Capasbase);

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
