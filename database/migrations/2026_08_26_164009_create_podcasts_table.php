<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('podcasts', function (Blueprint $table) {
            $table->id();
            $table->string('episode');
            $table->string('title');
            $table->text('description');
            $table->date('date');
            $table->string('duration');
            $table->integer('duration_seconds');
            $table->string('category');
            $table->string('thumbnail');
            $table->string('audio')->nullable();
            $table->integer('listens')->default(0);
            $table->boolean('bookmarked')->default(false);
            $table->string('speaker_name');
            $table->string('speaker_role');
            $table->string('speaker_avatar');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('podcasts');
    }
};