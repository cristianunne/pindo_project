<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\VarablesGeneralesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\VarablesGeneralesTable Test Case
 */
class VarablesGeneralesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\VarablesGeneralesTable
     */
    public $VarablesGenerales;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.varables_generales'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('VarablesGenerales') ? [] : ['className' => VarablesGeneralesTable::class];
        $this->VarablesGenerales = TableRegistry::get('VarablesGenerales', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->VarablesGenerales);

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
