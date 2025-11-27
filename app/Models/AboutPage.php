<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutPage extends Model
{
    protected $fillable = [
        'title',
        'subtitle',
        'description',
        'content',
        'mission',
        'vision',
        'values',
        'history',
        'team_description',
        'contact_info',
        'featured_image',
        'ogp_global_title',
        'ogp_global_subtitle',
        'ogp_global_content',
        'ogp_global_description',
        'ogp_global_icon',
        'ogp_global_image',
        'malawi_timeline_title',
        'malawi_timeline_subtitle',
        'malawi_timeline_content',
        'malawi_timeline_description',
        'malawi_timeline_icon',
        'malawi_timeline_data',
        'steering_committee_title',
        'steering_committee_subtitle',
        'steering_committee_content',
        'steering_committee_description',
        'steering_committee_icon',
        'action_plan_title',
        'action_plan_subtitle',
        'action_plan_content',
        'action_plan_description',
        'action_plan_icon',
        'secretariat_title',
        'secretariat_subtitle',
        'secretariat_content',
        'secretariat_description',
        'secretariat_icon',
        'technical_working_groups_title',
        'technical_working_groups_subtitle',
        'technical_working_groups_content',
        'technical_working_groups_description',
        'technical_working_groups_icon',
        'technical_working_groups_list',
        'steering_committee_membership',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'values' => 'array',
        'malawi_timeline_data' => 'array',
        'technical_working_groups_list' => 'array',
        'steering_committee_membership' => 'array',
    ];

    public static function getActive()
    {
        return static::where('is_active', true)->first() ?? new static();
    }
}
