<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\NewsItem;
use App\Models\Partner;
use App\Models\Podcast;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        // ── Podcasts ──
        Podcast::create([
            'episode' => '01',
            'title' => 'Silence as Infrastructure',
            'description' => 'Why silence is necessary for societal stability and personal growth.',
            'date' => '2026-01-15',
            'duration' => '48:22',
            'duration_seconds' => 2902,
            'category' => 'CONSCIOUSNESS',
            'thumbnail' => 'https://images.unsplash.com/photo-1545235617-9465d2a55698?auto=format&fit=crop&q=80&w=800',
            'audio' => null,
            'listens' => 12500,
            'bookmarked' => true,
            'speaker_name' => 'Dr. Arjun Patel',
            'speaker_role' => 'Senior Philosopher',
            'speaker_avatar' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&q=80&w=200',
            'is_active' => true,
        ]);

        Podcast::create([
            'episode' => '02',
            'title' => 'Nature as Governance',
            'description' => 'Ecological systems as frameworks for human organization.',
            'date' => '2026-02-22',
            'duration' => '52:10',
            'duration_seconds' => 3130,
            'category' => 'ECOLOGY',
            'thumbnail' => 'https://images.unsplash.com/photo-1506905925346-21bda4d32df4?auto=format&fit=crop&q=80&w=800',
            'audio' => null,
            'listens' => 8700,
            'bookmarked' => false,
            'speaker_name' => 'Maya Sharma',
            'speaker_role' => 'Ecological Director',
            'speaker_avatar' => 'https://images.unsplash.com/photo-1494790108755-2616b612b786?auto=format&fit=crop&q=80&w=200',
            'is_active' => true,
        ]);

        // ── Partners ──
        Partner::create([
            'name' => 'UNEP',
            'logo' => '/images/UNEP-logo.png',
            'location' => 'Global',
            'is_active' => true,
        ]);

        Partner::create([
            'name' => 'Nigerian Conservation Foundation',
            'logo' => '/images/NCF-logo.png',
            'location' => 'Nigeria',
            'is_active' => true,
        ]);

        Partner::create([
            'name' => 'Vedanta Society',
            'logo' => '/images/vendata-logo.png',
            'location' => 'New York',
            'is_active' => true,
        ]);

        // ── Articles ──
        Article::create([
            'title' => 'Indian Professional Forum',
            'category' => 'Meditation',
            'date' => '2025-12-10',
            'description' => 'Establishing a sacred morning routine for mental clarity and spiritual connection.',
            'image' => '/images/Indian-Expo.jpg',
            'link' => '/blog/morning-meditation',
            'read_time' => '5 min read',
            'is_active' => true,
        ]);

        Article::create([
            'title' => 'Water Conservation Practices',
            'category' => 'Ecology',
            'date' => '2025-12-08',
            'description' => 'Traditional water conservation methods adapted for modern ecological stewardship.',
            'image' => '/images/water-conservation.jpg',
            'link' => '/blog/water-conservation',
            'read_time' => '7 min read',
            'is_active' => true,
        ]);

        // ── News ──
        NewsItem::create([
            'title' => 'Indian Professional Forum',
            'description' => 'Join us for a week-long intensive meditation retreat focused on inner silence.',
            'date' => '2026-01-15',
            'category' => 'EVENT',
            'read_time' => '3 min read',
            'image' => '/images/Indian-Expo.jpg',
            'link' => '/news/meditation-retreat-2026',
            'is_active' => true,
        ]);

        NewsItem::create([
            'title' => 'New Ecological Conservation Program',
            'description' => 'Launching our mangrove restoration project in partnership with NCF.',
            'date' => '2026-01-12',
            'category' => 'CONSERVATION',
            'read_time' => '4 min read',
            'image' => '/images/mangrove-restoration.jpg',
            'link' => '/news/mangrove-restoration',
            'is_active' => true,
        ]);
    }
}