<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ArticleController as AdminArticleController;
use App\Http\Controllers\Admin\ContactMessageController;
use App\Http\Controllers\Admin\NewsItemController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\PodcastController as AdminPodcastController;
use App\Http\Controllers\Admin\SubscriberController;
use App\Http\Controllers\Admin\VisitRequestController;
use App\Http\Controllers\Admin\AyurvedicRecipeController as AdminAyurvedicRecipeController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AudioStreamController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PodcastController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubscribeController;
use App\Http\Controllers\VisitRequestController as PublicVisitRequestController;
use App\Http\Controllers\AyurvedicRecipeController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/storage-link', function () {
    try {
        Artisan::call('storage:link');
        return 'Storage link created successfully!';
    } catch (Exception $e) {
        return 'Error: ' . $e->getMessage();
    }
});

Route::get('/optimize-clear', function () {
    try {
        Artisan::call('opimize:clear');
        return 'cache clear successfully!';
    } catch (Exception $e) {
        return 'Error: ' . $e->getMessage();
    }
});

Route::get('/migrate-db', function () {
    try {
        Artisan::call('migrate');
        return 'migration ran successfully!';
    } catch (Exception $e) {
        return 'Error: ' . $e->getMessage();
    }
});
// ─────────────────────────────────────────────
// FRONTEND ROUTES
// ─────────────────────────────────────────────

Route::get('/', HomeController::class)->name('home');

Route::get('/about', function () {
    return Inertia::render('About', [
        'heroData' => [
            'type' => 'image',
            'src' => asset('images/our-journey-img.jpg'),
            'title' => 'Our Journey',
            'category' => 'About Us',
            'subtitle' => 'Discover the story behind The Lekki Ashram...',
        ],
    ]);
})->name('about');

Route::get('/contact', function () {
    return Inertia::render('Contact', [
        'heroData' => [
            'type' => 'image',
            'src' => asset('images/contact-hero.jpg'),
            'title' => 'Contact The Ashram',
            'category' => 'Get In Touch',
            'subtitle' => 'Reach out to explore retreats, workshops, or mindful programs...',
        ],
    ]);
})->name('contact');

// ─────────────────────────────────────────────
// GET INVOLVED (Donations — Coming Soon)
// ─────────────────────────────────────────────
Route::inertia('/get-involved', 'GetInvolved')->name('get-involved');

// ── Legal Pages ──
Route::get('/privacy-policy', function () {
    return Inertia::render('PrivacyPolicy');
})->name('privacy-policy');

Route::get('/terms-of-use', function () {
    return Inertia::render('TermsOfUse');
})->name('terms-of-use');

// ── Programs Page ──
Route::get('/programs', function () {
    return Inertia::render('Programs');
})->name('programs');

// ── Ayurvedic Recipes ──
Route::get('/ayurvedic-recipes', [AyurvedicRecipeController::class, 'index'])->name('ayurvedic-recipes.index');
Route::get('/ayurvedic-recipes/{slug}', [AyurvedicRecipeController::class, 'show'])->name('ayurvedic-recipes.show');

// ── Contact form submission ──
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// ── Visit Requests ──
Route::post('/visit-requests', [PublicVisitRequestController::class, 'store'])->name('visit-requests.store');

// ── Podcast Listen Counter ──
Route::post('/podcasts/{podcast}/listen', [PodcastController::class, 'incrementListen'])->name('podcasts.listen');

// ── Podcast Detail Page ──
Route::get('/podcasts/{podcast}', [PodcastController::class, 'show'])->name('podcasts.show');

// ── Audio Streaming (Range-request-capable, fixes seek/fast-forward/rewind) ──
Route::get('/media/audio/{path}', [AudioStreamController::class, 'stream'])
    ->where('path', '.*')
    ->name('audio.stream');

// ─────────────────────────────────────────────
// PHILOSOPHY PAGES
// ─────────────────────────────────────────────
Route::prefix('philosophy')->name('philosophy.')->group(function () {
    Route::get('/advaita', fn() => Inertia::render('Philosophy/Advaita'))->name('advaita');
    Route::get('/yoga', fn() => Inertia::render('Philosophy/Yoga'))->name('yoga');
    Route::get('/ecology', fn() => Inertia::render('Philosophy/Ecology'))->name('ecology');
    Route::get('/functional-medicine', fn() => Inertia::render('Philosophy/FunctionalMedicine'))->name('functional-medicine');
    Route::get('/consultancy', fn() => Inertia::render('Philosophy/Consultancy'))->name('consultancy');
});

