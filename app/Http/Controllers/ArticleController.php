<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Inertia\Inertia;

class ArticleController extends Controller
{
    /**
     * Display a single article.
     * Route: GET /article/{id}  ->  name: article.show
     */
    public function show($id)
    {
        $article = Article::where('is_active', true)->findOrFail($id);

        return Inertia::render('Articles/Show', [
            'article' => $article,
        ]);
    }
}