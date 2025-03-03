<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class CreateTableSessionStudents extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
                'null' => false,
            ],
            'user_id' => [
                'type' => 'int',
                'constraint' => 11,
                'null' => false
            ],
            'session_manager_id' => [
                'type' => 'int',
                'constraint' => 11,
                'null' => false,
            ],
            'matric_number' => [
                'type' => 'varchar',
                'constraint' => '30',
                'null' => false,
            ],
            'fullname' => [
                'type' => 'varchar',
                'constraint' => '130',
                'null' => true
            ],
            'status' => [
                'type' => 'tinyint',
                'constraint' => 1,
                'default' => 0,
            ],
            'created_at' => [
                'type' => 'timestamp',
                'null' => false,
                'default' => new RawSql('CURRENT_TIMESTAMP'),
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('session_students');
    }

    public function down()
    {
        $this->forge->dropTable('session_students');
    }
}
