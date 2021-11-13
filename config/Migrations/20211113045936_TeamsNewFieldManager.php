<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class TeamsNewFieldManager extends AbstractMigration
{
    /**
     * Up Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-up-method
     * @return void
     */
    public function up()
    {

        $this->table('teams')
            ->addColumn('manager_id', 'integer', [
                'after' => 'department_id',
                'default' => null,
                'length' => null,
                'null' => true,
                'signed' => false,
            ])
            ->update();
    }

    /**
     * Down Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-down-method
     * @return void
     */
    public function down()
    {

        $this->table('teams')
            ->removeColumn('manager_id')
            ->update();
    }
}
