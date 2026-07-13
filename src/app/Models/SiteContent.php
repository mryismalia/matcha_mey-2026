<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class SiteContent extends Model
{
    protected $fillable = [
        'page',
        'section',
        'title',
        'subtitle',
        'content',
        'image',
        'button_label',
        'button_url',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public static function section(string $page, string $section): ?self
    {
        return self::query()
            ->where('page', $page)
            ->where('section', $section)
            ->where('is_active', true)
            ->first();
    }

    public function getImageUrlAttribute(): ?string
    {
        return $this->image ? Storage::url($this->image) : null;
    }
}
