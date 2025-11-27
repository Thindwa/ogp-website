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
        // Check if table exists as 'news' or 'events'
        $tableName = Schema::hasTable('events') ? 'events' : 'news';
        
        Schema::table($tableName, function (Blueprint $table) {
            $table->enum('status', ['draft', 'pending', 'published'])->default('draft')->after('is_published');
        });

        // Set existing published items to published status
        DB::table($tableName)->where('is_published', true)->update(['status' => 'published']);
        DB::table($tableName)->where('is_published', false)->update(['status' => 'draft']);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Check if table exists as 'news' or 'events'
        $tableName = Schema::hasTable('events') ? 'events' : 'news';
        
        Schema::table($tableName, function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
};
