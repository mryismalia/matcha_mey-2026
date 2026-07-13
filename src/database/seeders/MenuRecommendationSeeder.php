<?php

namespace Database\Seeders;

use App\Models\MenuRecommendation;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class MenuRecommendationSeeder extends Seeder
{
    public function run(): void
    {

    $menus = [
    ['Sweet', 'Low', 'Drink', 'Matcha Latte Honey', 'Matcha latte ringan dengan sentuhan madu asli yang lembut. Cocok untuk kamu yang ingin rasa manis natural tanpa terasa terlalu berat.', 'matcha-latte-honey.jpg'],
    ['Sweet', 'Medium', 'Drink', 'Classic Matcha Latte', 'Perpaduan matcha, susu, dan gula dengan rasa yang seimbang. Pilihan aman untuk pecinta matcha yang suka rasa creamy dan familiar.', 'classic-matcha-latte.jpg'],
    ['Sweet', 'High', 'Drink', 'Brown Sugar Matcha', 'Matcha creamy dengan gula merah yang legit dan aromatik. Cocok untuk kamu yang suka minuman manis dengan rasa yang kaya.', 'brown-sugar-matcha.jpg'],

    // DRINK - CREAMY
    ['Creamy', 'Low', 'Drink', 'Matcha Latte Oat', 'Matcha latte dengan oat milk yang smooth, ringan, dan tidak terlalu manis. Cocok untuk pilihan yang lebih clean dan lembut.', 'matcha-latte-oat.jpg'],
    ['Creamy', 'Medium', 'Drink', 'Matcha Latte Susu', 'Matcha latte klasik dengan susu sapi yang creamy dan rasa matcha yang tetap terasa. Pas untuk dinikmati kapan saja.', 'matcha-latte-susu.jpg'],
    ['Creamy', 'High', 'Drink', 'Matcha Latte Condensed', 'Matcha latte dengan susu kental manis yang membuat rasanya lebih creamy, manis, dan indulgent.', 'matcha-latte-condensed.jpg'],

    // DRINK - BITTER
    ['Bitter', 'Low', 'Drink', 'Pure Matcha', 'Matcha murni tanpa pemanis dengan rasa earthy yang autentik. Cocok untuk kamu yang ingin menikmati karakter asli matcha.', 'pure-matcha.jpg'],
    ['Bitter', 'Medium', 'Drink', 'Matcha Shots', 'Matcha pekat dalam ukuran kecil dengan rasa yang intens. Pilihan tepat untuk pecinta matcha yang suka rasa kuat dan tegas.', 'matcha-shots.jpg'],
    ['Bitter', 'High', 'Drink', 'Matcha Americano', 'Matcha dengan tambahan air panas yang menghasilkan rasa lebih bold, clean, dan pahit elegan.', 'matcha-americano.jpg'],

    // DRINK - STRONG
    ['Strong', 'Low', 'Drink', 'Double Matcha', 'Minuman dengan takaran matcha dobel untuk rasa yang lebih kuat, namun tetap ringan karena minim pemanis.', 'double-matcha.jpg'],
    ['Strong', 'Medium', 'Drink', 'Matcha Latte Strong', 'Matcha latte dengan porsi matcha lebih banyak, menghasilkan rasa yang bold namun tetap creamy.', 'matcha-latte-strong.jpg'],
    ['Strong', 'High', 'Drink', 'Strong Brown Sugar Matcha', 'Perpaduan double matcha dan brown sugar yang menghasilkan rasa kuat, manis, dan creamy dalam satu gelas.', 'strong-brown-sugar-matcha.jpg'],

    // DRINK - LIGHT
    ['Light', 'Low', 'Drink', 'Iced Matcha Light', 'Matcha dingin yang ringan dan menyegarkan dengan rasa yang tidak terlalu pekat. Cocok untuk diminum saat cuaca panas.', 'iced-matcha-light.jpg'],
    ['Light', 'Medium', 'Drink', 'Matcha Latte Ice', 'Matcha latte versi dingin dengan rasa manis sedang dan tekstur creamy yang tetap menyegarkan.', 'matcha-latte-ice.jpg'],
    ['Light', 'High', 'Drink', 'Iced Matcha Sweetened', 'Matcha dingin dengan tambahan sirup manis yang segar dan mudah dinikmati oleh semua kalangan.', 'iced-matcha-sweetened.jpg'],
    ['Light', 'Medium', 'Drink', 'Matcha Smoothie', 'Smoothie matcha dengan sentuhan rasa buah yang ringan, creamy, dan menyegarkan.', 'matcha-smoothie.jpg'],
    ['Light', 'High', 'Drink', 'Matcha Frappuccino', 'Minuman frozen matcha yang manis, creamy, dan dingin. Cocok untuk kamu yang suka minuman dessert dalam bentuk frappe.', 'matcha-frappucino.jpg'],
    ['Light', 'Low', 'Drink', 'Iced Matcha Latte', 'Iced matcha latte simpel dengan rasa ringan, fresh, dan tidak terlalu manis.', 'iced-matcha-latte.jpg'],
    ['Sweet', 'Medium', 'Drink', 'Matcha Affogato', 'Matcha hangat yang dituangkan di atas es krim, menghasilkan perpaduan manis, creamy, dan sedikit pahit yang elegan.', 'matcha-affogato.jpg'],

    // DESSERT - SWEET
    ['Sweet', 'Low', 'Dessert', 'Matcha Pudding', 'Pudding matcha lembut dengan rasa manis ringan dan tekstur halus yang nyaman di mulut.', 'matcha-pudding.jpg'],
    ['Sweet', 'Medium', 'Dessert', 'Matcha Panna Cotta', 'Panna cotta matcha dengan tekstur silky dan rasa manis seimbang. Cocok untuk dessert yang terasa premium.', 'matcha-panna-cotta.jpg'],
    ['Sweet', 'High', 'Dessert', 'Matcha Parfait', 'Parfait matcha berlapis krim, granola, dan topping manis yang ramai rasa serta menarik secara tampilan.', 'matcha-parfait.jpg'],

    // DESSERT - CREAMY
    ['Creamy', 'Low', 'Dessert', 'Matcha Mousse', 'Mousse matcha yang ringan, lembut, dan creamy dengan rasa matcha yang halus.', 'matcha-mousse.jpg'],
    ['Creamy', 'Medium', 'Dessert', 'Matcha Cheesecake', 'Cheesecake matcha dengan rasa creamy, sedikit earthy, dan manis yang seimbang.', 'matcha-cheesecake.jpg'],
    ['Creamy', 'High', 'Dessert', 'Matcha Tiramisu', 'Tiramisu matcha fusion dengan lapisan krim yang tebal, lembut, dan rasa manis yang dominan.', 'matcha-tiramisu.jpg'],

    // DESSERT - BITTER
    ['Bitter', 'Low', 'Dessert', 'Matcha Jelly', 'Jelly matcha yang ringan, segar, dan memiliki sentuhan pahit lembut khas matcha.', 'matcha-jelly.jpg'],
    ['Bitter', 'Medium', 'Dessert', 'Dark Matcha Brownie', 'Brownie matcha dengan rasa earthy dan tekstur fudgy yang cocok untuk pecinta dessert tidak terlalu manis.', 'dark-matcha-brownie.jpg'],
    ['Bitter', 'High', 'Dessert', 'Matcha Choco Tart', 'Tart matcha dengan cokelat gelap yang memberikan perpaduan rasa pahit, manis, dan rich.', 'matcha-choco-tart.jpg'],

    // DESSERT - STRONG
    ['Strong', 'Low', 'Dessert', 'Matcha Agar', 'Agar matcha dengan rasa yang tegas namun tetap ringan. Cocok untuk dessert sederhana yang menyegarkan.', 'matcha-agar.jpg'],
    ['Strong', 'Medium', 'Dessert', 'Matcha Brownies', 'Brownies matcha dengan rasa intens, tekstur padat, dan aroma matcha yang terasa jelas.', 'matcha-brownies.jpg'],
    ['Strong', 'High', 'Dessert', 'Matcha Lava Cake', 'Lava cake matcha dengan isian molten yang creamy, manis, dan terasa premium.', 'matcha-lava-cake.jpg'],
    ['Sweet', 'High', 'Dessert', 'Matcha Flan', 'Flan matcha dengan tekstur custard yang lembut, creamy, dan manis smooth.', 'matcha-flan.jpg'],

    // SNACK - SWEET
    ['Sweet', 'Low', 'Snack', 'Matcha Cookies', 'Cookies matcha ringan dengan rasa manis rendah dan aroma matcha yang lembut.', 'matcha-cookies.jpg'],
    ['Sweet', 'Medium', 'Snack', 'White Choco Matcha', 'Cookies matcha dengan tambahan white chocolate yang manis, creamy, dan seimbang.', 'white-choco-matcha.jpg'],
    ['Sweet', 'High', 'Snack', 'Matcha Donut', 'Donut lembut dengan glaze matcha manis yang cocok untuk camilan mengenyangkan.', 'matcha-donut.jpg'],

    // SNACK - CREAMY
    ['Creamy', 'Low', 'Snack', 'Matcha Cream Biscuit', 'Biskuit renyah dengan krim matcha tipis yang ringan dan tidak terlalu manis.', 'matcha-cream-biscuit.jpg'],
    ['Creamy', 'Medium', 'Snack', 'Matcha Cream Puff', 'Cream puff lembut dengan isian krim matcha yang creamy, ringan, dan wangi.', 'matcha-cream-puff.jpg'],
    ['Creamy', 'High', 'Snack', 'Matcha Swiss Roll', 'Swiss roll matcha dengan lapisan krim tebal yang lembut, creamy, dan manis.', 'matcha-swiss-roll.jpg'],

    // SNACK - BITTER
    ['Bitter', 'Low', 'Snack', 'Roasted Matcha Biscuit', 'Biskuit matcha roasted dengan rasa earthy, renyah, dan manis yang tipis.', 'roasted-matcha-biscuit.jpg'],
    ['Bitter', 'Medium', 'Snack', 'Matcha Granola', 'Granola matcha renyah dengan rasa bitter medium yang cocok untuk camilan ringan atau topping dessert.', 'matcha-granola.jpg'],
    ['Bitter', 'High', 'Snack', 'Dark Matcha Bar', 'Energy bar matcha dengan dark chocolate yang intens, padat, dan tidak terlalu manis.', 'dark-matcha-bar.jpg'],

    // SNACK - SWEET ADDITIONS
    ['Sweet', 'Medium', 'Snack', 'Matcha Macarons', 'Macaron matcha dengan tekstur ringan, renyah di luar, lembut di dalam, dan rasa manis elegan.', 'matcha-macarons.jpg'],
    ['Sweet', 'High', 'Snack', 'Matcha Cheesecake Bars', 'Cheesecake bar matcha yang creamy, manis, dan praktis untuk dinikmati sebagai camilan premium.', 'matcha-cheesecake-bar.jpg'],
    ['Sweet', 'Medium', 'Snack', 'Matcha Tart', 'Tart matcha dengan krim lembut dan rasa manis seimbang yang cocok untuk dessert kecil premium.', 'matcha-tart.jpg'],
    ['Light', 'High', 'Snack', 'Matcha Waffle', 'Waffle matcha fluffy dengan topping manis yang ringan, harum, dan cocok untuk menu snack favorit.', 'matcha-waffle.jpg'],
];

        foreach ($menus as $menu) {
            [$tasteProfile, $sweetnessLevel, $menuType, $name, $description, $image] = $menu;

            $slug = Str::slug($name);

            MenuRecommendation::updateOrCreate(
                ['slug' => $slug],
                [
                    'name' => $name,
                    'slug' => $slug,
                    'image' => 'menu-recommendations/' . $image,
                    'description' => $description,
                    'taste_profile' => $tasteProfile,
                    'sweetness_level' => $sweetnessLevel,
                    'menu_type' => $menuType,
                ]
            );
        }
    }
}
