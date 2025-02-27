<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class CreateTableUser extends Migration
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
            'username' => [
                'type' => 'varchar',
                'constraint' => 100,
                'null' => false,
            ],
            'password' => [
                'type' => 'varchar',
                'constraint' => 255,
                'null' => false
            ],
            'user_table_id' => [
                'type' => 'int',
                'constraint' => 11,
                'null' => false
            ],
            'user_type' => [
                'type' => 'varchar',
                'constraint' => 100,
                'null' => false
            ],
            'has_change_password' => [
                'type' => 'tinyint',
                'constraint' => 1,
                'null' => false,
                'default' => 0,
            ],
            'status' => [
                'type' => 'tinyint',
                'constraint' => 1,
                'null' => false,
                'default' => 0,
            ],
            'created_at' => [
                'type' => 'timestamp',
                'default' => new RawSql('current_timestamp'),
            ]
        ];
        $this->forge->addField($fields);
        $this->forge->addKey('id', true);
        $this->forge->createTable('users', true);
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
