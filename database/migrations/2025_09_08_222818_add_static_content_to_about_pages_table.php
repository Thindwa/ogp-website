<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('about_pages', function (Blueprint $table) {
            // OGP Global section
            $table->string('ogp_global_title')->nullable();
            $table->string('ogp_global_subtitle')->nullable();
            $table->text('ogp_global_content')->nullable();
            $table->text('ogp_global_description')->nullable();
            $table->string('ogp_global_icon')->nullable();
            $table->string('ogp_global_image')->nullable();

            // Malawi Timeline section
            $table->string('malawi_timeline_title')->nullable();
            $table->string('malawi_timeline_subtitle')->nullable();
            $table->text('malawi_timeline_content')->nullable();
            $table->text('malawi_timeline_description')->nullable();
            $table->string('malawi_timeline_icon')->nullable();
            $table->json('malawi_timeline_data')->nullable();

            // Steering Committee section
            $table->string('steering_committee_title')->nullable();
            $table->string('steering_committee_subtitle')->nullable();
            $table->text('steering_committee_content')->nullable();
            $table->text('steering_committee_description')->nullable();
            $table->string('steering_committee_icon')->nullable();

            // Action Plan section
            $table->string('action_plan_title')->nullable();
            $table->string('action_plan_subtitle')->nullable();
            $table->text('action_plan_content')->nullable();
            $table->text('action_plan_description')->nullable();
            $table->string('action_plan_icon')->nullable();

            // Secretariat section
            $table->string('secretariat_title')->nullable();
            $table->string('secretariat_subtitle')->nullable();
            $table->text('secretariat_content')->nullable();
            $table->text('secretariat_description')->nullable();
            $table->string('secretariat_icon')->nullable();

            // Technical Working Groups section
            $table->string('technical_working_groups_title')->nullable();
            $table->string('technical_working_groups_subtitle')->nullable();
            $table->text('technical_working_groups_content')->nullable();
            $table->text('technical_working_groups_description')->nullable();
            $table->string('technical_working_groups_icon')->nullable();
            $table->json('technical_working_groups_list')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('about_pages', function (Blueprint $table) {
            $table->dropColumn([
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
            ]);
        });
    }
};
