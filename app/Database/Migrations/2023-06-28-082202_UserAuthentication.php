<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UserAuthentication extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => ['type' => 'INT', 'auto_increment' => true],
            'email' => ['type'=> 'VARCHAR', 'constraint' => 200],
            'password'=>['type'=>'VARCHAR', 'constraint' => 200]
        ]);

        $this->forge->addKey('id',true);
        $this->forge->createTable('user');
    }

    public function down()
    {
        //
    }
}
