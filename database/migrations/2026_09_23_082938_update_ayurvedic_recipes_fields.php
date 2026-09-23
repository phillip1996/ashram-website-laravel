<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('ayurvedic_recipes', function (Blueprint $table) {
            // Make ingredients and instructions optional
            $table->text('ingredients')->nullable()->change();
            $table->text('instructions')->nullable()->change();

            // Add video_file only if it doesn't already exist
            if (!Schema::hasColumn('ayurvedic_recipes', 'video_file')) {
                $table->string('video_file')->nullable()->after('image');
            }
        });
    }

    public function down(): void
    {
        Schema::table('ayurvedic_recipes', function (Blueprint $table) {
            $table->text('ingredients')->nullable(false)->change();
            $table->text('instructions')->nullable(false)->change();

            if (Schema::hasColumn('ayurvedic_recipes', 'video_file')) {
                $table->dropColumn('video_file');
            }
        });
    }
};