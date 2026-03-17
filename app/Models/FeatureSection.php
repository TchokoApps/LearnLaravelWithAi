<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeatureSection extends Model
{
    protected $fillable = [
        'section_title',
        'feature_title',
        'feature_description',
        'feature_icon',
        'display_order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'display_order' => 'integer',
    ];

    /**
     * Scope to get active features ordered by display order
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true)->orderBy('display_order');
    }
}
