<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\StatusChangesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\StatusChangesTable Test Case
 */
class StatusChangesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\StatusChangesTable
     */
    protected $StatusChanges;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.StatusChanges',
        'app.Employees',
        'app.OldStatuses',
        'app.NewStatuses',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('StatusChanges') ? [] : ['className' => StatusChangesTable::class];
        $this->StatusChanges = $this->getTableLocator()->get('StatusChanges', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->StatusChanges);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\StatusChangesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\StatusChangesTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
