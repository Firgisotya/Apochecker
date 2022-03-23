<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Muhammad Lazuardi Timur',
                'email' => 'lazuardit21@gmail.com',
                'password' => Hash::make('123'),
            ],
            [
                'name' => 'Firgi Sotya Izzuddin',
                'email' => 'firgisotya@gmail.com',
                'password' => Hash::make('123'),
            ]
        ]);
    }
}
