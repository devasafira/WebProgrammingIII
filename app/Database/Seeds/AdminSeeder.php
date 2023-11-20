<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'nama' => 'admin',
            'email'    => 'admin@admin.com',
            'password' => password_hash('admin', PASSWORD_BCRYPT),
        ];
    
        // Simple Queries
        // $this->db->query('INSERT INTO admin (username, email) VALUES(:username:, :email:)', $data);

        // Using Query Builder
        $this->db->table('admin')->insert($data);
    }
}
