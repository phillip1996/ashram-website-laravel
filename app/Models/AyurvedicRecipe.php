<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class AyurvedicRecipe extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'ingredients',
        'instructions',
        'image',
        'video_url',
        'video_file',
        'category',
        'is_featured',
        'is_active',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    protected $appends = [
        'image_url',
        'video_file_url',
        'embed_video_url',
        'has_video',
        'gallery_images',
    ];

    // ─── Relationships ───
    public function gallery()
    {
        return $this->hasMany(RecipeGallery::class, 'ayurvedic_recipe_id')
            ->where('is_active', true)
            ->orderBy('order', 'asc');
    }

    // ─── Boot ───
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($recipe) {
            if (empty($recipe->slug)) {
                $recipe->slug = static::generateUniqueSlug($recipe->title);
            }
        });

        static::updating(function ($recipe) {
            if ($recipe->isDirty('title')) {
                $recipe->slug = static::generateUniqueSlug($recipe->title, $recipe->id);
            }
        });
    }

    protected static function generateUniqueSlug($title, $excludeId = null)
    {
        $baseSlug = Str::slug($title);
        $slug = $baseSlug;
        $counter = 1;

        while (static::where('slug', $slug)
            ->when($excludeId, function ($query) use ($excludeId) {
                return $query->where('id', '!=', $excludeId);
            })
            ->exists()
        ) {
            $slug = $baseSlug . '-' . $counter++;
        }

        return $slug;
    }

    // ─── Scopes ───
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopeCategory($query, $category)
    {
        return $query->where('category', $category);
    }

    public function scopeSearch($query, $term)
    {
        return $query->where('title', 'LIKE', "%{$term}%")
            ->orWhere('description', 'LIKE', "%{$term}%");
    }

    // ─── Accessors ───
    // Trusts the stored relative path (e.g. "ayurvedic-recipes/images/xxx.jpg")
    // and lets Laravel's public disk build the URL. No file_exists() guessing.
    public function getImageUrlAttribute(): ?string
    {
        if (empty($this->image)) {
            return null;
        }

        // Already a full URL (external link)
        if (filter_var($this->image, FILTER_VALIDATE_URL)) {
            return $this->image;
        }

        return Storage::disk('public')->url($this->image);
    }

    public function getVideoFileUrlAttribute(): ?string
    {
        if (empty($this->video_file)) {
            return null;
        }

        if (filter_var($this->video_file, FILTER_VALIDATE_URL)) {
            return $this->video_file;
        }

        return Storage::disk('public')->url($this->video_file);
    }

    public function getEmbedVideoUrlAttribute(): ?string
    {
        $url = $this->video_url;
        if (empty($url)) {
            return null;
        }

        if (str_contains($url, 'youtube.com/watch') || str_contains($url, 'youtu.be')) {
            if (str_contains($url, 'youtube.com/watch')) {
                parse_str(parse_url($url, PHP_URL_QUERY), $query);
                $videoId = $query['v'] ?? null;
            } else {
                $videoId = basename($url);
            }
            return $videoId ? "https://www.youtube.com/embed/{$videoId}" : null;
        }

        if (str_contains($url, 'vimeo.com')) {
            $videoId = basename($url);
            return "https://player.vimeo.com/video/{$videoId}";
        }

        return $url;
    }

    public function getHasVideoAttribute(): bool
    {
        return !empty($this->video_file) || !empty($this->video_url);
    }

    public function getGalleryImagesAttribute()
    {
        $gallery = $this->relationLoaded('gallery')
            ? $this->getRelation('gallery')
            : $this->gallery()->get();

        return $gallery->map(function ($item) {
            return [
                'id' => $item->id,
                'image_url' => $item->image_url,
                'caption' => $item->caption,
            ];
        });
    }

    public function getIngredientsArrayAttribute(): array
    {
        if (empty($this->ingredients)) {
            return [];
        }
        $lines = explode("\n", $this->ingredients);
        return array_filter(array_map('trim', $lines), fn($line) => !empty($line));
    }

    public function getInstructionsArrayAttribute(): array
    {
        if (empty($this->instructions)) {
            return [];
        }
        $lines = explode("\n", $this->instructions);
        return array_filter(array_map('trim', $lines), fn($line) => !empty($line));
    }

    public function getCategoryLabelAttribute(): string
    {
        return $this->category ? ucfirst($this->category) : 'Ayurvedic';
    }

    public function getShortDescriptionAttribute($length = 120): string
    {
        if (strlen($this->description) <= $length) {
            return $this->description;
        }
        return substr($this->description, 0, $length) . '...';
    }

    // ─── Helpers ───
    public function hasVideo(): bool
    {
        return $this->getHasVideoAttribute();
    }

    public function hasImage(): bool
    {
        return !empty($this->image);
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public static function getCategoryCounts(): array
    {
        return self::active()
            ->select('category', \DB::raw('count(*) as total'))
            ->groupBy('category')
            ->pluck('total', 'category')
            ->toArray();
    }
}