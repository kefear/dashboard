<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class SessionsTableChangeDataToBlob64 extends AbstractMigration
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
            ->changeColumn('data', 'binary', [
                'default' => null,
                'limit' => 4294967295,
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

        $this->table('sessions')
            ->changeColumn('data', 'binary', [
                'default' => null,
                'length' => null,
                'null' => true,
            ])
            ->update();
    }
}
