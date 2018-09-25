<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SimulacionesMaqespTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SimulacionesMaqespTable Test Case
 */
class SimulacionesMaqespTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SimulacionesMaqespTable
     */
    public $SimulacionesMaqesp;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.simulaciones_maqesp',
        'app.simulaciones',
        'app.rodales',
        'app.empresa',
        'app.sagpyas',
        'app.rodal_sagpya',
        'app.plantaciones',
        'app.procedencias',
        'app.emsefor',
        'app.maquinas',
        'app.ems_maq',
        'app.maquina_especifica',
        'app.maqesp_catop',
        'app.cat_operarios',
        'app.laboral',
        'app.maquina_especifica',
        'app.variables_globales',
        'app.laboral',
        'app.intervenciones',
        'app.info_intervencion',
        'app.inventario'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('SimulacionesMaqesp') ? [] : ['className' => SimulacionesMaqespTable::class];
        $this->SimulacionesMaqesp = TableRegistry::get('SimulacionesMaqesp', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SimulacionesMaqesp);

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
