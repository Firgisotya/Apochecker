<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TestimoniSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('testimonis')->insert([
            [
                'photo' => 'img/avaters/avatar1.png',
                'name' => 'Dewi Puspita',
                'job_title' => 'Customer',
                'comment' => 'Apochecker adalah sebuah aplikasi yang sangat bermanfaat untuk membantu anda dalam mendapatkan informasi tentang apa yang anda butuhkan. Apochecker memiliki fitur yang sangat lengkap dan bermanfaat.',
            ],
            [
                'photo' => 'img/avaters/avatar2.png',
                'name' => 'Rangga Pratama',
                'job_title' => 'Customer',
                'commnet' => 'Apochecker adalah sebuah aplikasi yang sangat bermanfaat untuk membantu anda dalam mendapatkan obat yang anda butuhkan. Apochecker memiliki fitur yang sangat lengkap dan bermanfaat.',
            ],
            [
                'photo' => 'img/avaters/avatar3.png',
                'name' => 'Ryan Hartanto',
                'job_title' => 'Customer',
                'comment' => 'Apochecker adalah sebuah aplikasi yang sangat bermanfaat untuk membantu anda dalam mendapatkan obat-obatan dimasa pandemi. Apochecker memiliki fitur yang sangat lengkap dan bermanfaat.',
            ]
        ]);
    }
}
