<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    protected $fillable = [
        'name',
        'logo',
        'location',
        'website',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}