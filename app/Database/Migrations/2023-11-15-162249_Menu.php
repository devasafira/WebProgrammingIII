<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Menu extends Migration
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
            'nama_menu' => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
            ],
            'gambar' => [
                'type'       => 'VARCHAR',
                'constraint' => '120',
            ],
            'kategori' => [
                'type' => 'VARCHAR',
                'constraint' => '20',
            ],
            'harga' => [
                'type' => 'INT',
                'constraint' => 11
            ],
            'stok' => [
                'type' => 'INT',
                'constraint' => 11
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('menu');
    }

    public function down()
    {
        $this->forge->dropTable('menu');
    }
}
