<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TechnicalWorkingGroup extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'short_description',
        'icon',
        'color',
        'is_active',
        'sort_order',
        'contact_email',
        'contact_person',
        'objectives',
        'challenges',
        'interventions',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'objectives' => 'array',
        'challenges' => 'array',
        'interventions' => 'array',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('name');
    }

    public function news(): HasMany
    {
        return $this->hasMany(News::class);
    }

    public function achievements(): HasMany
    {
        return $this->hasMany(Achievement::class);
    }

    public function documents(): HasMany
    {
        return $this->hasMany(Document::class);
    }

    public function galleryItems(): HasMany
    {
        return $this->hasMany(GalleryItem::class);
    }

    public function highlights(): HasMany
    {
        return $this->hasMany(Highlight::class);
    }

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }
}
