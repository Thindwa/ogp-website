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
        Schema::table('gallery_items', function (Blueprint $table) {
            $table->string('slug')->nullable()->after('title');
        });

        // Populate slugs for existing gallery items
        $galleryItems = \App\Models\GalleryItem::whereNull('slug')->get();
        foreach ($galleryItems as $item) {
            $item->slug = \Illuminate\Support\Str::slug($item->title);
            $item->save();
        }

        // Now make slug unique
        Schema::table('gallery_items', function (Blueprint $table) {
            $table->string('slug')->unique()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('gallery_items', function (Blueprint $table) {
            $table->dropColumn('slug');
        });
    }
};
