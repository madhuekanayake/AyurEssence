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
        Schema::create('meeting_and_events', function (Blueprint $table) {
            $table->id();
            $table->string('meetingAndEventlId')->unique();
            $table->string('title')->nullable(); // Hospital Name
            $table->string('content')->nullable(); // Address
            $table->date('startDate')->unique(); // Email
            $table->date('endDate')->nullable(); // Phone Number
            $table->time('startTime')->nullable(); // Location
            $table->time('endTime')->nullable();// Opening Time
            $table->string('contactNo')->nullable(); // Closing Time
            $table->text('description')->nullable(); // Description
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meeting_and_events');
    }
};
