<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Balance extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => ['type' => 'INT', 'auto_increment' => true],
            'user_id' => ['type'=> 'int', 'constraint' => 200],
            'account_balance'=>['type'=>'decimal', 'constraint' => '10,2'],
        ]);

        $this->forge->addKey('id',true);
        $this->forge->createTable('balance');
    }

    public function down()
    {
        //
    }
}
