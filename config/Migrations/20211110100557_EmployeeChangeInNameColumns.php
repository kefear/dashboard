<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class EmployeeChangeInNameColumns extends AbstractMigration
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

        $this->table('employees')
            ->removeColumn('name')
            ->update();

        $this->table('employees')
            ->addColumn('first_name', 'text', [
                'after' => 'id',
                'default' => null,
                'length' => null,
                'null' => false,
            ])
            ->addColumn('last_name', 'text', [
                'after' => 'first_name',
                'default' => null,
                'length' => null,
                'null' => false,
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

        $this->table('employees')
            ->addColumn('name', 'text', [
                'after' => 'id',
                'default' => null,
                'length' => null,
                'null' => false,
            ])
            ->removeColumn('first_name')
            ->removeColumn('last_name')
            ->update();
    }
}
