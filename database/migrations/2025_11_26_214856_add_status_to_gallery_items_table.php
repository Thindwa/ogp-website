<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('gallery_items', function (Blueprint $table) {
            $table->enum('status', ['draft', 'pending', 'published'])->default('draft')->after('is_active');
        });

        // Set existing active items to published status
        DB::table('gallery_items')->where('is_active', true)->update(['status' => 'published']);
        DB::table('gallery_items')->where('is_active', false)->update(['status' => 'draft']);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('gallery_items', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
};
