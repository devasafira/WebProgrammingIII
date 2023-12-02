<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class KategoriSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'kategori' => 'Nigiri Sushi'
            ],
            [
                'kategori' => 'Ramen'
            ],
            [
                'kategori' => 'Drinks'
            ],

        ];

        $this->db->table('kategoris')->insertBatch($data);
    }
}
