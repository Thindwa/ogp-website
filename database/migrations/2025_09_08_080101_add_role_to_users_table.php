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
        Schema::table('users', function (Blueprint $table) {
            $table->string('role')->default('twg_manager')->after('email');
            $table->foreignId('technical_working_group_id')->nullable()->constrained('technical_working_groups')->after('role');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['technical_working_group_id']);
            $table->dropColumn(['role', 'technical_working_group_id']);
        });
    }
};
