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
}