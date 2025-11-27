<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FooterSettings extends Model
{
    protected $fillable = [
        'logo_image',
        'logo_alt',
        'organization_name',
        'description',
        'facebook_url',
        'twitter_url',
        'linkedin_url',
        'youtube_url',
        'address',
        'address_detail',
        'email',
        'phone',
        'website',
        'quick_links',
        'resource_links',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'quick_links' => 'array',
        'resource_links' => 'array',
    ];

    public static function getActive()
    {
        return static::where('is_active', true)->first() ?? new static();
    }
}
