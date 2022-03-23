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
<<<<<<< HEAD
        // \App\Models\User::factory(10)->create();

        $this->call([
            UserSeeder::class,
=======
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
>>>>>>> 62fae716ccf145b2e6e10fbe256c6b2478ce2734
        ]);
    }
}
