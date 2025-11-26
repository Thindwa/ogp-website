<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Achievement extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'description',
        'submitted_year',
        'policy_area',
        'status',
        'technical_working_group_id',
        'featured_image',
        'documents',
        'progress_percentage',
        'completion_date',
        'is_featured'
    ];

    protected $casts = [
        'documents' => 'array',
        'completion_date' => 'date',
        'is_featured' => 'boolean',
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

    public function technicalWorkingGroup(): BelongsTo
    {
        return $this->belongsTo(TechnicalWorkingGroup::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }
}
