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
            $table->dropForeign(['technical_working_group_id']);
        });

        Schema::table('gallery_items', function (Blueprint $table) {
            $table->unsignedBigInteger('technical_working_group_id')->nullable()->change();
        });

        Schema::table('gallery_items', function (Blueprint $table) {
            $table->foreign('technical_working_group_id')->references('id')->on('technical_working_groups')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('gallery_items', function (Blueprint $table) {
            $table->dropForeign(['technical_working_group_id']);
        });

        Schema::table('gallery_items', function (Blueprint $table) {
            $table->unsignedBigInteger('technical_working_group_id')->nullable(false)->change();
        });

        Schema::table('gallery_items', function (Blueprint $table) {
            $table->foreign('technical_working_group_id')->references('id')->on('technical_working_groups')->onDelete('cascade');
        });
    }
};
