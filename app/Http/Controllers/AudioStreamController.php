<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;

class AudioStreamController extends Controller
{
    /**
     * Stream a file from the public disk with proper Range-request support,
     * so audio/video seeking works regardless of which dev/prod server is
     * serving the app (php artisan serve does not support Range on static
     * files, which is why seeking silently resets to the start).
     *
     * $path is the storage-relative path, e.g. "podcasts/audio/xyz.mp3"
     */
    public function stream(string $path)
    {
        $disk = Storage::disk('public');

        if (!$disk->exists($path)) {
            abort(404);
        }

        $fullPath = $disk->path($path);
        $mime = $disk->mimeType($path) ?: 'audio/mpeg';

        // response()->file() returns a Symfony BinaryFileResponse, which
        // automatically honors the Range header on the incoming request
        // and returns 206 Partial Content when appropriate — this is what
        // makes seeking work.
        return response()->file($fullPath, [
            'Content-Type' => $mime,
        ]);
    }
}