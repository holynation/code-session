<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'firstname' => 'admin',
            'lastname' => 'admin',
            'middlename' => 'admin',
            'email'    => 'admin@gmail.com',
            'status' => '1'
        ];
        $this->db->table('admin')->insert($data);
        $insertID = $this->db->insertID();

        $data = [
            'username' => 'admin@gmail.com',
            'password' => password_hash('admin', PASSWORD_DEFAULT),
            'user_table_id' => $insertID,
            'user_type' => 'admin',
            'status' => '1',
            'created_at' => date('Y-m-d H:i:s')
        ];
        $this->db->table('users')->insert($data);
    }
}
