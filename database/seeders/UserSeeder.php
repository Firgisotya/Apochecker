<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'firgi',
                'phone' => '081334552124',
                'gender' => 'Laki-Laki',
                'image' => '',
                'level' => 'admin',
                'email' => 'firgi@gmail.com',
                'password' => 'password',
            ],
            [
                'name' => 'sotya',
                'phone' => '081334552124',
                'gender' => 'Laki-Laki',
                'image' => '',
                'level' => 'user',
                'email' => 'sotya@gmail.com',
                'password' => 'password',
            ]
            ]);
    }
}
