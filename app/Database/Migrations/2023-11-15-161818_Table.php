<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Table extends Migration
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
            'table_number' => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
            ],
            'status' => [
                'type'       => "ENUM('Aktif', 'Tidak Aktif', 'Dibooking')",
                'default'    => 'Tidak Aktif',
            ],
            'username' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => '20',
            ],
            
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('table');
    }

    public function down()
    {
        $this->forge->dropTable('table');
    }
}


