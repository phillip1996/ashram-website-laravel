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
        
        // Fetch ALL active news items (not just 3)
        $newsItems = NewsItem::where('is_active', true)->latest()->get();

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

        // ── Ayurvedic Recipes ──
        $recipes = AyurvedicRecipe::with('gallery')
            ->active()
            ->latest()
            ->take(3)
            ->get();

        $totalRecipesCount = AyurvedicRecipe::active()->count();

        // ── Static content ──
        $pillars = config('ashram.pillars', []);
        $featuredPoints = config('ashram.featured_points', []);
        $experiences = [
            ['year' => '2024', 'title' => 'Foundation', 'description' => 'Establishment of the Ashram as a conscious living institution rooted in Advaita and ecology.'],
            ['year' => '2025', 'title' => 'Ecological Integration', 'description' => 'Active conservation programs and global environmental partnerships with foremost conservation and biodversity organizations across the world.'],
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