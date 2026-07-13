<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ArticleSeeder extends Seeder
{
    public function run(): void
    {
        $articles = [
            [
                'title' => 'Mengenal Matcha dan Perbedaannya dengan Green Tea',
                'content' => '
                            <h2>1. Proses Penanaman</h2>
                            <p>Daun untuk matcha biasanya ditanam dengan metode peneduhan sekitar 20–30 hari sebelum dipanen. Proses ini membantu meningkatkan kandungan klorofil dan asam amino sehingga menghasilkan warna hijau yang lebih cerah serta rasa umami yang khas.</p>
                            <p>Sementara itu, daun green tea pada umumnya ditanam tanpa proses peneduhan khusus sehingga menghasilkan karakter rasa yang lebih ringan dan segar.</p>

                            <h3>Metode Peneduhan</h3>
                            <p>Matcha yang ditanam dengan metode peneduhan menghasilkan kandungan L-theanine yang lebih tinggi, memberikan rasa umami yang khas dan tekstur yang lebih creamy dibandingkan green tea biasa.</p>

                            <h2>2. Proses Pengolahan</h2>
                            <p>Setelah dipanen, daun matcha dikukus, dikeringkan, kemudian digiling menggunakan batu penggiling hingga menjadi bubuk yang sangat halus. Bubuk tersebut nantinya dikonsumsi secara keseluruhan.</p>
                            <p>Green tea biasanya dikeringkan dalam bentuk daun. Saat disajikan, daun tersebut hanya diseduh menggunakan air panas, kemudian daun tehnya dipisahkan dari air seduhan.</p>

                            <h2>3. Cara Penyajian</h2>
                            <p>Matcha disajikan dengan melarutkan bubuk matcha ke dalam air panas atau susu, kemudian diaduk menggunakan chasen hingga menghasilkan lapisan busa yang lembut.</p>
                            <p>Berbeda dengan matcha, green tea dibuat dengan menyeduh daun teh kering menggunakan air panas. Hanya air hasil seduhannya yang kemudian diminum.</p>

                            <h2>4. Rasa dan Karakter</h2>
                            <p>Matcha memiliki rasa yang lebih pekat, creamy, sedikit pahit, dan kaya akan rasa umami. Teksturnya juga terasa lebih kental karena bubuk daun teh ikut dikonsumsi.</p>
                            <p>Green tea cenderung memiliki rasa yang lebih ringan, segar, dan terkadang sedikit sepat tergantung suhu serta durasi penyeduhannya.</p>

                            <h2>5. Kandungan Nutrisi</h2>
                            <p>Karena seluruh bubuk daun dikonsumsi, matcha umumnya memiliki kandungan senyawa teh dan kafein yang lebih terkonsentrasi dibandingkan green tea.</p>

                            <h3>Kandungan Kafein</h3>
                            <p>Secangkir matcha mengandung sekitar 70 mg kafein, sedangkan green tea hanya sekitar 25 mg per cangkir. Namun, efek kafein pada matcha terasa lebih stabil karena kandungan L-theanine yang menciptakan efek relaksasi.</p>

                            <div class="article-conclusion">
                                <div class="conclusion-icon">🍃</div>
                                <div>
                                    <h3>Kesimpulan</h3>
                                    <p>Matcha merupakan salah satu jenis green tea, tetapi tidak semua green tea dapat disebut matcha. Perbedaan utamanya terletak pada proses budidaya, pengolahan, cara penyajian, rasa, dan bentuk produk akhirnya.</p>
                                </div>
                            </div>
                            ',
                'thumbnail' => 'articles/matcha-green-tea.png',
                'published_at' => now(),
                'sources' => [
                    ['name' => 'ITO EN — Green Tea vs. Matcha: What Is the Difference?', 'url' => 'https://www.itoen-global.com/enjoymore_tea/curiosity/green-tea-vs-matcha-what-is-the-difference.html'],
                    ['name' => 'Harvard Health Publishing — Matcha: A Look at Possible Health Benefits', 'url' => 'https://www.health.harvard.edu/healthy-aging-and-longevity/matcha-a-look-at-possible-health-benefits'],
                ],
            ],


            [
                'title' => 'Cara Memilih Matcha Berdasarkan Grade',
                'content' => '
                            <h2>1. Ceremonial Grade</h2>
                            <p>Ceremonial grade adalah kualitas tertinggi matcha yang berasal dari daun teh muda pilihan. Matcha ini memiliki warna hijau cerah, tekstur sangat halus, dan rasa yang lembut dengan sentuhan umami alami.</p>
                            <p>Cocok untuk penyajian tradisional Jepang seperti usucha (teh encer) dan koicha (teh kental). Matcha jenis ini tidak disarankan untuk campuran minuman atau makanan karena akan mengurangi kualitas rasanya.</p>

                            <h2>2. Premium Grade</h2>
                            <p>Premium grade merupakan matcha dengan kualitas menengah yang tetap memiliki rasa dan warna yang baik. Matcha ini biasanya diproduksi dari daun teh yang sedikit lebih tua dibanding ceremonial.</p>
                            <p>Sangat cocok untuk minuman modern seperti matcha latte, strawberry matcha, iced matcha, dan berbagai olahan minuman dingin lainnya.</p>

                            <h3>Rekomendasi Penggunaan</h3>
                            <p>Premium grade adalah pilihan paling fleksibel. Anda bisa menggunakannya untuk minuman panas maupun dingin tanpa mengurangi cita rasa secara signifikan.</p>

                            <h2>3. Culinary Grade</h2>
                            <p>Culinary grade adalah matcha yang dirancang khusus untuk bahan campuran makanan dan dessert. Rasanya lebih kuat, sedikit pahit, dan earthy.</p>
                            <p>Cocok digunakan untuk kue, cookies, cheesecake, es krim, puding, dan berbagai olahan makanan lainnya. Karakter rasanya yang kuat tetap terasa meskipun dicampur dengan bahan lain.</p>

                            <h3>Tips Menggunakan Culinary Grade</h3>
                            <p>Karena rasanya lebih pahit, culinary grade matcha sebaiknya dikombinasikan dengan bahan manis seperti gula, susu kental manis, atau white chocolate untuk menyeimbangkan rasa.</p>
                            ',
                'thumbnail' => 'articles/grade-artikel.png',
                'published_at' => now(),
                'sources' => [
                    ['name' => 'Matcha Source — Understanding Matcha Grades', 'url' => 'https://www.matchasource.com/pages/matcha-grades-explained'],
                    ['name' => 'The Spruce Eats — What Is Matcha?', 'url' => 'https://www.thespruceeats.com/what-is-matcha-overview-765291'],
                ],
            ],


            [
                'title' => 'Rekomendasi Olahan Matcha untuk Pemula',
                'content' => '
                            <h2>1. Matcha Latte</h2>
                            <p>Minuman klasik yang paling mudah dibuat sendiri di rumah. Cukup campurkan bubuk matcha dengan sedikit air panas, aduk hingga larut, lalu tambahkan susu hangat atau dingin sesuai selera.</p>
                            <p>Untuk pemula, gunakan premium grade matcha agar rasa tidak terlalu pahit dan teksturnya creamy. Tambahkan madu atau gula jika suka rasa manis.</p>

                            <h3>Variasi Matcha Latte</h3>
                            <p>Setelah menguasai matcha latte dasar, Anda bisa bereksperimen dengan matcha latte oat milk, brown sugar matcha latte, atau iced matcha latte untuk variasi rasa yang berbeda.</p>

                            <h2>2. Matcha Cookies</h2>
                            <p>Camilan yang mudah dibuat dan cocok untuk pemula yang ingin mencoba olahan matcha dalam bentuk makanan padat. Gunakan culinary grade matcha untuk rasa yang lebih terasa.</p>
                            <p>Tambahkan white chocolate chips atau chocochips untuk memberikan rasa manis yang kontras dengan rasa earthy matcha.</p>

                            <h2>3. Matcha Smoothie</h2>
                            <p>Menu sehat yang praktis untuk sarapan atau camilan. Campurkan bubuk matcha dengan pisang, susu almond atau susu biasa, dan sedikit madu. Blender hingga halus dan sajikan dingin.</p>

                            <h3>Tips Tambahan</h3>
                            <p>Mulailah dengan takaran 1 sendok teh matcha per porsi. Sesuaikan jumlahnya sesuai selera jika sudah terbiasa dengan rasa matcha. Simpan bubuk matcha di tempat tertutup rapat dan jauh dari sinar matahari langsung.</p>
                            ',

                'thumbnail' => 'articles/matcha-pemula.png',
                'published_at' => now(),
                'sources' => [
                    ['name' => 'Allrecipes — Easy Matcha Recipes for Beginners', 'url' => 'https://www.allrecipes.com/gallery/easy-matcha-recipes/'],
                    ['name' => 'Japan Centre — How to Use Matcha in Cooking', 'url' => 'https://www.japancentre.com/en/articles/21-how-to-use-matcha-in-cooking'],
                ],
            ],
        ];

        foreach ($articles as $article) {
            Article::FirstOrCreate(
                ['slug' => Str::slug($article['title'])],
                [
                    'title' => $article['title'],
                    'slug' => Str::slug($article['title']),
                    'content' => $article['content'],
                    'thumbnail' => $article['thumbnail'],
                    'published_at' => $article['published_at'],
                    'sources' => $article['sources'],
                ]
            );
        }
    }
}
