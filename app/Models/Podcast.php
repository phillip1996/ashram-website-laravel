<?php

namespace App\Models;

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
}