// ─────────────────────────────────────────────
// SUPPORT PAGES
// ─────────────────────────────────────────────
Route::prefix('support')->name('support.')->group(function () {
    Route::get('/meditation-programs', fn() => Inertia::render('Support/MeditationPrograms'))->name('meditation-programs');
    Route::get('/meditation', fn() => Inertia::render('Support/Meditation'))->name('meditation');
    Route::get('/satsang', fn() => Inertia::render('Support/Satsang'))->name('satsang');
    Route::get('/conservation', fn() => Inertia::render('Support/Conservation'))->name('conservation');
    Route::get('/wellness', fn() => Inertia::render('Support/Wellness'))->name('wellness');
    Route::get('/therapy', fn() => Inertia::render('Support/Therapy'))->name('therapy');
});

// ─────────────────────────────────────────────
// CATEGORY PAGES
// ─────────────────────────────────────────────
Route::prefix('category')->name('category.')->group(function () {
    Route::get('/wisdom-series', fn() => Inertia::render('Category/WisdomSeries'))->name('wisdom-series');
    Route::get('/recent-articles', fn() => Inertia::render('Category/RecentArticles'))->name('recent-articles');
    Route::get('/news-updates', fn() => Inertia::render('Category/NewsUpdates'))->name('news-updates');
});

// ─────────────────────────────────────────────
// BLOG / ARTICLE PAGES
// ─────────────────────────────────────────────
Route::prefix('article')->name('article.')->group(function () {
    Route::get('/{id}', [ArticleController::class, 'show'])->name('show');
});

// ─────────────────────────────────────────────
// NEWS PAGES
// ─────────────────────────────────────────────
Route::prefix('news')->name('news.')->group(function () {
    Route::get('/', [NewsController::class, 'index'])->name('index');
    Route::get('/meditation-retreat-2026', fn() => Inertia::render('News/MeditationRetreat'))->name('meditation-retreat');
    Route::get('/mangrove-restoration', fn() => Inertia::render('News/MangroveRestoration'))->name('mangrove-restoration');
    Route::get('/philosophy-lectures', fn() => Inertia::render('News/PhilosophyLectures'))->name('philosophy-lectures');

    // Dynamic show route — must stay AFTER the static named routes above,
    // otherwise it would swallow requests meant for them (Laravel matches
    // routes top-to-bottom, and {id} matches any single path segment).
    Route::get('/{id}', [NewsController::class, 'show'])->name('show');
});

// ─────────────────────────────────────────────
// PUBLIC SUBSCRIPTION
// ─────────────────────────────────────────────
Route::post('/subscribe', [SubscribeController::class, 'store'])->name('subscribe');

// ─────────────────────────────────────────────
// ADMIN ROUTES (protected by auth + admin)
// ─────────────────────────────────────────────
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');

    // ── Podcasts ──
    Route::resource('podcasts', AdminPodcastController::class);

    // ── Articles ──
    Route::resource('articles', AdminArticleController::class);

    // ── Partners ──
    Route::resource('partners', PartnerController::class);

    // ── News ──
    Route::resource('news', NewsItemController::class)->parameters(['news' => 'newsItem']);

    // ── Subscribers ──
    Route::resource('subscribers', SubscriberController::class)->only(['index', 'destroy']);
    Route::patch('/subscribers/{subscriber}/toggle', [SubscriberController::class, 'toggleActive'])->name('subscribers.toggle');

    // ── Contact Messages ──
    Route::resource('contact', ContactMessageController::class)->only(['index', 'destroy']);
    Route::patch('/contact/{message}/toggle-read', [ContactMessageController::class, 'toggleRead'])->name('contact.toggle-read');

    // ── Visit Requests ──
    Route::resource('visit-requests', VisitRequestController::class)->only(['index', 'destroy']);
    // ✅ This is the route your Vue component calls
    Route::patch('/visit-requests/{visitRequest}/status', [VisitRequestController::class, 'updateStatus'])->name('visit-requests.update-status');

    // ── Ayurvedic Recipes (Admin CRUD) ──
    Route::resource('ayurvedic-recipes', AdminAyurvedicRecipeController::class)
        ->except(['show'])
        ->parameters(['ayurvedic-recipes' => 'recipe']);
});

// ─────────────────────────────────────────────
// AUTH ROUTES (Breeze)
// ─────────────────────────────────────────────
Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// ─────────────────────────────────────────────
// FALLBACK ROUTE (404)
// ─────────────────────────────────────────────
Route::fallback(function () {
    return Inertia::render('Errors/404');
})->name('fallback');