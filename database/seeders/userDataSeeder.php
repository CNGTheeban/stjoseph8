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
                'usertype' => base64_encode('Admin'),
                'firstname' => base64_encode('Admin'),
                'lastname' => base64_encode('Admin'),
                'nic' => '',
                'email' => base64_encode('admin@gmail.com'),
                'password' => base64_encode('admin'),
                'status' => '1'
            ],
            [
                'usertype' => base64_encode('User'),
                'firstname' => base64_encode('User'),
                'lastname' => base64_encode('User'),
                'nic' => '',
                'email' => base64_encode('parent@gmail.com'),
                'password' => base64_encode('parent'),
                'status' => '1'
            ]
        ];

        DB::table('users')->insert($dataList);
    }
}
