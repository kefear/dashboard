<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\OneOnOneTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\OneOnOneTable Test Case
 */
class OneOnOneTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\OneOnOneTable
     */
    protected $OneOnOne;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.OneOnOne',
        'app.Employees',
        'app.Managers',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('OneOnOne') ? [] : ['className' => OneOnOneTable::class];
        $this->OneOnOne = $this->getTableLocator()->get('OneOnOne', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->OneOnOne);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\OneOnOneTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\OneOnOneTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
