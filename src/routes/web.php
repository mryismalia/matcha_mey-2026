<?php

use App\Livewire\Pages\AboutPage;
use App\Livewire\Pages\CatalogPage;
use App\Livewire\Pages\ContactPage;
use App\Livewire\Pages\HomePage;
use App\Livewire\Pages\SearchPage;
use App\Models\Article;
use App\Models\Matcha;
use App\Models\MenuRecommendation;
use App\Models\SiteContent;
use Illuminate\Support\Facades\Route;
use Livewire\Livewire;

/*
|--------------------------------------------------------------------------
| Livewire Asset Routes
|--------------------------------------------------------------------------
*/

Livewire::setUpdateRoute(function ($handle) {
    return Route::post(
        config('app.asset_prefix') . '/livewire/update',
        $handle
    );
});

Livewire::setScriptRoute(function ($handle) {
    return Route::get(
        config('app.asset_prefix') . '/livewire/livewire.js',
        $handle
    );
});

/*
|--------------------------------------------------------------------------
| Main Pages
|--------------------------------------------------------------------------
*/

Route::get('/', HomePage::class)
    ->name('home');

Route::get('/about', AboutPage::class)
    ->name('about');

Route::get('/catalog', CatalogPage::class)
    ->name('catalog');

Route::get('/search', SearchPage::class)
    ->name('search');

Route::get('/contact', ContactPage::class)
    ->name('contact');

/*
|--------------------------------------------------------------------------
| Matcha Catalog
|--------------------------------------------------------------------------
*/

Route::get('/matchas', function () {
    return view('matchas.index', [
        'hero' => SiteContent::section(
            'matchas',
            'hero'
        ),

        'matchas' => Matcha::when(
            request('category'),
            function ($query) {
                $query->where(
                    'category',
                    request('category')
                );
            }
        )
            ->latest()
            ->paginate(9),
    ]);
})
    ->name('matchas.index');

Route::get('/matchas/{matcha}', function (Matcha $matcha) {
    return view(
        'matchas.show',
        compact('matcha')
    );
})
    ->name('matchas.show');

/*
|--------------------------------------------------------------------------
| Articles
|--------------------------------------------------------------------------
*/

Route::get('/articles', function () {
    return view('articles.index', [
        'hero' => SiteContent::section(
            'articles',
            'hero'
        ),

        'articles' => Article::published()
            ->latest('published_at')
            ->paginate(9),
    ]);
})
    ->name('articles.index');

Route::get('/articles/{article}', function (Article $article) {
    abort_unless(
        $article->published_at
        && $article->published_at <= now(),
        404
    );

    return view('articles.show', [
        'article' => $article,
        'popularArticles' => Article::published()
            ->where('id', '!=', $article->id)
            ->latest('published_at')
            ->take(3)
            ->get(),
    ]);
})
    ->name('articles.show');

/*
|--------------------------------------------------------------------------
| Recommendation
|--------------------------------------------------------------------------
*/

Route::get('/rekomendasi', function () {
    $filters = request()->only([
        'taste_profile',
        'sweetness_level',
        'menu_type',
    ]);

    return view('menu-recommendations.index', [
        'hero' => SiteContent::section(
            'menu-recommendations',
            'hero'
        ),

        'menus' => MenuRecommendation::filter($filters)
            ->latest()
            ->paginate(9),

        'filters' => $filters,

        'tasteProfiles' => MenuRecommendation::TASTE_PROFILES,

        'sweetnessLevels' => MenuRecommendation::SWEETNESS_LEVELS,

        'menuTypes' => MenuRecommendation::MENU_TYPES,
    ]);
})
    ->name('menu-recommendations.index');

Route::get(
    '/rekomendasi/{menu}',
    function (MenuRecommendation $menu) {
        return view(
            'menu-recommendations.show',
            compact('menu')
        );
    }
)
    ->name('menu-recommendations.show');
