<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AyurvedicRecipe;
use App\Models\RecipeGallery;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class AyurvedicRecipeController extends Controller
{
    public function index()
    {
        $recipes = AyurvedicRecipe::latest()->get();
        return Inertia::render('Admin/AyurvedicRecipes/Index', [
            'recipes' => $recipes,
        ]);
    }

    public function create()
    {
        return Inertia::render('Admin/AyurvedicRecipes/Create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'ingredients' => 'required|string',
            'instructions' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,webp|max:5120',
            'video_file' => 'nullable|file|mimes:mp4,webm,ogg|max:51200',
            'video_url' => 'nullable|url|max:255',
            'category' => 'nullable|string|max:100',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
            'gallery_images' => 'nullable|array',
            'gallery_images.*' => 'nullable|file|image|mimes:jpeg,png,webp|max:5120',
        ]);

        // Handle main image
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . Str::slug($validated['title']) . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('ayurvedic-recipes/images', $imageName, 'public');
            $validated['image'] = $path;
        }

        // Handle video file
        if ($request->hasFile('video_file')) {
            $video = $request->file('video_file');
            $videoName = time() . '_' . Str::slug($validated['title']) . '.' . $video->getClientOriginalExtension();
            $path = $video->storeAs('ayurvedic-recipes/videos', $videoName, 'public');
            $validated['video_file'] = $path;
        }

        $validated['slug'] = Str::slug($validated['title']);

        $recipe = AyurvedicRecipe::create($validated);

        // Handle gallery images
        if ($request->hasFile('gallery_images')) {
            foreach ($request->file('gallery_images') as $index => $file) {
                $galleryName = time() . '_gallery_' . $index . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('ayurvedic-recipes/gallery', $galleryName, 'public');
                RecipeGallery::create([
                    'ayurvedic_recipe_id' => $recipe->id,
                    'image' => $path,
                    'caption' => $request->gallery_captions[$index] ?? null,
                    'order' => $index,
                ]);
            }
        }

        return redirect()->route('admin.ayurvedic-recipes.index')
            ->with('success', 'Recipe created successfully.');
    }

    public function edit(AyurvedicRecipe $recipe)
    {
        return Inertia::render('Admin/AyurvedicRecipes/Edit', [
            'recipe' => $recipe->load('gallery'),
        ]);
    }

    // 🔥 FIXED: Update method with proper image handling
    public function update(Request $request, AyurvedicRecipe $recipe)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'ingredients' => 'required|string',
            'instructions' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,webp|max:5120',
            'video_file' => 'nullable|file|mimes:mp4,webm,ogg|max:51200',
            'video_url' => 'nullable|url|max:255',
            'category' => 'nullable|string|max:100',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
            'gallery_images' => 'nullable|array',
            'gallery_images.*' => 'nullable|file|image|mimes:jpeg,png,webp|max:5120',
        ]);

        $oldSlug = $recipe->slug;

        // 🔥 CRITICAL: Remove image from validated data if not uploaded
        // This prevents the image field from being set to null
        if (!$request->hasFile('image')) {
            unset($validated['image']);
        }

        // 🔥 CRITICAL: Remove video_file from validated data if not uploaded
        if (!$request->hasFile('video_file')) {
            unset($validated['video_file']);
        }

        // Handle main image - only if a new image is uploaded
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($recipe->image && Storage::disk('public')->exists($recipe->image)) {
                Storage::disk('public')->delete($recipe->image);
            }
            $image = $request->file('image');
            $imageName = time() . '_' . Str::slug($validated['title']) . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('ayurvedic-recipes/images', $imageName, 'public');
            $validated['image'] = $path;
        }

        // Handle video file - only if a new video is uploaded
        if ($request->hasFile('video_file')) {
            // Delete old video if exists
            if ($recipe->video_file && Storage::disk('public')->exists($recipe->video_file)) {
                Storage::disk('public')->delete($recipe->video_file);
            }
            $video = $request->file('video_file');
            $videoName = time() . '_' . Str::slug($validated['title']) . '.' . $video->getClientOriginalExtension();
            $path = $video->storeAs('ayurvedic-recipes/videos', $videoName, 'public');
            $validated['video_file'] = $path;
        }

        // Update the recipe (this will only update fields that are in $validated)
        $recipe->update($validated);

        // Handle new gallery images
        if ($request->hasFile('gallery_images')) {
            // Get current max order
            $maxOrder = $recipe->gallery()->max('order') ?? -1;
            
            foreach ($request->file('gallery_images') as $index => $file) {
                $galleryName = time() . '_gallery_' . ($index + $maxOrder + 1) . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('ayurvedic-recipes/gallery', $galleryName, 'public');
                RecipeGallery::create([
                    'ayurvedic_recipe_id' => $recipe->id,
                    'image' => $path,
                    'caption' => $request->gallery_captions[$index] ?? null,
                    'order' => $maxOrder + $index + 1,
                ]);
            }
        }

        // Handle gallery deletions
        if ($request->has('delete_gallery_ids') && !empty($request->delete_gallery_ids)) {
            $ids = explode(',', $request->delete_gallery_ids);
            foreach ($ids as $id) {
                $galleryItem = RecipeGallery::find($id);
                if ($galleryItem) {
                    if (Storage::disk('public')->exists($galleryItem->image)) {
                        Storage::disk('public')->delete($galleryItem->image);
                    }
                    $galleryItem->delete();
                }
            }
        }

        $newSlug = $recipe->fresh()->slug;
        if ($oldSlug !== $newSlug) {
            return redirect()->route('admin.ayurvedic-recipes.edit', $newSlug)
                ->with('success', 'Recipe updated successfully. Slug updated to: ' . $newSlug);
        }

        return redirect()->route('admin.ayurvedic-recipes.index')
            ->with('success', 'Recipe updated successfully.');
    }

    public function destroy(AyurvedicRecipe $recipe)
    {
        // Delete main image
        if ($recipe->image && Storage::disk('public')->exists($recipe->image)) {
            Storage::disk('public')->delete($recipe->image);
        }
        
        // Delete video
        if ($recipe->video_file && Storage::disk('public')->exists($recipe->video_file)) {
            Storage::disk('public')->delete($recipe->video_file);
        }

        // Delete gallery images
        if ($recipe->gallery) {
            foreach ($recipe->gallery as $item) {
                if (Storage::disk('public')->exists($item->image)) {
                    Storage::disk('public')->delete($item->image);
                }
                $item->delete();
            }
        }

        $recipe->delete();
        return redirect()->route('admin.ayurvedic-recipes.index')
            ->with('success', 'Recipe deleted successfully.');
    }
}