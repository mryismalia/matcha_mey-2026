<?php

namespace App\Livewire\Pages;

use App\Models\ContactMessage;
use App\Models\SiteContent;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.app')]
#[Title('Kontak - Matcha Mey')]
class ContactPage extends Component
{
    public string $name = '';

    public string $email = '';

    public string $subject = '';

    public string $message = '';

    public bool $success = false;

    protected $rules = [
        'name' => 'required|min:3|max:255',
        'email' => 'required|email|max:255',
        'subject' => 'required|min:3|max:255',
        'message' => 'required|min:10',
    ];

    public function submit()
    {
        $this->validate();

        ContactMessage::create([
            'name' => $this->name,
            'email' => $this->email,
            'subject' => $this->subject,
            'message' => $this->message,
        ]);

        $this->reset(['name', 'email', 'subject', 'message']);
        $this->success = true;
    }

    public function render()
    {
        return view('livewire.pages.contact-page', [
            'hero' => SiteContent::section('contact', 'hero'),
            'info' => SiteContent::section('contact', 'info'),
            'contactDetail' => SiteContent::section('contact', 'contact_detail'),
            'form' => SiteContent::section('contact', 'form'),
            'success' => SiteContent::section('contact', 'success'),
            'note' => SiteContent::section('contact', 'note'),
        ]);
    }
}
