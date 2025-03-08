<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Holidays extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => ['type' => 'INT', 'constraint' => 5, 'unsigned' => true, 'auto_increment' => true],
            'hdate'  => ['type' => 'datetime', 'null' => true],
            'reason' => [ 'type' => 'VARCHAR', 'constraint' => 200, 'null' => true],
            'created_at'  => ['type' => 'datetime', 'null' => true],
            'updated_at'  => ['type' => 'datetime', 'null' => true],
            'deleted_at'  => ['type' => 'datetime', 'null' => true],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('holidays', false, ['ENGINE' => 'InnoDB']);
    }

    public function down()
    {
        $this->forge->dropTable( 'holidays');
    }
}
