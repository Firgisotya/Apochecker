<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news')->insert([
            [
                'user_id' => 1,
                'photo' => 'img/latest-news/news-bg-1.jpg',
                'title' => 'Buah-buahan yang bisa dibeli dengan mudah',
                'content' => '<p>Buah-buahan yang bisa dibeli dengan mudah antara lain pisang, pepaya, nanas, melon, dan semua buah-buahan lainnya. Selain itu, juga bisa membeli buah-buahan dengan harga murah.</p>',
                'excerpt' => 'Buah-buahan yang bisa dibeli dengan mudah...',
                'slug' => 'buah-buahan-yang-bisa-dibeli-dengan-mudah',
                'date' => '2022-03-25',
            ],
            [
                'user_id' => 2,
                'photo' => 'img/latest-news/news-bg-2.jpg',
                'title' => 'Obat-obatan yang bisa dibeli dengan mudah',
                'content' => '<p>Obat-obatan yang bisa dibeli dengan mudah antara lain vitamin, minyak, dan semua obat-obatan lainnya. Selain itu, juga bisa membeli obat-obatan dengan harga murah.</p>',
                'excerpt' => 'Obat-obatan yang bisa dibeli dengan mudah...',
                'slug' => 'obat-obatan-yang-bisa-dibeli-dengan-mudah',
                'date' => '2022-03-25',
            ],
            [
                'user_id' => 3,
                'photo' => 'img/latest-news/news-bg-3.jpg',
                'title' => 'Manfaat obat-obatan',
                'content' => '<p>Beberapa manfaat yang bisa kita dapatkan dari obat-obatan yang kita beli. Antara lain, obat-obatan yang bisa meningkatkan kesehatan, obat-obatan yang bisa mengurangi penyakit, obat-obatan yang bisa menghentikan penyakit, dan obat-obatan yang bisa menghentikan penyakit.</p>',
                'excerpt' => 'Manfaat obat-obatan...',
                'slug' => 'manfaat-obat-obatan',
                'date' => '2022-03-25',
            ],
            [
                'user_id' => 4,
                'photo' => 'img/latest-news/news-bg-4.jpg',
                'title' => 'Cara menjaga imunitas',
                'content' => '<p>Cara yang dapat dilakukan untuk menjaga imunitas adalah dengan mengonsumsi obat-obatan yang bisa menghentikan penyakit. Selain itu, juga bisa membeli obat-obatan dengan harga murah.</p>',
                'excerpt' => 'Cara menjaga imunitas...',
                'slug' => 'cara-menjaga-imunitas',
                'date' => '2022-03-25',
            ],
            [
                'user_id' => 1,
                'photo' => 'img/latest-news/news-bg-5.jpg',
                'title' => 'Manfaat dari berolahraga',
                'content' => '<p>Manfaat dari berolahraga antara lain, bisa menghindarkan dari penyakit dan juga menambah imunitas tubuh sehingga kita dapat beraktifitas dengan baik.</p>',
                'excerpt' => 'Manfaat dari berolahraga...',
                'slug' => 'manfaat-dari-berolahraga',
                'date' => '2022-03-25',
            ],
            [
                'user_id' => 2,
                'photo' => 'img/latest-news/news-bg-6.jpg',
                'title' => 'Cara menjaga kesehatan',
                'content' => '<p>Cara yang dapat dilakukan untuk menjaga kesehatan adalah dengan mengonsumsi obat-obatan yang bisa menghentikan penyakit. Selain itu, juga bisa membeli obat-obatan dengan harga murah.</p>',
                'excerpt' => 'Cara menjaga kesehatan...',
                'slug' => 'cara-menjaga-kesehatan',
                'date' => '2022-03-25',
            ],
            [
                'user_id' => 1,
                'photo' => 'img/latest-news/news-bg-1.jpg',
                'title' => 'Buah-buahan yang bisa dibeli dengan mudah',
                'content' => '<p>Buah-buahan yang bisa dibeli dengan mudah antara lain pisang, pepaya, nanas, melon, dan semua buah-buahan lainnya. Selain itu, juga bisa membeli buah-buahan dengan harga murah.</p>',
                'excerpt' => 'Buah-buahan yang bisa dibeli dengan mudah...',
                'slug' => 'buah-buahan-yang-bisa-dibeli-dengan-mudah',
                'date' => '2022-03-25',
            ],
            [
                'user_id' => 2,
                'photo' => 'img/latest-news/news-bg-2.jpg',
                'title' => 'Obat-obatan yang bisa dibeli dengan mudah',
                'content' => '<p>Obat-obatan yang bisa dibeli dengan mudah antara lain vitamin, minyak, dan semua obat-obatan lainnya. Selain itu, juga bisa membeli obat-obatan dengan harga murah.</p>',
                'excerpt' => 'Obat-obatan yang bisa dibeli dengan mudah...',
                'slug' => 'obat-obatan-yang-bisa-dibeli-dengan-mudah',
                'date' => '2022-03-25',
            ],
            [
                'user_id' => 3,
                'photo' => 'img/latest-news/news-bg-3.jpg',
                'title' => 'Manfaat obat-obatan',
                'content' => '<p>Beberapa manfaat yang bisa kita dapatkan dari obat-obatan yang kita beli. Antara lain, obat-obatan yang bisa meningkatkan kesehatan, obat-obatan yang bisa mengurangi penyakit, obat-obatan yang bisa menghentikan penyakit, dan obat-obatan yang bisa menghentikan penyakit.</p>',
                'excerpt' => 'Manfaat obat-obatan...',
                'slug' => 'manfaat-obat-obatan',
                'date' => '2022-03-25',
            ],
            [
                'user_id' => 4,
                'photo' => 'img/latest-news/news-bg-4.jpg',
                'title' => 'Cara menjaga imunitas',
                'content' => '<p>Cara yang dapat dilakukan untuk menjaga imunitas adalah dengan mengonsumsi obat-obatan yang bisa menghentikan penyakit. Selain itu, juga bisa membeli obat-obatan dengan harga murah.</p>',
                'excerpt' => 'Cara menjaga imunitas...',
                'slug' => 'cara-menjaga-imunitas',
                'date' => '2022-03-25',
            ],
            [
                'user_id' => 1,
                'photo' => 'img/latest-news/news-bg-5.jpg',
                'title' => 'Manfaat dari berolahraga',
                'content' => '<p>Manfaat dari berolahraga antara lain, bisa menghindarkan dari penyakit dan juga menambah imunitas tubuh sehingga kita dapat beraktifitas dengan baik.</p>',
                'excerpt' => 'Manfaat dari berolahraga...',
                'slug' => 'manfaat-dari-berolahraga',
                'date' => '2022-03-25',
            ],
            [
                'user_id' => 2,
                'photo' => 'img/latest-news/news-bg-6.jpg',
                'title' => 'Cara menjaga kesehatan',
                'content' => '<p>Cara yang dapat dilakukan untuk menjaga kesehatan adalah dengan mengonsumsi obat-obatan yang bisa menghentikan penyakit. Selain itu, juga bisa membeli obat-obatan dengan harga murah.</p>',
                'excerpt' => 'Cara menjaga kesehatan...',
                'slug' => 'cara-menjaga-kesehatan',
                'date' => '2022-03-25',
            ],
            [
                'user_id' => 1,
                'photo' => 'img/latest-news/news-bg-1.jpg',
                'title' => 'Buah-buahan yang bisa dibeli dengan mudah',
                'content' => '<p>Buah-buahan yang bisa dibeli dengan mudah antara lain pisang, pepaya, nanas, melon, dan semua buah-buahan lainnya. Selain itu, juga bisa membeli buah-buahan dengan harga murah.</p>',
                'excerpt' => 'Buah-buahan yang bisa dibeli dengan mudah...',
                'slug' => 'buah-buahan-yang-bisa-dibeli-dengan-mudah',
                'date' => '2022-03-25',
            ],
            [
                'user_id' => 2,
                'photo' => 'img/latest-news/news-bg-2.jpg',
                'title' => 'Obat-obatan yang bisa dibeli dengan mudah',
                'content' => '<p>Obat-obatan yang bisa dibeli dengan mudah antara lain vitamin, minyak, dan semua obat-obatan lainnya. Selain itu, juga bisa membeli obat-obatan dengan harga murah.</p>',
                'excerpt' => 'Obat-obatan yang bisa dibeli dengan mudah...',
                'slug' => 'obat-obatan-yang-bisa-dibeli-dengan-mudah',
                'date' => '2022-03-25',
            ],
            [
                'user_id' => 3,
                'photo' => 'img/latest-news/news-bg-3.jpg',
                'title' => 'Manfaat obat-obatan',
                'content' => '<p>Beberapa manfaat yang bisa kita dapatkan dari obat-obatan yang kita beli. Antara lain, obat-obatan yang bisa meningkatkan kesehatan, obat-obatan yang bisa mengurangi penyakit, obat-obatan yang bisa menghentikan penyakit, dan obat-obatan yang bisa menghentikan penyakit.</p>',
                'excerpt' => 'Manfaat obat-obatan...',
                'slug' => 'manfaat-obat-obatan',
                'date' => '2022-03-25',
            ],
            [
                'user_id' => 4,
                'photo' => 'img/latest-news/news-bg-4.jpg',
                'title' => 'Cara menjaga imunitas',
                'content' => '<p>Cara yang dapat dilakukan untuk menjaga imunitas adalah dengan mengonsumsi obat-obatan yang bisa menghentikan penyakit. Selain itu, juga bisa membeli obat-obatan dengan harga murah.</p>',
                'excerpt' => 'Cara menjaga imunitas...',
                'slug' => 'cara-menjaga-imunitas',
                'date' => '2022-03-25',
            ],
            [
                'user_id' => 1,
                'photo' => 'img/latest-news/news-bg-5.jpg',
                'title' => 'Manfaat dari berolahraga',
                'content' => '<p>Manfaat dari berolahraga antara lain, bisa menghindarkan dari penyakit dan juga menambah imunitas tubuh sehingga kita dapat beraktifitas dengan baik.</p>',
                'excerpt' => 'Manfaat dari berolahraga...',
                'slug' => 'manfaat-dari-berolahraga',
                'date' => '2022-03-25',
            ],
            [
                'user_id' => 2,
                'photo' => 'img/latest-news/news-bg-6.jpg',
                'title' => 'Cara menjaga kesehatan',
                'content' => '<p>Cara yang dapat dilakukan untuk menjaga kesehatan adalah dengan mengonsumsi obat-obatan yang bisa menghentikan penyakit. Selain itu, juga bisa membeli obat-obatan dengan harga murah.</p>',
                'excerpt' => 'Cara menjaga kesehatan...',
                'slug' => 'cara-menjaga-kesehatan',
                'date' => '2022-03-25',
            ],
        ]);
    }
}
