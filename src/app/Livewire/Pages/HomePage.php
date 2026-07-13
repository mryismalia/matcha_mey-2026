<?php

namespace App\Livewire\Pages;

use App\Models\Matcha;
use App\Models\SiteContent;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.app')]
#[Title('Matcha Mey - Edukasi & Rekomendasi Matcha')]
class HomePage extends Component
{
    public function render()
    {
        return view('livewire.pages.home-page', [
            'hero' => SiteContent::section('home', 'hero'),
            'customSections' => SiteContent::where('section', 'LIKE', 'home_%')->get(),
            'matchaSection' => SiteContent::section('home', 'matcha'),
            'matchas' => Matcha::latest()->paginate(3),
        ]);
    }
}
