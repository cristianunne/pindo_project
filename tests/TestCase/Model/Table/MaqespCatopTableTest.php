<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MaqespCatopTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MaqespCatopTable Test Case
 */
class MaqespCatopTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MaqespCatopTable
     */
    public $MaqespCatop;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.maqesp_catop',
        'app.cat_operarios',
        'app.laboral',
        'app.maquina_especifica',
        'app.ems_maq',
        'app.maquina_especifica',
        'app.emsefor',
        'app.plantaciones',
        'app.rodales',
        'app.empresa',
        'app.sagpyas',
        'app.rodal_sagpya',
        'app.intervenciones',
        'app.info_intervencion',
        'app.inventario',
        'app.procedencias',
        'app.maquinas',
        'app.variables_globales',
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
        $config = TableRegistry::exists('MaqespCatop') ? [] : ['className' => MaqespCatopTable::class];
        $this->MaqespCatop = TableRegistry::get('MaqespCatop', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MaqespCatop);

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
