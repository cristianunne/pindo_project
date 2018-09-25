<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\InventarioTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\InventarioTable Test Case
 */
class InventarioTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\InventarioTable
     */
    public $Inventario;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.inventario',
        'app.rodales',
        'app.empresa',
        'app.sagpyas',
        'app.rodal_sagpya',
        'app.plantaciones',
        'app.procedencias',
        'app.emsefor',
        'app.maquinas',
        'app.ems_maq',
        'app.variables_generales',
        'app.intervenciones',
        'app.info_intervencion'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Inventario') ? [] : ['className' => InventarioTable::class];
        $this->Inventario = TableRegistry::get('Inventario', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Inventario);

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
