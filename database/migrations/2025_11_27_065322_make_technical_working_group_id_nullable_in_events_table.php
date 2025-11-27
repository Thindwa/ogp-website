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
        // Drop foreign key using the old name from when table was 'news'
        \DB::statement('ALTER TABLE `events` DROP FOREIGN KEY `news_technical_working_group_id_foreign`');

        Schema::table('events', function (Blueprint $table) {
            $table->unsignedBigInteger('technical_working_group_id')->nullable()->change();
        });

        Schema::table('events', function (Blueprint $table) {
            $table->foreign('technical_working_group_id')->references('id')->on('technical_working_groups')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('events', function (Blueprint $table) {
            $table->dropForeign(['technical_working_group_id']);
        });

        Schema::table('events', function (Blueprint $table) {
            $table->unsignedBigInteger('technical_working_group_id')->nullable(false)->change();
        });

        Schema::table('events', function (Blueprint $table) {
            $table->foreign('technical_working_group_id')->references('id')->on('technical_working_groups')->onDelete('cascade');
        });
    }
};
