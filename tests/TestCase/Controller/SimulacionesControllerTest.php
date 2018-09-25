<?php
namespace App\Test\TestCase\Controller;

use App\Controller\SimulacionesController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\SimulacionesController Test Case
 */
class SimulacionesControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
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
     * Test initial setup
     *
     * @return void
     */
    public function testInitialization()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
