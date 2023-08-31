<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class userDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Seed users
        $dataList = [
            [
                'usertype' => 'Admin',
                'firstname' => 'Admin',
                'lastname' => 'Admin',
                'nic' => '',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('admin'),
                'status' => '1'
            ],
            [
                'usertype' => 'User',
                'firstname' => 'User',
                'lastname' => 'User',
                'nic' => '',
                'email' => 'parent@gmail.com',
                'password' => bcrypt('parent'),
                'status' => '1'
            ]
        ];

        DB::table('users')->insert($dataList);
    }
}
