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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('studentId')->unique();
            $table->string('name')->nullable();
            $table->integer('age')->nullable();// Student's age
            $table->string('grade')->nullable();// Grade/class of the student
            $table->string('email')->nullable(); // Email address
            $table->string('phone')->nullable(); // Phone number
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
