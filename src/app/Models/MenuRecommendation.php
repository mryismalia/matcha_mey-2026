<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class MenuRecommendation extends Model
{
    use HasFactory;

    public const TASTE_PROFILES = [
        'Sweet' => 'Sweet',
        'Creamy' => 'Creamy',
        'Bitter' => 'Bitter',
        'Strong' => 'Strong',
        'Light' => 'Light',
    ];

    public const SWEETNESS_LEVELS = [
        'Low' => 'Low',
        'Medium' => 'Medium',
        'High' => 'High',
    ];

    public const MENU_TYPES = [
        'Drink' => 'Drink',
        'Dessert' => 'Dessert',
        'Snack' => 'Snack',
    ];

    protected $fillable = [
        'name',
        'slug',
        'image',
        'description',
        'taste_profile',
        'sweetness_level',
        'menu_type',
    ];

    public function scopeFilter(Builder $query, array $filters): Builder
    {
        return $query
            ->when($filters['taste_profile'] ?? null, function (Builder $query, string $tasteProfile) {
                $query->where('taste_profile', $tasteProfile);
            })
            ->when($filters['sweetness_level'] ?? null, function (Builder $query, string $sweetnessLevel) {
                $query->where('sweetness_level', $sweetnessLevel);
            })
            ->when($filters['menu_type'] ?? null, function (Builder $query, string $menuType) {
                $query->where('menu_type', $menuType);
            });
    }

    public function getImageUrlAttribute(): ?string
    {
        return $this->image
            ? Storage::url($this->image)
            : null;
    }
}
