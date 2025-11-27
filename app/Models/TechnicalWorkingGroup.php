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
        'start_date',
        'end_date',
        'sort_order',
        'contact_email',
        'contact_person',
        'co_chairs',
        'objectives',
        'challenges',
        'interventions',
        'issues',
        'commitments',
        'featured_image',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'start_date' => 'date',
        'end_date' => 'date',
        'objectives' => 'array',
        'challenges' => 'array',
        'interventions' => 'array',
        'issues' => 'array',
        'commitments' => 'array',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('name');
    }

    public function scopeCurrent($query)
    {
        $now = now();
        return $query->where('is_active', true) // Must be active
            ->where(function ($q) use ($now) {
                $q->whereNull('end_date')
                  ->orWhere('end_date', '>=', $now);
            })->where(function ($q) use ($now) {
                $q->whereNull('start_date')
                  ->orWhere('start_date', '<=', $now);
            });
    }

    public function scopeArchived($query)
    {
        $now = now();
        return $query->where(function ($q) use ($now) {
            // Archive if end_date is in the past OR if is_active is false
            $q->where(function ($subQ) use ($now) {
                $subQ->whereNotNull('end_date')
                     ->where('end_date', '<', $now);
            })->orWhere('is_active', false);
        });
    }

    public function getIsCurrentAttribute()
    {
        $now = now();
        $startValid = $this->start_date === null || $this->start_date <= $now;
        $endValid = $this->end_date === null || $this->end_date >= $now;
        return $startValid && $endValid;
    }

    public function getIsArchivedAttribute()
    {
        // Archived if end_date is in the past OR if is_active is false
        return ($this->end_date !== null && $this->end_date < now()) || !$this->is_active;
    }

    public function getDateRangeAttribute()
    {
        if (!$this->start_date && !$this->end_date) {
            return null;
        }

        $start = $this->start_date ? $this->start_date->format('Y') : '?';
        $end = $this->end_date ? $this->end_date->format('Y') : 'Present';

        return "{$start}–{$end}";
    }

    public function events(): HasMany
    {
        return $this->hasMany(Event::class);
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
