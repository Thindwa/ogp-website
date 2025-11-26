<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageSection extends Model
{
    protected $fillable = [
        'page',
        'section_key',
        'title',
        'content',
        'subtitle',
        'description',
        'icon',
        'image',
        'metadata',
        'is_active',
        'sort_order'
    ];

    protected $casts = [
        'metadata' => 'array',
        'is_active' => 'boolean',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeForPage($query, $page)
    {
        return $query->where('page', $page);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('created_at');
    }

    public static function getSection($page, $sectionKey)
    {
        return static::where('page', $page)
                    ->where('section_key', $sectionKey)
                    ->active()
                    ->first();
    }

    public static function getSections($page)
    {
        return static::where('page', $page)
                    ->active()
                    ->ordered()
                    ->get();
    }
}
