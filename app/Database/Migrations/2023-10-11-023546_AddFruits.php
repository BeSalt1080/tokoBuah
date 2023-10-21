<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddFruits extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'int',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'name' => [
                'type'           => 'text',
                'null'           => false
            ], 
            'description' => [
                'type'           => 'text',
                'null'           => false
            ],
            'image' => [
                'type'           => 'text',
                'null'           => false
            ],
            'price' => [
                'type'           => 'int',
                'constraint'     => 10,
                'unsigned'       => true,
                'null'           => false
            ]
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('fruits');
    }

    public function down()
    {
        $this->forge->dropTable('fruits');
    }
}
