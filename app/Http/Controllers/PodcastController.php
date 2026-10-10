<?php

namespace App\Http\Controllers;

use App\Models\Podcast;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PodcastController extends Controller
{
    public function incrementListen(Podcast $podcast)
    {
        $podcast->increment('listens');
        $podcast->refresh();

        return response()->json([
            'success' => true,
            'podcast' => $podcast
        ]);
    }

    /**
     * Show a single podcast episode.
     */
    public function show(Podcast $podcast)
    {
        // Sanitize the description using the 'default' profile.
        // This strips scripts, event handlers, and other XSS vectors.
        $podcast->description = clean($podcast->description, 'default');

        $related = Podcast::where('id', '!=', $podcast->id)
            ->latest()
            ->take(3)
            ->get()
            ->map(function ($ep) {
                $ep->description = clean($ep->description, 'default');
                return $ep;
            });

        return Inertia::render('Podcast', [
            'podcast' => $podcast,
            'related' => $related,
        ]);
    }
}