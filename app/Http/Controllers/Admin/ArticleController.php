<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::latest()->get();
        return Inertia::render('Admin/Articles/Index', ['articles' => $articles]);
    }

    public function create()
    {
        return Inertia::render('Admin/Articles/Create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'date' => 'required|date',
            'description' => 'required|string', // HTML allowed
            'link' => 'nullable|string|max:255',
            'read_time' => 'required|string|max:50',
            'is_active' => 'boolean',
            'is_featured' => 'boolean',
            'image' => 'nullable|file|image|max:5120', // 5MB
        ]);

        $data = $request->only([
            'title', 'category', 'date', 'description', 'link',
            'read_time', 'is_active', 'is_featured'
        ]);

        // Store image
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('articles/images', 'public');
            $data['image'] = '/storage/' . $path;
        }

        Article::create($data);

        return redirect()->route('admin.articles.index')->with('success', 'Article created.');
    }

    public function edit(Article $article)
    {
        return Inertia::render('Admin/Articles/Edit', ['article' => $article]);
    }

    public function update(Request $request, Article $article)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'date' => 'required|date',
            'description' => 'required|string', // HTML allowed
            'link' => 'nullable|string|max:255',
            'read_time' => 'required|string|max:50',
            'is_active' => 'boolean',
            'is_featured' => 'boolean',
            'image' => 'nullable|file|image|max:5120',
        ]);

        $data = $request->only([
            'title', 'category', 'date', 'description', 'link',
            'read_time', 'is_active', 'is_featured'
        ]);

        // Replace image
        if ($request->hasFile('image')) {
            // Delete old image
            if ($article->image) {
                $oldPath = str_replace('/storage/', '', $article->image);
                Storage::disk('public')->delete($oldPath);
            }
            $path = $request->file('image')->store('articles/images', 'public');
            $data['image'] = '/storage/' . $path;
        }

        $article->update($data);

        return redirect()->route('admin.articles.index')->with('success', 'Article updated.');
    }

    public function destroy(Article $article)
    {
        // Delete image file
        if ($article->image) {
            $oldPath = str_replace('/storage/', '', $article->image);
            Storage::disk('public')->delete($oldPath);
        }

        $article->delete();
        return redirect()->route('admin.articles.index')->with('success', 'Article deleted.');
    }
}