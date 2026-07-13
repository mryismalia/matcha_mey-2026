<?php

namespace Database\Seeders;

use App\Models\SiteContent;
use Illuminate\Database\Seeder;

class SiteContentSeeder extends Seeder
{
    public function run(): void
    {
        $contents = [
            [
                'page' => 'global',
                'section' => 'brand',
                'title' => 'Matcha Mey',
                'subtitle' => 'Edukasi dan rekomendasi menu matcha berbasis web.',
            ],
            [
                'page' => 'global',
                'section' => 'footer',
                'title' => 'Matcha Mey',
                'content' => 'Website edukasi dan rekomendasi menu matcha yang membantu pengunjung memahami jenis matcha, artikel edukasi, dan menu sesuai preferensi.',
            ],
            [
                'page' => 'home',
                'section' => 'hero',
                'title' => 'Temukan dunia matcha yang lebih lembut, segar, dan penuh rasa.',
                'subtitle' => 'Matcha Mey membantu kamu mengenal jenis matcha, membaca artikel edukasi, dan menemukan rekomendasi menu berdasarkan karakter rasa.',
                'button_label' => 'Lihat Katalog',
                'button_url' => '/katalog-matcha',
            ],
            [
                'page' => 'home',
                'section' => 'matcha',
                'title' => 'Katalog Jenis Matcha',
                'subtitle' => 'Kenali karakter, grade, origin, dan penggunaan dari berbagai jenis matcha.',
                'content' => 'Katalog ini berisi berbagai jenis matcha yang dikelompokkan berdasarkan grade, origin, karakter rasa, dan rekomendasi penggunaannya. Setiap jenis matcha memiliki keunikan tersendiri yang cocok untuk kebutuhan yang berbeda, mulai dari penyajian tradisional hingga olahan modern.',
            ],
            [
                'page' => 'home',
                'section' => 'article_section',
                'title' => 'Artikel Edukasi',
                'subtitle' => 'Baca informasi singkat dan mudah dipahami seputar matcha.',
            ],
            [
                'page' => 'home',
                'section' => 'menu_section',
                'title' => 'Rekomendasi Menu',
                'subtitle' => 'Pilih menu matcha sesuai karakter rasa dan tingkat kemanisan favoritmu.',
            ],
            [
                'page' => 'about',
                'section' => 'hero',
                'title' => 'Mengenal matcha lebih dekat',
                'subtitle' => 'Matcha adalah bubuk teh hijau halus yang dikenal dengan warna hijau khas, aroma segar, dan karakter rasa yang unik.',
            ],
            [
                'page' => 'about',
                'section' => 'what_is_matcha',
                'title' => 'Apa itu Matcha?',
                'content' => 'Matcha berasal dari daun teh hijau yang diproses menjadi bubuk halus. Berbeda dari teh hijau biasa yang diseduh lalu daunnya dibuang, matcha dikonsumsi dalam bentuk bubuk sehingga karakter rasa dan warnanya terasa lebih kuat.',
                'image' => 'site-contents/apa-itu-matcha.jpg',
            ],
            [
                'page' => 'about',
                'section' => 'grade',
                'title' => 'Grade Matcha',
                'content' => 'Matcha biasanya dibedakan menjadi beberapa grade, seperti ceremonial, premium, dan culinary. Ceremonial cocok untuk penyajian tradisional, premium cocok untuk minuman modern, sedangkan culinary sering digunakan untuk makanan dan dessert.',
                'image' => 'site-contents/grade-matcha.jpg',
            ],
            [
                'page' => 'about',
                'section' => 'taste',
                'title' => 'Karakter Rasa',
                'content' => 'Rasa matcha dapat berbeda tergantung kualitas, asal daerah, dan cara pengolahannya. Beberapa karakter umum yang sering ditemukan adalah creamy, sweet, bitter, strong, light, dan umami.',
                'image' => 'site-contents/karakter-rasa.jpg',
            ],
            [
                'page' => 'matchas',
                'section' => 'hero',
                'title' => 'Katalog Jenis Matcha',
                'subtitle' => 'Lihat daftar jenis matcha lengkap dengan grade, origin, karakter rasa, dan rekomendasi penggunaan.',
            ],
            [
                'page' => 'articles',
                'section' => 'hero',
                'title' => 'Artikel Edukasi',
                'subtitle' => 'Baca informasi ringan untuk memahami matcha, grade, rasa, dan penggunaannya.',
                'image' => 'site-contents/artikel-matcha.png',
            ],
            [
                'page' => 'menus',
                'section' => 'hero',
                'title' => 'Rekomendasi Menu Matcha',
                'subtitle' => 'Gunakan filter sederhana berdasarkan karakter rasa, tingkat kemanisan, dan jenis menu.',
            ],
            [
                'page' => 'search',
                'section' => 'hero',
                'title' => 'Hasil Pencarian',
                'subtitle' => 'Cari data matcha, artikel edukasi, atau rekomendasi menu.',
            ],
            [
                'page' => 'contact',
                'section' => 'hero',
                'title' => 'Hubungi Matcha Mey',
                'subtitle' => 'Halaman ini berisi informasi kontak dan media sosial pendukung website.',
            ],
            [
                'page' => 'contact',
                'section' => 'info',
                'title' => 'Informasi Website',
                'content' => 'Matcha Mey adalah website edukasi dan rekomendasi menu matcha. Website ini dibuat untuk membantu pengunjung memahami matcha dan menemukan menu yang sesuai dengan preferensi mereka.',
            ],
            [
                'page' => 'contact',
                'section' => 'contact_detail',
                'title' => 'Kontak',
                'content' => '<p>Email: matchamey@gmail.com</p><p>Instagram: @matchamey</p>',
            ],
            [
                'page' => 'contact',
                'section' => 'note',
                'title' => 'Catatan',
                'content' => 'Matcha Mey tidak menyediakan fitur chat langsung, pemesanan menu, maupun pembayaran online. Website ini berfokus pada informasi edukasi dan rekomendasi menu.',
            ],
        ];

        foreach ($contents as $content) {
            SiteContent::updateOrCreate(
                [
                    'page' => $content['page'],
                    'section' => $content['section'],
                ],
                $content
            );
        }
    }
}
