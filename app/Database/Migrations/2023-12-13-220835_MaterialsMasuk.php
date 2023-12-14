<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MaterialsMasuk extends Migration
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
            'tanggal' => [
                'type'       => 'DATETIME',
                'null'       => true,
            ],
            'bahan' => [
                'type'       => 'VARCHAR',
                'constraint' => '150',
            ],
            'jumlah' => [
                'type'      => 'INT',
                'constraint'=> 3,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('materials_masuk');
    }

    public function down()
    {
        $this->forge->dropTable('materials_masuk');
    }
}
