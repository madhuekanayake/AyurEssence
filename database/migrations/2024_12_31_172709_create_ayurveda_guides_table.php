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
        Schema::create('ayurveda_guides', function (Blueprint $table) {
            $table->id();
            $table->string('ayurvedaGuideId')->unique();
            $table->string('title')->nullable(); // Hospital Name
            $table->string('information')->nullable(); // Address
            $table->string('image')->nullable();
            $table->string('description')->nullable(); // Email
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ayurveda_guides');
    }
};
