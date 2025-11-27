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
        Schema::table('about_pages', function (Blueprint $table) {
            $table->dropColumn([
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
