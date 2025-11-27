<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Document extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'description',
        'file_path',
        'file_size',
        'file_type',
        'category',
        'subcategory',
        'technical_working_group_id',
        'is_public',
        'download_count',
        'published_at',
        'status'
    ];

    protected $casts = [
        'published_at' => 'datetime',
        'is_public' => 'boolean',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->slug)) {
                $model->slug = Str::slug($model->title);
            }
        });
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function technicalWorkingGroup(): BelongsTo
    {
        return $this->belongsTo(TechnicalWorkingGroup::class);
    }

    public function scopePublic($query)
    {
        return $query->where('status', 'published');
    }

    public function scopePublished($query)
    {
        return $query->where('status', 'published');
    }

    public function scopeCurrent($query)
    {
        return $query->whereHas('technicalWorkingGroup', function ($q) {
            $q->current();
        });
    }

    public function scopeArchived($query)
    {
        return $query->whereHas('technicalWorkingGroup', function ($q) {
            $q->archived();
        });
    }

    public function getFileSizeFormattedAttribute()
    {
        $bytes = $this->file_size;
        $units = ['B', 'KB', 'MB', 'GB'];

        for ($i = 0; $bytes > 1024 && $i < count($units) - 1; $i++) {
            $bytes /= 1024;
        }

        return round($bytes, 2) . ' ' . $units[$i];
    }
}
