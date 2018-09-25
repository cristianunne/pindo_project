<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LaboralTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LaboralTable Test Case
 */
class LaboralTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\LaboralTable
     */
    public $Laboral;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.laboral'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Laboral') ? [] : ['className' => LaboralTable::class];
        $this->Laboral = TableRegistry::get('Laboral', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Laboral);

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
