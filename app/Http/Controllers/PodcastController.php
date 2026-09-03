<?php

namespace App\Http\Controllers;

use App\Models\Podcast;
use Illuminate\Http\Request;

class PodcastController extends Controller
{
    public function incrementListen(Podcast $podcast)
    {
        // Increment the listen count
        $podcast->increment('listens');

        // Reload the model to get the updated count
        $podcast->refresh();

        // Return JSON response for the frontend to update the UI
        return response()->json([
            'success' => true,
            'podcast' => $podcast
        ]);
    }
}