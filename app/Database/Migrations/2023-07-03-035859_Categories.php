<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Categories extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => ['type' => 'INT', 'auto_increment' => true],
            'name' => ['type' => 'VARCHAR', 'constraint' => 200],
            'user_id' => ['type' => 'INT']
        ]);

        $this->forge->addKey('id');
        $this->forge->createTable('categories');

    }

    public function down()
    {
        $this->forge->dropTable('categories');
    }
}
