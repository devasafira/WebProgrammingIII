<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Materials extends Migration
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
            'bahan' => [
                'type'       => 'VARCHAR',
                'constraint' => '150',
            ],
            'stok' => [
                'type'      => 'INT',
                'constraint'=> 3,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('Materials');
    }

    public function down()
    {
        $this->forge->dropTable('Materials');
    }
}
