<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class CreateTableSessionQuestion extends Migration
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
                'type' => 'VARCHAR',
                'constraint' => 128,
                'null' => false,
            ],
            'question' => [
                'type' => 'text',
                'null' => false,
            ],
            'instruction' => [
                'type' => 'text',
                'null' => false,
            ],
            'total_score' => [
                'type' => 'float',
                'constraint' => '10,2',
                'null' => false,
            ],
            'score_percentage' => [
                'type' => 'float',
                'constraint' => '10,2',
                'null' => false
            ],
            'input_data' => [
                'type' => 'text',
                'null' => false
            ],
            'expected_output' => [
                'type' => 'text',
                'null' => false
            ],
            'status' => [
                'type' => 'tinyint',
                'constraint' => '1',
                'default' => '0',
            ],
            'created_at' => [
                'type' => 'timestamp',
                'null' => false,
                'default' => new RawSql('CURRENT_TIMESTAMP'),
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('session_questions');
    }

    public function down()
    {
        $this->forge->dropTable('session_questions');
    }
}
