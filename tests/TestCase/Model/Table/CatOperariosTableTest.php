<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CatOperariosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CatOperariosTable Test Case
 */
class CatOperariosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CatOperariosTable
     */
    public $CatOperarios;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.cat_operarios'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('CatOperarios') ? [] : ['className' => CatOperariosTable::class];
        $this->CatOperarios = TableRegistry::get('CatOperarios', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CatOperarios);

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
