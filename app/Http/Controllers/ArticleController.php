<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Inertia\Inertia;

class ArticleController extends Controller
{
    public function show($id)
    {
        $article = Article::where('id', $id)
            ->where('is_active', true)
            ->firstOrFail();

        return Inertia::render('Article/Show', [
            'article' => $article,
        ]);
    }
}