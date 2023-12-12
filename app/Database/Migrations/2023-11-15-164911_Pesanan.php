<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pesanan extends Migration
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
            'status' => [
                'type'       => "ENUM('Sedang diproses', 'Selesai', 'Dibatalkan')",
                'default'    => 'Sedang diproses',
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
            'pembayaran' => [
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
        $this->forge->createTable('pesanans');
    }

    public function down()
    {
        $this->forge->dropTable('pesanans');
    }
}
