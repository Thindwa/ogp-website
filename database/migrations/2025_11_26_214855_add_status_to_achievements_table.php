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
        Schema::table('achievements', function (Blueprint $table) {
            // Check if status column already exists (it might be used for something else)
            if (!Schema::hasColumn('achievements', 'status')) {
                $table->enum('status', ['draft', 'pending', 'published'])->default('draft')->after('is_featured');
            } else {
                // If status exists, drop and recreate as enum
                $table->dropColumn('status');
                $table->enum('status', ['draft', 'pending', 'published'])->default('draft')->after('is_featured');
            }
        });

        // Set all existing achievements to published (assuming they were visible before)
        DB::table('achievements')->update(['status' => 'published']);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('achievements', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
};
