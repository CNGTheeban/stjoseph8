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
                'usertype' => bcrypt('Admin'),
                'firstname' => bcrypt('Admin'),
                'lastname' => bcrypt('Admin'),
                'nic' => '',
                'email' => bcrypt('admin@gmail.com'),
                'password' => bcrypt('admin'),
                'status' => '1'
            ],
            [
                'usertype' => bcrypt('User'),
                'firstname' => bcrypt('User'),
                'lastname' => bcrypt('User'),
                'nic' => '',
                'email' => bcrypt('parent@gmail.com'),
                'password' => bcrypt('parent'),
                'status' => '1'
            ]
        ];

        DB::table('users')->insert($dataList);
    }
}
