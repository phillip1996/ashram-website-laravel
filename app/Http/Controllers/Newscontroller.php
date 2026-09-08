<?php

namespace App\Http\Controllers;

use App\Models\NewsItem;
use Inertia\Inertia;

class NewsController extends Controller
{
    public function index()
    {
        $newsItems = NewsItem::where('is_active', true)
            ->latest()
            ->get();

        return Inertia::render('News/Index', [
            'newsItems' => $newsItems,
        ]);
    }

    /**
     * Display a single news item.
     * Route: GET /news/{id}  ->  name: news.show
     */
    public function show($id)
    {
        $newsItem = NewsItem::where('is_active', true)->findOrFail($id);

        return Inertia::render('News/Show', [
            'newsItem' => $newsItem,
        ]);
    }
}