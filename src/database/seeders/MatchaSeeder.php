<?php

namespace Database\Seeders;

use App\Models\Matcha;
use Illuminate\Database\Seeder;

class MatchaSeeder extends Seeder
{
    public function run(): void
    {
        $matchas = [
            [
                'name' => 'Ceremonial Matcha',
                'grade' => 'Ceremonial',
                'origin' => 'Uji, Japan',
                'description' => 'Matcha kualitas tinggi dengan warna hijau cerah, rasa halus, dan aroma segar. Cocok untuk disajikan sebagai minuman matcha murni.',
                'taste_profile' => 'Smooth, Light, Umami',
                'usage_recommendation' => 'Disarankan untuk usucha, koicha, atau matcha latte premium.',
                'image' => 'catalog/ceremonial-matcha.png',
            ],
            [
                'name' => 'Culinary Matcha',
                'grade' => 'Culinary',
                'origin' => 'Shizuoka, Japan',
                'description' => 'Matcha dengan karakter rasa lebih kuat dan cocok digunakan sebagai bahan campuran makanan atau minuman.',
                'taste_profile' => 'Strong, Bitter, Earthy',
                'usage_recommendation' => 'Cocok untuk kue, cookies, cheesecake, es krim, dan latte.',
                'image' => 'catalog/culinary-matcha.png',
            ],
            [
                'name' => 'Premium Latte Matcha',
                'grade' => 'Premium',
                'origin' => 'Nishio, Japan',
                'description' => 'Matcha dengan rasa seimbang antara lembut dan kuat, cocok untuk olahan minuman modern.',
                'taste_profile' => 'Creamy, Sweet, Balanced',
                'usage_recommendation' => 'Cocok untuk matcha latte, strawberry matcha, dan minuman dingin.',
                'image' => 'catalog/premium-latte-matcha.png',
            ],
        ];

        foreach ($matchas as $matcha) {
            
            Matcha::updateOrCreate(
                ['name' => $matcha['name']],
                $matcha
            );
        }
    }
}
