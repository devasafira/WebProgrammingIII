<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Carts extends Migration
{
    public function up()
    {
        $this->forge->addField([
            // ...
            'created_at' => ['type' => 'datetime', 'null' => true],
            // ...
        ]);
    }

    public function down()
    {
        //
    }
}
