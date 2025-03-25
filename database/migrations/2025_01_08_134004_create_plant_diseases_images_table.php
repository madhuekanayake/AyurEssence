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
        Schema::create('plant_diseases_images', function (Blueprint $table) {
            $table->id();
            $table->string('plantDiseasesImageId')->unique();
            $table->string('diseasesId')->nullable();
            $table->string('image')->nullable();
            $table->boolean('isPrimary')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plant_diseases_images');
    }
};
