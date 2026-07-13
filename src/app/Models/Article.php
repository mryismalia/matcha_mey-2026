<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'content',
        'thumbnail',
        'published_at',
        'sources',
    ];

    protected $casts = [
        'published_at' => 'datetime',
        'sources' => 'array',
    ];

    public function scopePublished(Builder $query): Builder
    {
        return $query->whereNotNull('published_at')
            ->where('published_at', '<=', now());
    }

    public function getThumbnailUrlAttribute(): ?string
    {
        return $this->thumbnail
            ? Storage::url($this->thumbnail)
            : null;
    }

    public function getImageAttribute(): ?string
    {
        return $this->thumbnail;
    }

    public function getExcerptAttribute(): ?string
    {
        return Str::limit(strip_tags($this->content ?? ''), 200);
    }
}
