<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\SiteContent;

class ArticleController extends Controller
{
    public function index()
    {
        return view('articles.index', [
            'hero' => SiteContent::section('articles', 'hero'),
            'articles' => Article::published()
                ->latest('published_at')
                ->paginate(9),
        ]);
    }

    public function show(Article $article)
    {
        return view('articles.show', [
            'article' => $article,
        ]);
    }
}
