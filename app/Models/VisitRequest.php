<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisitRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'visit_type',
        'preferred_date',
        'preferred_time',
        'name',
        'email',
        'phone',
        'guests',
        'special_requests',
        'status',
        'confirmed_at',
        'admin_notes',
    ];

    protected $casts = [
        'preferred_date' => 'date',
        'confirmed_at' => 'datetime',
        'guests' => 'integer',
    ];

    public function getStatusBadgeAttribute()
    {
        return match($this->status) {
            'pending' => 'bg-amber-100 text-amber-700',
            'confirmed' => 'bg-emerald-100 text-emerald-700',
            'cancelled' => 'bg-red-100 text-red-700',
            'completed' => 'bg-blue-100 text-blue-700',
            default => 'bg-slate-100 text-slate-700',
        };
    }

    public function getStatusLabelAttribute()
    {
        return match($this->status) {
            'pending' => 'Pending',
            'confirmed' => 'Confirmed',
            'cancelled' => 'Cancelled',
            'completed' => 'Completed',
            default => ucfirst($this->status),
        };
    }
}