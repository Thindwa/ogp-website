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
        Schema::table('home_pages', function (Blueprint $table) {
            // Mission & Vision sections
            $table->string('mission_title')->nullable();
            $table->string('mission_subtitle')->nullable();
            $table->text('mission_content')->nullable();
            $table->text('mission_description')->nullable();
            $table->string('mission_icon')->nullable();

            $table->string('vision_title')->nullable();
            $table->string('vision_subtitle')->nullable();
            $table->text('vision_content')->nullable();
            $table->text('vision_description')->nullable();
            $table->string('vision_icon')->nullable();

            // Who is in OGP section
            $table->string('who_is_ogp_title')->nullable();
            $table->text('who_is_ogp_content')->nullable();
            $table->text('who_is_ogp_description')->nullable();

            // How OGP Works section
            $table->string('how_ogp_works_title')->nullable();
            $table->text('how_ogp_works_content')->nullable();
            $table->text('how_ogp_works_description')->nullable();

            // When Did Malawi Join OGP section
            $table->string('malawi_ogp_title')->nullable();
            $table->text('malawi_ogp_content')->nullable();
            $table->text('malawi_ogp_description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('home_pages', function (Blueprint $table) {
            $table->dropColumn([
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
            ]);
        });
    }
};
