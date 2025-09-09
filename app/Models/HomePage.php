<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomePage extends Model
{
    protected $fillable = [
        'hero_title',
        'hero_subtitle',
        'hero_description',
        'hero_image',
        'about_title',
        'about_description',
        'about_image',
        'ogp_title',
        'ogp_description',
        'ogp_image',
        'mission_title',
        'mission_subtitle',
        'mission_content',
        'mission_description',
        'mission_icon',
        'vision_title',
        'vision_subtitle',
        'vision_content',
        'vision_description',
        'vision_icon',
        'who_is_ogp_title',
        'who_is_ogp_content',
        'who_is_ogp_description',
        'how_ogp_works_title',
        'how_ogp_works_content',
        'how_ogp_works_description',
        'malawi_ogp_title',
        'malawi_ogp_content',
        'malawi_ogp_description',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public static function getActive()
    {
        return static::where('is_active', true)->first() ?? new static();
    }
}
