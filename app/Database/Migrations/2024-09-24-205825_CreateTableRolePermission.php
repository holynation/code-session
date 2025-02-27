<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTablePermission extends Migration
{
    public function up()
    {
        $fields = [
            'id' => [
                'type' => 'int',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'role_id' => [
                'type' => 'text',
                'null' => false
            ],
            'permission' => [
                'type' => 'varchar',
                'constraint' => 50,
                'null' => false,
            ],
        ];

        $this->forge->addField($fields);
        $this->forge->addKey('id', true);
        $this->forge->createTable('roles_permission', true);
    }

    public function down()
    {
        $this->forge->dropTable('roles_permission');
    }
}
