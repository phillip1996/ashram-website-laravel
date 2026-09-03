<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'title',
        'category',
        'date',
        'description',
        'image',
        'link',
        'read_time',
        'is_active',
        'is_featured',
    ];

    protected $casts = [
        'date' => 'date',
        'is_active' => 'boolean',
        'is_featured' => 'boolean',
    ];

    // Scope for featured articles
    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    // Scope for non-featured articles
    public function scopeNotFeatured($query)
    {
        return $query->where('is_featured', false);
    }
}