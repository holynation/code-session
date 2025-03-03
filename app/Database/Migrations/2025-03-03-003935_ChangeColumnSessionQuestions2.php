<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ChangeColumnSessionQuestions2 extends Migration
{
    public function up()
    {
        // remove the column score_percentage from session_questions table
        $this->forge->dropColumn('session_questions', [
            'score_percentage', 'total_score'
        ]);

        $fields = [
            'input_data' => [
                'name' => 'test_cases',
                'type' => 'longtext',
                'null' => false,
            ],
            'expected_output' => [
                'name' => 'flags',
                'type' => 'longtext',
                'null' => false,
            ],
        ];
        $this->forge->modifyColumn('session_questions', $fields);
    }

    public function down()
    {
        // add the column score_percentage to session_questions table
        $this->forge->addColumn('session_questions', [
            'score_percentage' => [
                'type' => 'float',
                'constraint' => '10,2',
                'null' => false,
            ],
            'total_score' => [
                'type' => 'float',
                'constraint' => '10,2',
                'null' => false,
            ],
        ]);

        $fields = [
            'test_cases' => [
                'name' => 'input_data',
                'type' => 'float',
                'constraint' => '10,2',
                'null' => false,
            ],
            'flags' => [
                'name' => 'expected_output',
                'type' => 'float',
                'constraint' => '10,2',
                'null' => false,
            ],
        ];
        $this->forge->modifyColumn('session_questions', $fields);

    }
}
