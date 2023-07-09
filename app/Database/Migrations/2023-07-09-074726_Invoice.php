<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Invoice extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'statement_number' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null' => true,
            ],
            'issue_date' => [
                'type'       => 'DATE',
                'null' => true,
            ],
            'due_date' => [
                'type'       => 'DATE',
                'null' => true,
            ],
            'issue_to' => [
                'type'       => 'INT',
                'constraint' => '100',
                'null' => true,
            ],
            'currency' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null' => true,
            ],
            'items' => [
                'type'       => 'TEXT',
                'null' => true,
            ],
            'tax_shipping_amount' => [
                'type'       => 'TEXT',
                'null' => true,
            ],
            'amount' => [
                'type'       => 'DECIMAL',
                'constraint'     => '10,2',
                'null' => true,
            ],
            'remarks' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null' => true,
            ],
            'template' => [
                'type'       => 'INT',
                'constraint' => '100',
                'null' => true,
            ],
            'created_at' => [
                'type'    => 'INT',
                'default' => null,
                'null' => true,
            ],
            'updated_at' => [
                'type'    => 'INT',
                'default' => null,
                'null' => true,
            ],
            'deleted_at' => [
                'type'    => 'INT',
                'default' => null,
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('invoices');

    }

    public function down()
    {
        $this->forge->dropTable('invoices');
    }
}
