<?php

namespace App\Http\Controllers;

use App\Models\Podcast;
use App\Models\Article;
use App\Models\Partner;
use App\Models\NewsItem;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function __invoke()
    {
        // Hero slides
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

        // Dynamic content
        $podcasts = Podcast::where('is_active', true)->latest()->get();
        $partners = Partner::where('is_active', true)->get();
        // NOTE: no ->take() here — the homepage News & Updates section is now a
        // button-controlled horizontal carousel (3 per page), so it needs the
        // full set of active news items to page through.
        $newsItems = NewsItem::where('is_active', true)->latest()->get();

        // Featured articles (all featured – for carousel)
        $featuredArticles = Article::where('is_active', true)
            ->where('is_featured', true)
            ->latest()
            ->take(5) // you can adjust the limit
            ->get();

        // Regular articles (non-featured)
        // NOTE: no ->take() here on purpose — the full set is sent to the frontend,
        // and Home.vue's `visibleArticles` computed handles showing only the first 3
        // until "View All Articles" is clicked (same pattern as $podcasts above).
        $recentArticles = Article::where('is_active', true)
            ->where('is_featured', false)
            ->latest()
            ->get();

        // Static content
        $pillars = config('ashram.pillars', []);
        $featuredPoints = config('ashram.featured_points', []);
        $experiences = [
            ['year' => '2024', 'title' => 'Foundation', 'description' => 'Establishment of the Ashram as a conscious living institution rooted in Advaita and ecology.'],
            ['year' => '2025', 'title' => 'Ecological Integration', 'description' => 'Active conservation programs and global environmental partnerships with UNEP and WWF.'],
            ['year' => '2026', 'title' => 'Global Outreach', 'description' => 'International education, philosophical dialogues, and cross-cultural collaborations.'],
        ];

        return Inertia::render('Home', [
            'heroSlides' => $heroSlides,
            'pillars' => $pillars,
            'experiences' => $experiences,
            'podcasts' => $podcasts,
            'partners' => $partners,
            'newsItems' => $newsItems,
            'featuredArticles' => $featuredArticles,
            'recentArticles' => $recentArticles,
            'featuredPoints' => $featuredPoints,
            'concencrationImg' => asset('images/concencration.jpg'),
            'indianExpoImg' => asset('images/Indian-Expo.jpg'),
        ]);
    }
}