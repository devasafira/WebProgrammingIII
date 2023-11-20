<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use PHPUnit\Framework\Constraint\Constraint;

class Cart extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'id_table' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'table_number' => [
                'type' => 'VARCHAR',
                'constraint' => '20',
            ],
            'nama_pembeli' => [
                'type' => 'VARCHAR',
                'constraint' => '20',
            ],
            'id_menu' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'nama_menu' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'harga' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'jumlah' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'total' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('carts');
    }

    public function down()
    {
        $this->forge->dropTable('carts');
    }
}
