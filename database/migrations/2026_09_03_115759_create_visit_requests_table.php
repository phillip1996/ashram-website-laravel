<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('visit_requests', function (Blueprint $table) {
            $table->id();
            $table->string('visit_type'); // meditation, retreat
            $table->date('preferred_date');
            $table->string('preferred_time');
            $table->string('name');
            $table->string('email');
            $table->string('phone')->nullable();
            $table->integer('guests')->default(1);
            $table->text('special_requests')->nullable();
            $table->string('status')->default('pending'); // pending, confirmed, cancelled, completed
            $table->timestamp('confirmed_at')->nullable();
            $table->text('admin_notes')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('visit_requests');
    }
};