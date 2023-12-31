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
                'nama_menu' => 'Cola Drink',
                'gambar'    => 'https://youings.com/content/images/thumbs/0006070_COKE-CANS-330MLS-X-24.jpeg',
                'kategori' => 'Drink',
                'harga' => 15000,
                'stok'  => 120,
            ],
            [
                'nama_menu' => 'Sprite Drink',
                'gambar'    => 'https://th.bing.com/th/id/OIP.FooAMaUUDkt3u9UqngGGMQHaHa?rs=1&pid=ImgDetMain',
                'kategori' => 'Drink',
                'harga' => 15000,
                'stok'  => 120,
            ],

            
        ];
    
        // Simple Queries
        // $this->db->query('INSERT INTO admin (username, email) VALUES(:username:, :email:)', $data);

        // Using Query Builder
        $this->db->table('menu')->insertBatch($data);
    }
}
