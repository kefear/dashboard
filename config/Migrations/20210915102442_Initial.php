<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class Initial extends AbstractMigration
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
        $this->table('employees')
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
            ->addColumn('dob', 'date', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('email', 'text', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('phone', 'text', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('team_id', 'integer', [
                'default' => null,
                'limit' => null,
                'null' => true,
                'signed' => false,
            ])
            ->addColumn('role_id', 'integer', [
                'default' => null,
                'limit' => null,
                'null' => true,
                'signed' => false,
            ])
            ->addColumn('report_id', 'integer', [
                'default' => null,
                'limit' => null,
                'null' => true,
                'signed' => false,
            ])
            ->addColumn('salary', 'integer', [
                'default' => null,
                'limit' => null,
                'null' => true,
                'signed' => false,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('status_id', 'integer', [
                'default' => null,
                'limit' => null,
                'null' => false,
                'signed' => false,
            ])
            ->create();

        $this->table('roles')
            ->addColumn('id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => null,
                'null' => false,
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
            ->addColumn('id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => null,
                'null' => false,
                'signed' => false,
            ])
            ->addPrimaryKey(['id'])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('employee_id', 'integer', [
                'default' => null,
                'limit' => null,
                'null' => false,
                'signed' => false,
            ])
            ->addColumn('old_status_id', 'integer', [
                'default' => null,
                'limit' => null,
                'null' => true,
                'signed' => false,
            ])
            ->addColumn('new_status_id', 'integer', [
                'default' => null,
                'limit' => null,
                'null' => false,
                'signed' => false,
            ])
            ->create();

        $this->table('statuses')
            ->addColumn('id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => null,
                'null' => false,
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

        $this->table('teams')
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
            ->addColumn('parent_id', 'integer', [
                'default' => null,
                'limit' => null,
                'null' => true,
                'signed' => false,
            ])
            ->create();
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
        $this->table('employees')->drop()->save();
        $this->table('roles')->drop()->save();
        $this->table('status_changes')->drop()->save();
        $this->table('statuses')->drop()->save();
        $this->table('teams')->drop()->save();
    }
}
