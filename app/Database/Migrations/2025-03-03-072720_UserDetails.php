<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UserDetails extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => ['type' => 'INT', 'constraint' => 5, 'unsigned' => true, 'auto_increment' => true],
            'user_id' => [ 'type' => 'INT', 'constraint' => 5,'unsigned' => true ],
            'firstname' => [ 'type' => 'VARCHAR', 'constraint' => 200, 'null' => true],
            'middlename' => [ 'type' => 'VARCHAR', 'constraint' => 200, 'null' => true],
            'lastname' => [ 'type' => 'VARCHAR', 'constraint' => 200, 'null' => true],
            'mobile' => [ 'type' => 'VARCHAR', 'constraint' => 20],
            'address1' => [ 'type' => 'TEXT'],
            'address2' => [ 'type' => 'TEXT'],
            'city' => [ 'type' => 'VARCHAR', 'constraint' => 200, 'null' => true],
            'state' => [ 'type' => 'VARCHAR', 'constraint' => 200, 'null' => true],
            'zip' => [ 'type' => 'INT', 'constraint' => 5,'unsigned' => true, 'null' => true],
            'created_at'  => ['type' => 'datetime', 'null' => true],
            'updated_at'  => ['type' => 'datetime', 'null' => true],
            'deleted_at'  => ['type' => 'datetime', 'null' => true],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('user_details', false, ['ENGINE' => 'InnoDB']);
    }

    public function down()
    {
        $this->forge->dropTable('user_details');
    }
}
