<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CapabasedefaultTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CapabasedefaultTable Test Case
 */
class CapabasedefaultTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CapabasedefaultTable
     */
    public $Capabasedefault;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.capabasedefault',
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
        $config = TableRegistry::exists('Capabasedefault') ? [] : ['className' => CapabasedefaultTable::class];
        $this->Capabasedefault = TableRegistry::get('Capabasedefault', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Capabasedefault);

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
