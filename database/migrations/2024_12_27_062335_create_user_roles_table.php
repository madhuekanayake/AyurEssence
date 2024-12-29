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
        Schema::create('user_roles', function (Blueprint $table) {
            $table->id();
            $table->string('userRoleId')->unique();
            $table->string('name')->nullable(); // Name of the user
            $table->string('email')->nullable();// Email of the user, unique to prevent duplicates
            $table->string('phone')->nullable(); // Phone number
            $table->string('role')->nullable(); // Role (e.g., Admin, Super Admin)
            $table->boolean('status')->default(1);
            $table->string('password')->nullable();


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_roles');
    }
};
