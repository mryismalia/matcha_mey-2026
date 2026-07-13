<?php

namespace App\Livewire\Pages;

use Illuminate\Support\Collection;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.app')]
#[Title('Katalog Matcha - Matcha Mey')]
class CatalogPage extends Component
{
    public string $selectedCategory = 'Semua';
    public string $sortBy = 'default';

    public function setCategory(string $category): void
    {
        $this->selectedCategory = $category;
    }

    public function getCategoriesProperty(): array
    {
        return ['Semua', 'Drinks', 'Dessert', 'Snacks'];
    }

    public function getFeaturesProperty(): array
    {
        return [
            [
                'icon' => 'leaf',
                'title' => '100% Teh Hijau',
                'subtitle' => 'Alami',
            ],
            [
                'icon' => 'whisk',
                'title' => 'Tradisi Jepang',
                'subtitle' => 'Berkualitas',
            ],
            [
                'icon' => 'cup',
                'title' => 'Aroma Segar',
                'subtitle' => 'Menenangkan',
            ],
            [
                'icon' => 'heart',
                'title' => 'Cocok untuk',
                'subtitle' => 'Minuman & Kuliner',
            ],
        ];
    }

    public function getMenusProperty(): Collection
    {
        return collect([
            [
                'category' => 'Drinks',
                'badge' => 'Ceremonial',
                'origin' => 'Uji, Japan',
                'taste' => 'Smooth, Light, Umami',
                'name' => 'Ceremonial Matcha',
                'description' => 'Matcha kualitas tinggi dengan warna hijau cerah, rasa halus, dan aroma segar. Cocok untuk disajikan sebagai minuman matcha murni.',
                'image' => 'images/matcha/catalog/ceremonial-matcha.png',
                'highlight' => true,
            ],
            [
                'category' => 'Drinks',
                'badge' => 'Premium',
                'origin' => 'Nishio, Japan',
                'taste' => 'Creamy, Sweet, Balanced',
                'name' => 'Premium Latte Matcha',
                'description' => 'Matcha dengan rasa seimbang antara lembut dan kuat, cocok untuk olahan minuman modern seperti latte dan blended drink.',
                'image' => 'images/matcha/catalog/premium-latte-matcha.png',
                'highlight' => false,
            ],
            [
                'category' => 'Snacks',
                'badge' => 'Culinary',
                'origin' => 'Shizuoka, Japan',
                'taste' => 'Strong, Bitter, Earthy',
                'name' => 'Culinary Matcha',
                'description' => 'Matcha dengan karakter rasa lebih kuat dan cocok digunakan sebagai bahan campuran makanan atau minuman.',
                'image' => 'images/matcha/catalog/culinary-matcha.png',
                'highlight' => true,
            ],
            [
                'category' => 'Dessert',
                'badge' => 'Dessert',
                'origin' => 'Kyoto, Japan',
                'taste' => 'Milky, Sweet, Soft',
                'name' => 'Matcha Cheesecake',
                'description' => 'Cheesecake lembut dengan aroma matcha yang manis dan creamy. Cocok sebagai dessert premium untuk pecinta matcha.',
                'image' => 'images/matcha/catalog/matcha-cheesecake.png',
                'highlight' => false,
            ],
            [
                'category' => 'Snacks',
                'badge' => 'Snack',
                'origin' => 'Tokyo, Japan',
                'taste' => 'Crunchy, Sweet, Light',
                'name' => 'Matcha Cookies',
                'description' => 'Cookies renyah dengan sentuhan matcha yang ringan, cocok untuk teman minum teh atau camilan santai.',
                'image' => 'images/matcha/catalog/matcha-cookies.png',
                'highlight' => false,
            ],
            [
                'category' => 'Drinks',
                'badge' => 'Signature',
                'origin' => 'Osaka, Japan',
                'taste' => 'Fresh, Creamy, Smooth',
                'name' => 'Iced Matcha Latte',
                'description' => 'Minuman matcha modern yang creamy dan segar, cocok untuk penikmat matcha dengan karakter ringan dan menyenangkan.',
                'image' => 'images/matcha/catalog/iced-matcha-latte.png',
                'highlight' => false,
            ],
        ]);
    }

    public function getFilteredMenusProperty(): Collection
    {
        $menus = $this->menus;

        if ($this->selectedCategory !== 'Semua') {
            $menus = $menus->where('category', $this->selectedCategory);
        }

        $menus = match ($this->sortBy) {
            'name_asc' => $menus->sortBy('name'),
            'name_desc' => $menus->sortByDesc('name'),
            'category' => $menus->sortBy('category'),
            default => $menus,
        };

        return $menus->values();
    }

    public function render()
    {
        return view('livewire.pages.catalog-page', [
            'categories' => $this->categories,
            'features' => $this->features,
            'menus' => $this->filteredMenus,
        ]);
    }
}
