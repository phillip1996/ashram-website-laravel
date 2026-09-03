<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('podcasts', function (Blueprint $table) {
            $table->string('speaker_avatar')->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('podcasts', function (Blueprint $table) {
            $table->string('speaker_avatar')->nullable(false)->change();
        });
    }
};