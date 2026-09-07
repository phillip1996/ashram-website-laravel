<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ayurvedic_recipes', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('description');
            $table->text('ingredients'); // stored as JSON or plain text – we'll use text for simplicity
            $table->text('instructions');
            $table->string('image')->nullable();
            $table->string('video_url')->nullable();
            $table->string('category')->nullable(); // e.g. 'soup', 'tea', 'meal', 'tonic'
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ayurvedic_recipes');
    }
};