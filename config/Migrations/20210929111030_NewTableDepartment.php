<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class NewTableDepartment extends AbstractMigration
{
    public $autoId = false;

    /**
     * Up Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-up-method
     * @return void
     */
    public function up()
    {
        $this->table('departments')
            ->addColumn('id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => null,
                'null' => false,
                'signed' => false,
            ])
            ->addPrimaryKey(['id'])
            ->addColumn('name', 'text', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('description', 'text', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->create();

        $this->table('status_changes')
            ->addColumn('user_id', 'integer', [
                'after' => 'new_status_id',
                'default' => null,
                'length' => null,
                'null' => false,
                'signed' => false,
            ])
            ->update();

        $this->table('teams')
            ->addColumn('department_id', 'integer', [
                'after' => 'parent_id',
                'default' => null,
                'length' => null,
                'null' => false,
                'signed' => false,
            ])
            ->update();

        $this->table('users')
            ->addColumn('y_id', 'text', [
                'after' => 'token',
                'default' => null,
                'length' => null,
                'null' => false,
            ])
            ->addColumn('y_client_id', 'text', [
                'after' => 'y_id',
                'default' => null,
                'length' => null,
                'null' => true,
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

        $this->table('status_changes')
            ->removeColumn('user_id')
            ->update();

        $this->table('teams')
            ->removeColumn('department_id')
            ->update();

        $this->table('users')
            ->removeColumn('y_id')
            ->removeColumn('y_client_id')
            ->update();

        $this->table('departments')->drop()->save();
    }
}
