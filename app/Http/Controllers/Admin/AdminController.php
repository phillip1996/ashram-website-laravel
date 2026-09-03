<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\ContactMessage;
use App\Models\NewsItem;
use App\Models\Partner;
use App\Models\Podcast;
use App\Models\Subscriber;
use App\Models\VisitRequest;
use Inertia\Inertia;

class AdminController extends Controller
{
    public function dashboard()
    {
        return Inertia::render('Admin/Dashboard', [
            'stats' => [
                'podcasts'      => Podcast::count(),
                'articles'      => Article::count(),
                'partners'      => Partner::count(),
                'news'          => NewsItem::count(),
                'subscribers'   => Subscriber::count(),
                'messages'      => ContactMessage::count(),
                'visitRequests' => VisitRequest::count(),
                'pendingVisits' => VisitRequest::where('status', 'pending')->count(),
            ],
        ]);
    }
}