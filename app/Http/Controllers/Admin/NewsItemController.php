<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NewsItem;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Storage;

class NewsItemController extends Controller
{
    public function index()
    {
        $newsItems = NewsItem::latest()->get();
        return Inertia::render('Admin/News/Index', ['newsItems' => $newsItems]);
    }

    public function create()
    {
        return Inertia::render('Admin/News/Create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'category' => 'required|string|max:255',
            'read_time' => 'required|string|max:50',
            'link' => 'nullable|string|max:255',
            'is_active' => 'boolean',
            'image' => 'nullable|file|image|max:5120', // 5MB
        ]);

        $data = $request->only(['title', 'description', 'date', 'category', 'read_time', 'link', 'is_active']);

        // Store image
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('news/images', 'public');
            $data['image'] = '/storage/' . $path;
        }

        NewsItem::create($data);

        return redirect()->route('admin.news.index')->with('success', 'News item created.');
    }

    public function edit(NewsItem $newsItem)
    {
        return Inertia::render('Admin/News/Edit', ['newsItem' => $newsItem]);
    }

    public function update(Request $request, NewsItem $newsItem)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'category' => 'required|string|max:255',
            'read_time' => 'required|string|max:50',
            'link' => 'nullable|string|max:255',
            'is_active' => 'boolean',
            'image' => 'nullable|file|image|max:5120',
        ]);

        $data = $request->only(['title', 'description', 'date', 'category', 'read_time', 'link', 'is_active']);

        // Replace image
        if ($request->hasFile('image')) {
            // Delete old image
            if ($newsItem->image) {
                $oldPath = str_replace('/storage/', '', $newsItem->image);
                Storage::disk('public')->delete($oldPath);
            }
            $path = $request->file('image')->store('news/images', 'public');
            $data['image'] = '/storage/' . $path;
        }

        $newsItem->update($data);

        return redirect()->route('admin.news.index')->with('success', 'News item updated.');
    }

    public function destroy(NewsItem $newsItem)
    {
        // Delete image file
        if ($newsItem->image) {
            $oldPath = str_replace('/storage/', '', $newsItem->image);
            Storage::disk('public')->delete($oldPath);
        }

        $newsItem->delete();
        return redirect()->route('admin.news.index')->with('success', 'News item deleted.');
    }
}