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
        Schema::create('achievements', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('description');
            $table->string('submitted_year');
            $table->string('policy_area');
            $table->string('status')->default('in_progress');
            $table->foreignId('technical_working_group_id')->constrained()->onDelete('cascade');
            $table->string('featured_image')->nullable();
            $table->json('documents')->nullable();
            $table->integer('progress_percentage')->default(0);
            $table->date('completion_date')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('achievements');
    }
};
