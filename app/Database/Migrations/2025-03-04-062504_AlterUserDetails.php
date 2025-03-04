<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlterUserDetails extends Migration
{
    public function up()
    {
        $this->forge->addColumn('user_details', [
            'country_id' => [ 'type' => 'MEDIUMINT', 'constraint' => 5,'unsigned' => true, 'after' => 'lastname' ],
            'phonecode' => [ 'type' => 'VARCHAR', 'constraint' => 200, 'null' => true, 'after' => 'country_id'],
        ]);
        $this->forge->addForeignKey('country_id', 'countries', 'id', 'CASCADE', 'CASCADE');
        $this->forge->processIndexes('user_details');
    }

    public function down()
    {
        $this->forge->dropColumn('user_details',['country_id','phonecode']);
    }
}
