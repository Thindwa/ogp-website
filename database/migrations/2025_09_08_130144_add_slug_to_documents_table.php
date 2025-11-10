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
        Schema::table('documents', function (Blueprint $table) {
            $table->string('slug')->nullable()->after('title');
        });

        // Populate slugs for existing documents
        $documents = \App\Models\Document::whereNull('slug')->get();
        foreach ($documents as $document) {
            $document->slug = \Illuminate\Support\Str::slug($document->title);
            $document->save();
        }

        // Now make slug unique
        Schema::table('documents', function (Blueprint $table) {
            $table->string('slug')->unique()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('documents', function (Blueprint $table) {
            $table->dropColumn('slug');
        });
    }
};
