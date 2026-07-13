<?php

namespace App\Livewire\Pages;

use App\Models\SiteContent;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.app')]
#[Title('Tentang Matcha - Matcha Mey')]
class AboutPage extends Component
{
    public function render()
    {
        return view('livewire.pages.about-page', [
            'about' => [
                'hero' => SiteContent::section('about', 'hero'),

                'matcha' => [
                    'title' => 'Apa itu Matcha?',
                    'description' => SiteContent::section(
                        'about',
                        'what_is_matcha'
                    ),
                ],

                'grade' => [
                    'title' => 'Grade Matcha',
                    'description' => SiteContent::section(
                        'about',
                        'grade'
                    ),
                ],

                'taste' => [
                    'title' => 'Karakter Rasa',
                    'description' => SiteContent::section(
                        'about',
                        'taste'
                    ),
                ],
            ],
        ]);
    }
}
