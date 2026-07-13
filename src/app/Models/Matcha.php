<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Matcha extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'grade',
        'origin',
        'description',
        'taste_profile',
        'usage_recommendation',
        'image',
    ];

    public function getImageUrlAttribute(): ?string
    {
        return $this->image
            ? Storage::url($this->image)
            : null;
    }
}
