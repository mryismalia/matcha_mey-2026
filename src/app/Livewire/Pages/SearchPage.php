<?php

namespace App\Livewire\Pages;

use App\Models\Article;
use App\Models\Matcha;
use App\Models\MenuRecommendation;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Schema;
use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class SearchPage extends Component
{
    public string $q = '';

    public function mount(): void
    {
        $this->q = trim((string) request()->query('q', ''));
    }

    public function render(): View
    {
        return view('livewire.pages.search-page', [
            'results' => $this->q === ''
                ? collect()
                : $this->getSearchResults(),
        ]);
    }

    private function getSearchResults(): Collection
    {
        return collect()
            ->concat($this->searchMenuRecommendations())
            ->concat($this->searchMatchas())
            ->concat($this->searchArticles())
            ->unique(function (array $item): string {
                return strtolower(
                    ($item['type'] ?? '') . '-' . ($item['title'] ?? '')
                );
            })
            ->values();
    }

    private function searchMenuRecommendations(): Collection
    {
        $model = new MenuRecommendation();
        $table = $model->getTable();

        if (! Schema::hasTable($table)) {
            return collect();
        }

        $columns = $this->availableColumns($table, [
            'name',
            'title',
            'description',
            'taste_profile',
            'sweetness_level',
            'menu_type',
            'category',
        ]);

        if ($columns === []) {
            return collect();
        }

        return MenuRecommendation::query()
            ->where(function (Builder $query) use ($columns): void {
                $this->applySearch($query, $columns);
            })
            ->limit(12)
            ->get()
            ->map(function (MenuRecommendation $menu): array {
                return [
                    'title' => $menu->getAttribute('name')
                        ?? $menu->getAttribute('title')
                        ?? 'Menu Matcha',

                    'description' => $menu->getAttribute('description')
                        ?? '',

                    'type' => $menu->getAttribute('menu_type')
                        ?? $menu->getAttribute('category')
                        ?? 'Rekomendasi',

                    'image' => $menu->getAttribute('image')
                        ?? $menu->getAttribute('thumbnail')
                        ?? $menu->getAttribute('gambar'),

                    'url' => route(
                        'menu-recommendations.show',
                        ['menu' => $menu]
                    ),
                ];
            });
    }

    private function searchMatchas(): Collection
    {
        $model = new Matcha();
        $table = $model->getTable();

        if (! Schema::hasTable($table)) {
            return collect();
        }

        $columns = $this->availableColumns($table, [
            'name',
            'title',
            'description',
            'category',
            'origin',
            'grade',
        ]);

        if ($columns === []) {
            return collect();
        }

        return Matcha::query()
            ->where(function (Builder $query) use ($columns): void {
                $this->applySearch($query, $columns);
            })
            ->limit(12)
            ->get()
            ->map(function (Matcha $matcha): array {
                return [
                    'title' => $matcha->getAttribute('name')
                        ?? $matcha->getAttribute('title')
                        ?? 'Matcha',

                    'description' => $matcha->getAttribute('description')
                        ?? '',

                    'type' => $matcha->getAttribute('category')
                        ?? $matcha->getAttribute('grade')
                        ?? 'Matcha',

                    'image' => $matcha->getAttribute('image')
                        ?? $matcha->getAttribute('thumbnail')
                        ?? $matcha->getAttribute('gambar'),

                    'url' => route(
                        'matchas.show',
                        ['matcha' => $matcha]
                    ),
                ];
            });
    }

    private function searchArticles(): Collection
    {
        $model = new Article();
        $table = $model->getTable();

        if (! Schema::hasTable($table)) {
            return collect();
        }

        $columns = $this->availableColumns($table, [
            'title',
            'name',
            'excerpt',
            'description',
            'content',
            'category',
        ]);

        if ($columns === []) {
            return collect();
        }

        return Article::query()
            ->where(function (Builder $query) use ($columns): void {
                $this->applySearch($query, $columns);
            })
            ->when(
                Schema::hasColumn($table, 'published_at'),
                function (Builder $query): void {
                    $query->whereNotNull('published_at')
                        ->where('published_at', '<=', now());
                }
            )
            ->limit(12)
            ->get()
            ->map(function (Article $article): array {
                return [
                    'title' => $article->getAttribute('title')
                        ?? $article->getAttribute('name')
                        ?? 'Artikel Matcha',

                    'description' => $article->getAttribute('excerpt')
                        ?? $article->getAttribute('description')
                        ?? $article->getAttribute('content')
                        ?? '',

                    'type' => 'Artikel',

                    'image' => $article->getAttribute('image')
                        ?? $article->getAttribute('thumbnail')
                        ?? $article->getAttribute('cover')
                        ?? $article->getAttribute('gambar'),

                    'url' => route(
                        'articles.show',
                        ['article' => $article]
                    ),
                ];
            });
    }

    private function availableColumns(
        string $table,
        array $columns
    ): array {
        return collect($columns)
            ->filter(
                fn (string $column): bool => Schema::hasColumn(
                    $table,
                    $column
                )
            )
            ->values()
            ->all();
    }

    private function applySearch(
        Builder $query,
        array $columns
    ): void {
        foreach ($columns as $index => $column) {
            if ($index === 0) {
                $query->where(
                    $column,
                    'LIKE',
                    '%' . $this->q . '%'
                );

                continue;
            }

            $query->orWhere(
                $column,
                'LIKE',
                '%' . $this->q . '%'
            );
        }
    }
}
