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
        Schema::table('technical_working_groups', function (Blueprint $table) {
            $table->string('featured_image')->nullable()->after('icon');
            $table->json('issues')->nullable()->after('interventions');
            $table->json('commitments')->nullable()->after('issues');
            $table->text('co_chairs')->nullable()->after('contact_person');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('technical_working_groups', function (Blueprint $table) {
            $table->dropColumn(['featured_image', 'issues', 'commitments', 'co_chairs']);
        });
    }
};
