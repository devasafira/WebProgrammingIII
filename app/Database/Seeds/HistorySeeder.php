<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class HistorySeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'tanggal_pembelian' => date('Y-m-d H:i:s'),
                'id_table' => '',
                'table_number' => 'table 1',
                'id_menu' => '',
                'nama_menu' => 'Tobiko Sushi',
                'harga' => 20000,
                'jumlah' => 2,
                'total' => 40000,
                'nama_admin' => 'Deva',
                
            ],
            [
                'tanggal_pembelian' => date('Y-m-d H:i:s'),
                'id_table' => '',
                'table_number' => 'table 2',
                'id_menu' => '',
                'nama_menu' => 'Tamago Sushi',
                'harga' => 20000,
                'jumlah' => 2,
                'total' => 40000,
                'nama_admin' => 'Deva',
                
            ],
            [
                'tanggal_pembelian' => date('Y-m-d H:i:s'),
                'id_table' => '',
                'table_number' => 'table 3',
                'id_menu' => '',
                'nama_menu' => 'Spicy Ramen',
                'harga' => 30000,
                'jumlah' => 2,
                'total' => 60000,
                'nama_admin' => 'Deva',
                
            ],
            
        ];

        $this->db->table('riwayat_pesanans')->insertBatch($data);
    }
}
