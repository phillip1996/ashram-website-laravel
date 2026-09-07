<?php

namespace App\Http\Controllers;

use App\Models\AyurvedicRecipe;
use Inertia\Inertia;

class AyurvedicRecipeController extends Controller
{
    public function index()
    {
        $recipes = AyurvedicRecipe::with('gallery')
            ->active()
            ->latest()
            ->get();

        return Inertia::render('AyurvedicRecipes/Index', [
            'recipes' => $recipes,
        ]);
    }

    public function show($slug)
    {
        // ✅ Try to find by slug
        $recipe = AyurvedicRecipe::with('gallery')
            ->where('slug', $slug)
            ->active()
            ->first();

        // ✅ If not found and it's numeric, try by ID (for old links)
        if (!$recipe && is_numeric($slug)) {
            $recipe = AyurvedicRecipe::with('gallery')
                ->find($slug);
            
            if ($recipe && $recipe->is_active) {
                // Redirect to the correct slug
                return redirect()->route('ayurvedic-recipes.show', $recipe->slug);
            }
        }

        // ✅ If still not found, throw 404
        if (!$recipe) {
            abort(404);
        }

        return Inertia::render('AyurvedicRecipes/Show', [
            'recipe' => $recipe,
        ]);
    }
}