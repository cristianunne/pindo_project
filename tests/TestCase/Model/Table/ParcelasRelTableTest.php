<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ParcelasRelTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ParcelasRelTable Test Case
 */
class ParcelasRelTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ParcelasRelTable
     */
    public $ParcelasRel;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.parcelas_rel'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ParcelasRel') ? [] : ['className' => ParcelasRelTable::class];
        $this->ParcelasRel = TableRegistry::get('ParcelasRel', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ParcelasRel);

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
