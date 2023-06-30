<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Transaction extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => ['type' => 'INT', 'auto_increment' => true],
            'from' => ['type'=> 'VARCHAR', 'constraint' => 200],
            'amount'=>['type'=>'VARCHAR', 'constraint' => 200],
            'created_date datetime default current_timestamp'
        ]);

        $this->forge->addKey('id',true);
        $this->forge->createTable('transactions');
    }

    public function down()
    {
        //
    }
}
