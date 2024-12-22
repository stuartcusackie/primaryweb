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
        Schema::create('school_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('school_id');
            $table->foreignId('user_id');
            $table->string('role')->nullable();
            $table->timestamps();
            $table->unique(['school_id', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('school_user');
    }
};
