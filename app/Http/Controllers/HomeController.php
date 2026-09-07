<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\AyurvedicRecipe;
use App\Models\NewsItem;
use App\Models\Partner;
use App\Models\Podcast;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function __invoke()
    {
        // ── Hero slides ──
        $heroSlides = collect(config('hero.home', []))->map(function ($slide) {
            return [
                'type' => $slide['type'] ?? 'video',
                'src' => asset($slide['src'] ?? ''),
                'poster' => isset($slide['poster']) ? asset($slide['poster']) : '',
                'category' => $slide['category'] ?? '',
                'title' => $slide['title'] ?? '',
                'subtitle' => $slide['subtitle'] ?? '',
                'philosophyText' => $slide['philosophyText'] ?? '',
                'philosophyLink' => $slide['philosophyLink'] ?? '',
                'supportText' => $slide['supportText'] ?? '',
                'supportLink' => $slide['supportLink'] ?? '',
            ];
        })->toArray();

        // ── Dynamic content ──
        $podcasts = Podcast::where('is_active', true)->latest()->get();
        $partners = Partner::where('is_active', true)->get();
        $newsItems = NewsItem::where('is_active', true)->latest()->take(3)->get();

        // ── Featured articles ──
        $featuredArticles = Article::where('is_active', true)
            ->where('is_featured', true)
            ->latest()
            ->take(5)
            ->get();

        // ── Regular articles ──
        $recentArticles = Article::where('is_active', true)
            ->where('is_featured', false)
            ->latest()
            ->get();

        // ── ✅ ALL active Ayurvedic Recipes with gallery eager loading ──
        // 'gallery' is eager-loaded because the model's `gallery_images`
        // accessor (via $appends) touches this relation on every recipe
        // during serialization. Without eager-loading, this either fires
        // one query per recipe or, if lazy loading is disallowed in
        // AppServiceProvider, throws and takes down the whole page —
        // hero slider included, since it's all one Inertia response.
        $recipes = AyurvedicRecipe::with('gallery')
            ->active()
            ->latest()
            ->take(3) // Show first 3 on home page
            ->get();

        // ── Total active recipes (for "View All" button) ──
        $totalRecipesCount = AyurvedicRecipe::active()->count();

        // ── Static content ──
        $pillars = config('ashram.pillars', []);
        $featuredPoints = config('ashram.featured_points', []);
        $experiences = [
            ['year' => '2024', 'title' => 'Foundation', 'description' => 'Establishment of the Ashram as a conscious living institution rooted in Advaita and ecology.'],
            ['year' => '2025', 'title' => 'Ecological Integration', 'description' => 'Active conservation programs and global environmental partnerships with UNEP and WWF.'],
            ['year' => '2026', 'title' => 'Global Outreach', 'description' => 'International education, philosophical dialogues, and cross-cultural collaborations.'],
        ];

        return Inertia::render('Home', [
            'heroSlides'        => $heroSlides,
            'pillars'           => $pillars,
            'experiences'       => $experiences,
            'podcasts'          => $podcasts,
            'partners'          => $partners,
            'newsItems'         => $newsItems,
            'featuredArticles'  => $featuredArticles,
            'recentArticles'    => $recentArticles,
            'recipes'           => $recipes,           
            'totalRecipesCount' => $totalRecipesCount,
            'featuredPoints'    => $featuredPoints,
            'concencrationImg'  => asset('images/concencration.jpg'),
            'indianExpoImg'     => asset('images/Indian-Expo.jpg'),
        ]);
    }
}