<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableRolesUser extends Migration
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
                'type' => 'int',
                'constraint' => 11,
                'null' => false,
            ],
            'user_id' => [
                'type' => 'int',
                'constraint' => 11,
                'null' => false,
            ],
        ];

        $this->forge->addField($fields);
        $this->forge->addKey('id', true);
        $this->forge->createTable('roles_user', true);
    }

    public function down()
    {
        $this->forge->dropTable('roles_user');
    }
}
