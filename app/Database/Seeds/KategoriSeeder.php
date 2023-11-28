<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class KategoriSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'kategori' => 'Appertizer'
            ],
            [
                'kategori' => 'Nigiri Sushi'
            ],
            [
                'kategori' => 'Sushi Roll'
            ],
            [
                'kategori' => 'Ramen'
            ],
            [
                'kategori' => 'Dessert'
            ],
            [
                'kategori' => 'Drinks'
            ],

        ];

        $this->db->table('kategoris')->insertBatch($data);
    }
}
