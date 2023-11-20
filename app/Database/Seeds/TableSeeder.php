<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TableSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'table_number' => 'table 1',
                'password' => password_hash('table@1', PASSWORD_BCRYPT),
                'status' => 'Tidak Aktif'
            ],
            [
                'table_number' => 'table 2',
                'password' => password_hash('table@2', PASSWORD_BCRYPT),
                'status' => 'Tidak Aktif'
            ],
            [
                'table_number' => 'table 3',
                'password' => password_hash('table@3', PASSWORD_BCRYPT),
                'status' => 'Tidak Aktif'
            ],
            [
                'table_number' => 'table 4',
                'password' => password_hash('table@4', PASSWORD_BCRYPT),
                'status' => 'Tidak Aktif'
            ],
            [
                'table_number' => 'table 5',
                'password' => password_hash('table@5', PASSWORD_BCRYPT),
                'status' => 'Tidak Aktif'
            ],
        ];

        $this->db->table('table')->insertBatch($data);
    }
}
