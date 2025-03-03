<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class CreateTableSessionManager extends Migration
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
            'session_name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false,
            ],
            'language' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
                'null' => false,
            ],
            'version' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
                'null' => false,
            ],
            'start_duration' => [
                'type' => 'datetime',
                'null' => false,
            ],
            'end_duration' => [
                'type' => 'datetime',
                'null' => false,
            ],
            'invitation_expire' => [
                'type' => 'int',
                'constraint' => '11',
                'null' => false,
                'comment' => 'in minutes'
            ],
            'allow_review' => [
                'type' => 'tinyint',
                'constraint' => '1',
                'default' => '1'
            ],
            'hash_link' => [
                'type' => 'text',
                'null' => true
            ],
            'process_status' => [
                'type' => 'tinyint',
                'constraint' => '1',
                'default' => '0',
                'comment' => '1:pass, 0:fail'
            ],
            'status' => [
                'type' => 'tinyint',
                'constraint' => '1',
                'default' => '1',
                'comment' => '1:active, 0:inactive'
            ],
            'created_at' => [
                'type' => 'timestamp',
                'null' => false,
                'default' => new RawSql('CURRENT_TIMESTAMP'),
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('session_manager');
    }

    public function down()
    {
        $this->forge->dropTable('session_manager');
    }
}
