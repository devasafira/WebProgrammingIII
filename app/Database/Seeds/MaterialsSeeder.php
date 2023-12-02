<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MaterialsSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'bahan' => 'Rice',
                'stok' => 1000, // per gram
            ],
            [
                'bahan' => 'Nori',
                'stok' => 10, // per piece
            ],
            [
                'bahan' => 'Salmon',
                'stok' => 10, // per piece
            ],
            [
                'bahan' => 'Tobiko',
                'stok' => 100, // per gram
            ],
            [
                'bahan' => 'Ramen',
                'stok' => 10, // per piece
            ],
            [
                'bahan' => 'Chicken Fillet',
                'stok' => 10, // per piece
            ],
            [
                'bahan' => 'Beef Fillet',
                'stok' => 10, // per piece
            ],
            [
                'bahan' => 'Chilli Powder',
                'stok' => 100, // per gram
            ],
            

        ];

        $this->db->table('materials')->insertBatch($data);
    
    }
}
