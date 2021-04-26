<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreateUsersTable extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change(): void
    {

        $table = $this->table('users');
        // primary key id is automatically created
        $table->addColumn('email', 'string', ['limit' => 255])
              ->addIndex(['email'], ['unique' => true])
              ->addColumn('password', 'string', ['limit' => 255])
              ->addColumn('first_name', 'string', ['limit' => 255])
              ->addColumn('last_name', 'string', ['limit' => 255])
              ->addColumn('admin', 'boolean', ['null' => false, 'signed' => false, 'default' => 1])
              ->addTimestamps(null, 'amended_at')
              ->create();
    }
}
