<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class UserNewColumnTelegram extends AbstractMigration
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
            ->addColumn('telegram', 'text', [
                'after' => 'status_id',
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

        $this->table('employees')
            ->removeColumn('telegram')
            ->update();
    }
}
