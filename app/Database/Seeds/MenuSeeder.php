<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MenuSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama_menu' => 'Tobiko Sushi',
                'gambar'    => 'https://ichibansushi.co.id/wp-content/uploads/2023/06/TOBIKO-SUSHI.jpg',
                'kategori' => 'Nigiri Sushi',
                'harga' => 20000,
                'stok'  => 120,
            ],
            [
                'nama_menu' => 'Tamago Sushi',
                'gambar'    => 'https://ichibansushi.co.id/wp-content/uploads/2023/07/TAMAGO-SUSHI.jpg',
                'kategori' => 'Nigiri Sushi',
                'harga' => 20000,
                'stok'  => 120,
            ],
            [
                'nama_menu' => 'Salmon Sushi',
                'gambar'    => 'https://ichibansushi.co.id/wp-content/uploads/2023/07/SALMON-SUSHI.jpg',
                'kategori' => 'Nigiri Sushi',
                'harga' => 25000,
                'stok'  => 120,
            ],
            [
                'nama_menu' => 'Tori Karage Ramen',
                'gambar'    => 'https://ichibansushi.co.id/wp-content/uploads/2023/07/TORI-KARAAGE-RAMEN.jpg',
                'kategori' => 'Ramen',
                'harga' => 30000,
                'stok'  => 120,
            ],
            [
                'nama_menu' => 'Spicy Ramen',
                'gambar'    => 'https://ichibansushi.co.id/wp-content/uploads/2023/07/SPICY-RAMEN.jpg',
                'kategori' => 'Ramen',
                'harga' => 35000,
                'stok'  => 120,
            ],
            [
                'nama_menu' => 'Milk Rasberry Panacota',
                'gambar'    => 'https://ichibansushi.co.id/wp-content/uploads/2023/06/MILK-RASPBERRY-PANNA-COTTA.jpg',
                'kategori' => 'Dessert',
                'harga' => 20000,
                'stok'  => 120,
            ],
            
        ];
    
        // Simple Queries
        // $this->db->query('INSERT INTO admin (username, email) VALUES(:username:, :email:)', $data);

        // Using Query Builder
        $this->db->table('menu')->insertBatch($data);
    }
}
