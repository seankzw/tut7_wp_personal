<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Transaction extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => ['type' => 'INT', 'auto_increment' => true],
            'date' => ['type' => 'DATETIME'],
            'desc' => ['type'=> 'VARCHAR', 'constraint' => 200],
            'category' => ['type'=> 'VARCHAR', 'constraint' => 200],
            'amount'=>['type'=>'DECIMAL', 'constraint' => 200],
            'user_id' => ['type' => 'INT']
        ]);

        $this->forge->addKey('id',true);
        $this->forge->createTable('transactions');
    }

    public function down()
    {
        $this->forge->dropTable('transactions');
    }
}
