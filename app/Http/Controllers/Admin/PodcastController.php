<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Podcast;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Storage;

class PodcastController extends Controller
{
    public function index()
    {
        $podcasts = Podcast::latest()->get();
        return Inertia::render('Admin/Podcasts/Index', ['podcasts' => $podcasts]);
    }

    public function create()
    {
        return Inertia::render('Admin/Podcasts/Create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'episode' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'duration' => 'required|string|max:20',
            'duration_seconds' => 'required|integer',
            'category' => 'required|string|max:255',
            'speaker_name' => 'required|string|max:255',
            'speaker_role' => 'required|string|max:255',
            'bookmarked' => 'boolean',
            'is_active' => 'boolean',
            'thumbnail' => 'nullable|file|image|max:5120', // 5MB
            'audio' => 'nullable|file|mimes:mp3,wav,aac,ogg,webm|max:51200', // 50MB
            'speaker_avatar' => 'nullable|file|image|max:2048', // 2MB
        ]);

        $data = $request->only([
            'episode', 'title', 'description', 'date', 'duration',
            'duration_seconds', 'category', 'speaker_name', 'speaker_role',
            'bookmarked', 'is_active'
        ]);

        // Store files
        if ($request->hasFile('thumbnail')) {
            $path = $request->file('thumbnail')->store('podcasts/thumbnails', 'public');
            $data['thumbnail'] = '/storage/' . $path;
        }

        if ($request->hasFile('audio')) {
            $path = $request->file('audio')->store('podcasts/audio', 'public');
            $data['audio'] = '/storage/' . $path;
        }

        if ($request->hasFile('speaker_avatar')) {
            $path = $request->file('speaker_avatar')->store('podcasts/avatars', 'public');
            $data['speaker_avatar'] = '/storage/' . $path;
        }

        Podcast::create($data);

        return redirect()->route('admin.podcasts.index')->with('success', 'Podcast created.');
    }

    public function edit(Podcast $podcast)
    {
        return Inertia::render('Admin/Podcasts/Edit', ['podcast' => $podcast]);
    }

    public function update(Request $request, Podcast $podcast)
    {
        $validated = $request->validate([
            'episode' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'duration' => 'required|string|max:20',
            'duration_seconds' => 'required|integer',
            'category' => 'required|string|max:255',
            'speaker_name' => 'required|string|max:255',
            'speaker_role' => 'required|string|max:255',
            'bookmarked' => 'boolean',
            'is_active' => 'boolean',
            'thumbnail' => 'nullable|file|image|max:5120',
            'audio' => 'nullable|file|mimes:mp3,wav,aac,ogg,webm|max:51200',
            'speaker_avatar' => 'nullable|file|image|max:2048',
        ]);

        $data = $request->only([
            'episode', 'title', 'description', 'date', 'duration',
            'duration_seconds', 'category', 'speaker_name', 'speaker_role',
            'bookmarked', 'is_active'
        ]);

        // Handle file replacements
        if ($request->hasFile('thumbnail')) {
            // Delete old file
            if ($podcast->thumbnail) {
                $oldPath = str_replace('/storage/', '', $podcast->thumbnail);
                Storage::disk('public')->delete($oldPath);
            }
            $path = $request->file('thumbnail')->store('podcasts/thumbnails', 'public');
            $data['thumbnail'] = '/storage/' . $path;
        }

        if ($request->hasFile('audio')) {
            if ($podcast->audio) {
                $oldPath = str_replace('/storage/', '', $podcast->audio);
                Storage::disk('public')->delete($oldPath);
            }
            $path = $request->file('audio')->store('podcasts/audio', 'public');
            $data['audio'] = '/storage/' . $path;
        }

        if ($request->hasFile('speaker_avatar')) {
            if ($podcast->speaker_avatar) {
                $oldPath = str_replace('/storage/', '', $podcast->speaker_avatar);
                Storage::disk('public')->delete($oldPath);
            }
            $path = $request->file('speaker_avatar')->store('podcasts/avatars', 'public');
            $data['speaker_avatar'] = '/storage/' . $path;
        }

        $podcast->update($data);

        return redirect()->route('admin.podcasts.index')->with('success', 'Podcast updated.');
    }

    public function destroy(Podcast $podcast)
    {
        // Delete associated files
        if ($podcast->thumbnail) {
            $oldPath = str_replace('/storage/', '', $podcast->thumbnail);
            Storage::disk('public')->delete($oldPath);
        }
        if ($podcast->audio) {
            $oldPath = str_replace('/storage/', '', $podcast->audio);
            Storage::disk('public')->delete($oldPath);
        }
        if ($podcast->speaker_avatar) {
            $oldPath = str_replace('/storage/', '', $podcast->speaker_avatar);
            Storage::disk('public')->delete($oldPath);
        }

        $podcast->delete();
        return redirect()->route('admin.podcasts.index')->with('success', 'Podcast deleted.');
    }
}