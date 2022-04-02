<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
                'username' => 'Firgi',
                'phone' => '081334552124',
                'gender' => 'Laki-Laki',
                'image' => '',
                'level' => '',
                'address' => 'Pasuruan',
                'email' => 'firgi@gmail.com',
                'password' => Hash::make('123'),
            ],
            [
                'name' => 'sotya',
                'username' => 'Firgi',
                'phone' => '081334552124',
                'gender' => 'Laki-Laki',
                'image' => '',
                'level' => '',
                'address' => 'Pasuruan',
                'email' => 'sotya@gmail.com',
                'password' => Hash::make('123'),
            ],
            [
                'name' => 'lazuardi',
                'username' => 'Shankara',
                'phone' => '0897867565',
                'gender' => 'Laki-Laki',
                'image' => '',
                'level' => '',
                'address' => 'Pasuruan',
                'email' => 'lazuardi@gmail.com',
                'password' => Hash::make('123'),
            ],
            [
                'name' => 'timur',
                'username' => 'Shankara',
                'phone' => '0897867565',
                'gender' => 'Laki-Laki',
                'image' => '',
                'level' => 'admin',
                'email' => 'timur@gmail.com',
                'address' => 'Pasuruan',
                'password' => Hash::make('123'),
            ]
        ]);
    }
}
