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
        Schema::create('local_pharmacies', function (Blueprint $table) {
            $table->id();
            $table->string('localPharmacyId')->unique();
            $table->string('name')->nullable(); // Hospital Name
            $table->string('address')->nullable(); // Address
            $table->string('email')->unique(); // Email
            $table->string('phoneNo')->nullable(); // Phone Number
            $table->string('location')->nullable(); // Location
            $table->time('openTime')->nullable();// Opening Time
            $table->time('closeTime')->nullable(); // Closing Time
            $table->string('openDays')->nullable(); // Open Days
            $table->text('description')->nullable(); // Description
            $table->decimal('latitude', 10, 7)->nullable();
            $table->decimal('longitude', 10, 7)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('local_pharmacies');
    }
};
