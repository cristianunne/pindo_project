<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ArbolesByParcelasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ArbolesByParcelasTable Test Case
 */
class ArbolesByParcelasTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ArbolesByParcelasTable
     */
    public $ArbolesByParcelas;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.arboles_by_parcelas'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ArbolesByParcelas') ? [] : ['className' => ArbolesByParcelasTable::class];
        $this->ArbolesByParcelas = TableRegistry::get('ArbolesByParcelas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ArbolesByParcelas);

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
