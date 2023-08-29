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
                'username' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('admin'),
                'reference' => 'admin',
                'status' => '1'
            ],
            [
                'usertype' => 'Parent',
                'username' => 'Parent',
                'email' => 'parent@gmail.com',
                'password' => bcrypt('parent'),
                'reference' => 'parent',
                'status' => '1'
            ],
            [
                'usertype' => 'Doner',
                'username' => 'Doner',
                'email' => 'doner@gmail.com',
                'password' => bcrypt('doner'),
                'reference' => 'doner',
                'status' => '1'
            ]
        ];

        DB::table('users')->insert($dataList);
    }
}
