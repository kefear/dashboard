<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class ProjectsNewFieldStatusId extends AbstractMigration
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

        $this->table('sessions')
            ->changeColumn('created', 'datetime', [
                'default' => 'current_timestamp()',
                'limit' => null,
                'null' => true,
            ])
            ->changeColumn('modified', 'datetime', [
                'default' => 'current_timestamp()',
                'limit' => null,
                'null' => true,
            ])
            ->update();

        $this->table('projects')
            ->addColumn('status_id', 'integer', [
                'after' => 'date_start',
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

        $this->table('projects')
            ->removeColumn('status_id')
            ->update();

        $this->table('sessions')
            ->changeColumn('created', 'datetime', [
                'default' => 'CURRENT_TIMESTAMP',
                'length' => null,
                'null' => true,
            ])
            ->changeColumn('modified', 'datetime', [
                'default' => 'CURRENT_TIMESTAMP',
                'length' => null,
                'null' => true,
            ])
            ->update();
    }
}
