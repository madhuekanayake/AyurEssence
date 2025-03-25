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
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->string('doctorId')->unique(); // Unique Doctor ID
            $table->string('name')->nullable();// Doctor's Name
            $table->string('email')->unique(); // Doctor's Email
            $table->string('phoneNo')->nullable(); // Doctor's Phone Number
            $table->string('gender')->nullable();// Gender Dropdown
            $table->string('profilePicture')->nullable(); // Profile Picture Path
            $table->string('specializationId')->nullable(); // Specialization Dropdown
            $table->integer('yearsOfExperience')->nullable(); // Years of Experience
            $table->string('qualification')->nullable();// Qualification Dropdown
            $table->string('registerNo')->unique(); // Registration Number
            $table->string('workplaceName')->nullable(); // Workplace Name
            $table->string('availableDays')->nullable(); // Available Days Dropdown
            $table->time('consultationStartTime')->nullable(); // Consultation Start Time
            $table->time('consultationEndTime')->nullable(); // Consultation End Time
            $table->text('description')->nullable(); // Description
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctors');
    }
};
