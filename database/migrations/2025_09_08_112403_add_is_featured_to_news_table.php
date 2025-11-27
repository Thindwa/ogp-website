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
        // Check if table exists as 'events' or 'news'
        $tableName = Schema::hasTable('events') ? 'events' : 'news';
        Schema::table($tableName, function (Blueprint $table) {
            $table->boolean('is_featured')->default(false)->after('is_published');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Check if table exists as 'events' or 'news'
        $tableName = Schema::hasTable('events') ? 'events' : 'news';
        Schema::table($tableName, function (Blueprint $table) {
            $table->dropColumn('is_featured');
        });
    }
};
