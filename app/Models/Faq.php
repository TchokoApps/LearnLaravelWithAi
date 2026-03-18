<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    protected $fillable = [
        'title',
        'description',
        'order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    // Scope to get active FAQs only
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    // Scope to get FAQs ordered by 'order' column
    public function scopeOrdered($query)
    {
        return $query->orderBy('order', 'asc');
    }
}
