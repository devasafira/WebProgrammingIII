<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class RiwayatPesanan extends Migration
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
            'tanggal_pembelian' => [
                'type'       => 'DATETIME',
                'null'      => true,
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
            'id_admin' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'nama_admin' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('riwayat_pesanans');
    }

    public function down()
    {
        $this->forge->dropTable('riwayat_pesanans');
    }
}
