<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'category_id' => 1,
                'name' => 'Procold',
                'slug' => 'procold',
                'description' => 'Procold Flu dan Batuk merupakan produk obat yang digunakan untuk mengatasi gejala flu dan batuk. Kandungan Procold Flu dan Batuk adalah dextromethorphan HBr, paracetamol, dan pseudoefedrin HCl. Procold Flu dan Batuk cocok digunakan untuk mengatasi sakit kepala, hidung tersumbat, dan batuk tidak berdahak.',

                'price' => '5000',
                'stock' => 10,
            ],
            [
                'category_id' => 1,
                'name' => 'OBH Combi',
                'slug' => 'obh-combi',
                'description' => 'OBH Combi adalah obat yang digunakan untuk mengatasi gejala flu dan batuk. Kandungan OBH Combi adalah dextromethorphan HBr, paracetamol, dan pseudoefedrin HCl. OBH Combi cocok digunakan untuk mengatasi sakit kepala, hidung tersumbat, dan batuk tidak berdahak.',

                'price' => '25000',
                'stock' => 10,
            ],
            [
                'category_id' => 1,
                'name' => 'Bodrexin Flu & Batuk',
                'slug' => 'bodrexin-flu-batuk',
                'description' => 'Bodrexin Flu dan Batuk adalah obat yang digunakan untuk mengatasi gejala flu dan batuk. Kandungan Bodrexin Flu dan Batuk adalah dextromethorphan HBr, paracetamol, dan pseudoefedrin HCl. Bodrexin Flu dan Batuk cocok digunakan untuk mengatasi sakit kepala, hidung tersumbat, dan batuk tidak berdahak.',

                'price' => '12000',
                'stock' => 10,
            ],
            [
                'category_id' => 1,
                'name' => 'Mixagrip Flu',
                'slug' => 'mixagrip-flu',
                'description' => 'Mixagrip Flu adalah obat yang digunakan untuk mengatasi gejala flu. Kandungan Mixagrip Flu adalah dextromethorphan HBr, paracetamol, dan pseudoefedrin HCl. Mixagrip Flu cocok digunakan untuk mengatasi sakit kepala, hidung tersumbat, dan batuk tidak berdahak.',

                'price' => '17000',
                'stock' => 10,
            ],
            [
                'category_id' => 1,
                'name' => 'Decolgen Flu',
                'slug' => 'decolgen-flu',
                'description' => 'Decolgen Flu adalah obat yang digunakan untuk mengatasi gejala flu. Kandungan Decolgen Flu adalah dextromethorphan HBr, paracetamol, dan pseudoefedrin HCl. Decolgen Flu cocok digunakan untuk mengatasi sakit kepala, hidung tersumbat, dan batuk tidak berdahak.',

                'price' => '20000',
                'stock' => 10,
            ],
            [
                'category_id' => 1,
                'name' => 'Inza',
                'slug' => 'inza',
                'description' => 'Inza adalah obat yang digunakan untuk mengatasi gejala flu. Kandungan Inza adalah dextromethorphan HBr, paracetamol, dan pseudoefedrin HCl. Inza cocok digunakan untuk mengatasi sakit kepala, hidung tersumbat, dan batuk tidak berdahak.',

                'price' => '3500',
                'stock' => 10,
            ],
            [
                'category_id' => 2,
                'name' => 'Paracetamol',
                'slug' => 'paracetamol',
                'description' => 'Paracetamol atau asetaminofen adalah obat analgesik dan antipiretik yang banyak dipakai untuk meredakan sakit kepala ringan akut, nyeri ringan hingga sedang, serta demam.',

                'price' => '7000',
                'stock' => 10,
            ],
            [
                'category_id' => 2,
                'name' => 'Bufect Ibuprofen',
                'slug' => 'bufect-ibuprofen',
                'description' => 'Bufect Ibuprofen adalah obat analgesik dan antipiretik yang banyak dipakai untuk meredakan sakit kepala ringan akut, nyeri ringan hingga sedang, serta demam.',

                'price' => '5000',
                'stock' => 10,
            ],
            [
                'category_id' => 2,
                'name' => 'Sanmol',
                'slug' => 'sanmol',
                'description' => 'Sanmol adalah obat analgesik dan antipiretik yang banyak dipakai untuk meredakan sakit kepala ringan akut, nyeri ringan hingga sedang, serta demam.',

                'price' => '8000',
                'stock' => 10,
            ],
            [
                'category_id' => 2,
                'name' => 'Panadol',
                'slug' => 'panadol',
                'description' => 'Panadol adalah obat analgesik dan antipiretik yang banyak dipakai untuk meredakan sakit kepala ringan akut, nyeri ringan hingga sedang, serta demam.',

                'price' => '5000',
                'stock' => 10,
            ],
            [
                'category_id' => 2,
                'name' => 'Bodrex',
                'slug' => 'bodrex',
                'description' => 'Bodrex adalah obat analgesik dan antipiretik yang banyak dipakai untuk meredakan sakit kepala ringan akut, nyeri ringan hingga sedang, serta demam.',

                'price' => '8000',
                'stock' => 10,
            ],
            [
                'category_id' => 3,
                'name' => 'Oralit',
                'slug' => 'oralit',
                'description' => 'Oralit adalah obat yang bermanfaat untuk menggantikan cairan dan elektrolit tubuh yang hilang akibat diare, sehingga bisa mencegah dan mengatasi dehidrasi. Oralit bisa dikonsumsi oleh siapa saja, baik oleh bayi, anak-anak, maupun orang dewasa.',

                'price' => '5000',
                'stock' => 10,
            ],
            [
                'category_id' => 3,
                'name' => 'Neo Entrostop',
                'slug' => 'neo-entrostop',
                'description' => 'Neo Entrostop adalah obat yang bermanfaat untuk menggantikan cairan dan elektrolit tubuh yang hilang akibat diare, sehingga bisa mencegah dan mengatasi dehidrasi. Neo Entrostop bisa dikonsumsi oleh siapa saja, baik oleh bayi, anak-anak, maupun orang dewasa.',

                'price' => '5000',
                'stock' => 10,
            ],
            [
                'category_id' => 3,
                'name' => 'Diardis',
                'slug' => 'diardis',
                'description' => 'Diardis adalah obat yang bermanfaat untuk menggantikan cairan dan elektrolit tubuh yang hilang akibat diare, sehingga bisa mencegah dan mengatasi dehidrasi. Diardis bisa dikonsumsi oleh siapa saja, baik oleh bayi, anak-anak, maupun orang dewasa.',

                'price' => '5000',
                'stock' => 10,
            ],
            [
                'category_id' => 3,
                'name' => 'Diapet NR',
                'slug' => 'diapet-nr',
                'description' => 'Diapet NR adalah obat yang bermanfaat untuk menggantikan cairan dan elektrolit tubuh yang hilang akibat diare, sehingga bisa mencegah dan mengatasi dehidrasi. Diapet NR bisa dikonsumsi oleh siapa saja, baik oleh bayi, anak-anak, maupun orang dewasa.',

                'price' => '5000',
                'stock' => 10,
            ],
            [
                'category_id' => 3,
                'name' => 'Diatabs',
                'slug' => 'diatabs',
                'description' => 'Diatabs adalah obat yang bermanfaat untuk menggantikan cairan dan elektrolit tubuh yang hilang akibat diare, sehingga bisa mencegah dan mengatasi dehidrasi. Diatabs bisa dikonsumsi oleh siapa saja, baik oleh bayi, anak-anak, maupun orang dewasa.',

                'price' => '5000',
                'stock' => 10,
            ],
            [
                'category_id' => 3,
                'name' => 'Imodium',
                'slug' => 'imodium',
                'description' => 'Imodium adalah obat yang bermanfaat untuk menggantikan cairan dan elektrolit tubuh yang hilang akibat diare, sehingga bisa mencegah dan mengatasi dehidrasi. Imodium bisa dikonsumsi oleh siapa saja, baik oleh bayi, anak-anak, maupun orang dewasa.',

                'price' => '5000',
                'stock' => 10,
            ],
            [
                'category_id' => 4,
                'name' => 'Enervon-C',
                'slug' => 'enervon-c',
                'description' => 'Enervon-C memiliki kandungan vitamin C yang bermanfaat dalam menjaga imun. Tidak hanya itu, multivitamin ini juga memiliki kandungan vitamin B1, vitamin B2, vitamin B6, vitamin B12, vitamin D, Niacinamide, dan kalsium pantotenat.Selain untuk menjaga daya tahan tubuh, Enervon-C juga berfungsi untuk membantu memulihkan kondisi tubuh setelah sakit.',

                'price' => '45000',
                'stock' => 10,
            ],
            [
                'category_id' => 4,
                'name' => 'Renovit Multivitamin & Mineral',
                'slug' => 'renovit-multivitamin-mineral',
                'description' => 'Multivitamin ini mengandung vitamin A, vitamin B kompleks, vitamin C, vitamin D, vitamin E, dan 13 jenis mineral lainnya seperti kalsium, niacinamide, magnesium, hingga zat besi.Berbagai kandungan ini membantu meningkatkan daya tahan tubuh dan metabolisme dengan memberikan nutrisi organ-organ penting. Renovit juga membantu mempercepat proses penyembuhan setelah sakit dan aman bagi ibu hamil dan menyusui, serta penderita hipertensi dan diabetes.',

                'price' => '84500',
                'stock' => 10,
            ],
            [
                'category_id' => 4,
                'name' => 'Youvit Gummy Multivitamin',
                'slug' => 'youvit-gummy-multivitamin',
                'description' => 'Jika biasanya vitamin berbentuk tablet atau kapsul, Youvit menyediakan multivitamin yang berbentuk jelly yang bisa dikunyah. Multivitamin ini terdiri dari vitamin A, vitamin B2, B6, B7, B9, B12, vitamin C, vitamin D, vitamin E, selenium dan iodium. Youvit juga aman bagi lambung karena tidak membuat asam lambung naik sehingga penderita maag serta penyakit GERD bisa mengkonsumsinya.',

                'price' => '17500',
                'stock' => 10,
            ],
            [
                'category_id' => 4,
                'name' => 'Redoxon Fortimun',
                'slug' => 'redoxon-fortimun',
                'description' => 'Redoxon Fortimun mengandung vitamin C yang membantu memelihara daya tahan tubuh, serta vitamin A, B kompleks, D, E, dan kombinasi mineral zat besi, tembaga, zinc, selenium yang bersifat antioksidan untuk memelihara kesehatan tubuh. Multivitamin ini berbentuk tablet effervescent yang dapat dilarutkan dalam segelas air. Redoxon Fortimun tidak boleh digunakan pada bayi dibawah 1 tahun, penderita fenilketonuria, dan wanita hamil dengan kadar fenilalanin tinggi.',

                'price' => '47500',
                'stock' => 10,
            ],
            [
                'category_id' => 4,
                'name' => 'Fatigon Multivitamin dan Mineral',
                'slug' => 'fatigon-multivitamin-dan-mineral',
                'description' => 'Fatigon Multivitamin adalah suplemen yang mengandung multivitamin dan mineral yang digunakan untuk memulihkan dan menjaga kesehatan tubuh. Multivitamin ini mengandung kalium-magnesium aspartat yang berfungsi untuk mempercepat penguraian asam laktat penyebab capek dan pegal di otot. Selain itu, Fatigon ini mengandung vitamin neurotropik B1, B6, dan B12 yang berfungsi untuk mengatasi kram atau kesemutan setelah beraktivitas.',

                'price' => '75000',
                'stock' => 10,
            ],
            [
                'category_id' => 4,
                'name' => 'Holisticare Ester C',
                'slug' => 'holisticare-ester-c',
                'description' => 'Holisticare Ester C adalah suplemen yang mengandung Vitamin C dalam bentuk ester sehingga lebih aman di lambung dan lebih cepat terserap di dalam aliran darah. Meski kandungannya tidak sebanyak multivitamin lain, Holisticare Ester C bertahan di dalam tubuh 2 kali lebih lama dibandingkan vitamin C biasa. Kandungan vitamin C ini memiliki peran antioksidan dan berfungsi untuk memelihara daya tahan tubuh.',

                'price' => '70000',
                'stock' => 10,
            ]
        ]);
    }
}
