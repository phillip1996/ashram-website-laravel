<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Podcast extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'category',
        'episode',
        'thumbnail',
        'audio',
        'duration',
        'duration_seconds', // ✅ Add this line
        'speaker_name',
        'speaker_role',
        'speaker_avatar',
        'date',
        'is_active',
        'listens',
    ];

    protected $casts = [
        'date' => 'date',
        'is_active' => 'boolean',
    ];

    /**
     * The 'audio' column stores a path like "/storage/podcasts/audio/xyz.mp3"
     * (saved by PodcastController via Storage::disk('public')->store()).
     *
     * This accessor rewrites that stored path into a URL that is served
     * through AudioStreamController instead of directly from /storage.
     *
     * Why: static files served straight from /storage don't reliably
     * support HTTP Range requests in every environment (notably
     * `php artisan serve`), which breaks seeking/fast-forward/rewind on
     * audio elements — the browser can't jump to a byte offset, so it
     * silently restarts playback from 0. Routing through
     * AudioStreamController (which uses Symfony's BinaryFileResponse)
     * guarantees Range support everywhere, dev and prod alike.
     */
    protected function audio(): Attribute
    {
        return Attribute::make(
            get: function ($value) {
                if (!$value) {
                    return $value;
                }

                // Strip a leading "/storage/" (or "storage/") prefix so we're
                // left with the disk-relative path, e.g. "podcasts/audio/xyz.mp3"
                $relativePath = ltrim(preg_replace('#^/?storage/#', '', $value), '/');

                return route('audio.stream', ['path' => $relativePath]);
            }
        );
    }
}