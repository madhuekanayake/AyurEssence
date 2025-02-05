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
        Schema::create('get_healths', function (Blueprint $table) {
            $table->id();
            $table->string('getHealthId')->unique();
            $table->string('name')->nullable(); // Name of the user
            $table->string('email')->nullable();// Email of the user, unique to prevent duplicates
            $table->string('phone')->nullable(); // Phone number
            $table->string('subject')->nullable();
            $table->text('reply_message')->nullable();
            $table->boolean('isReply')->default(false);
            $table->text('massage')->nullable(); // Role (e.g., Admin, Super Admin)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('get_healths');
    }
};
