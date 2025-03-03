<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Admin extends Migration
{
    public function up()
    {
        $fields = [
            'id' => [
                'type' => 'int',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
                'null' => false,
            ],
            'firstname' => [
                'type' => 'varchar',
                'constraint' => 100,
                'null' => false,
                'unique' => true
            ],
            'lastname' => [
                'type' => 'varchar',
                'constraint' => 100,
                'null' => false,
            ],
            'middlename' => [
                'type' => 'varchar',
                'constraint' => 100,
                'null' => true,
            ],
            'email' => [
                'type' => 'varchar',
                'constraint' => 100,
                'null' => false
            ],
            'status' => [
                'type' => 'tinyint',
                'constraint' => 1,
                'null' => false,
                'default' => 1,
            ],
        ];

        $this->forge->addField($fields);
        $this->forge->addKey('id', true);
        $this->forge->createTable('admin', true);
    }

    public function down()
    {
        $this->forge->dropTable('admin');
    }
}