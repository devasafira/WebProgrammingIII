<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TestingSeeder extends Seeder
{
    public function run()
    {
        $this->call('AdminSeeder');
        $this->call('MenuSeeder');
        $this->call('KategoriSeeder');
        $this->call('TableSeeder');
        $this->call('MaterialsSeeder');
        $this->call('HistorySeeder');

    }
}
