<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BrochureOrderAmtsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BrochureOrderAmtsTable Test Case
 */
class BrochureOrderAmtsTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.brochure_order_amts'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('BrochureOrderAmts') ? [] : ['className' => 'App\Model\Table\BrochureOrderAmtsTable'];
        $this->BrochureOrderAmts = TableRegistry::get('BrochureOrderAmts', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->BrochureOrderAmts);

        parent::tearDown();
    }

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
