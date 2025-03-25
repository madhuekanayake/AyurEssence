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
        Schema::create('plants', function (Blueprint $table) {
            $table->id();
            $table->string('plantId')->unique();
            $table->string('plantname')->nullable();
            $table->string('plantCategoryId')->nullable();
            $table->string('medicalUses')->nullable();
            $table->string('scientificName')->nullable();
            $table->string('growthRequirements')->nullable();
            $table->string('geographicalDistribution')->nullable();
            $table->string('partUsed')->nullable();
            $table->string('traditionalUses')->nullable();
            $table->string('modernUses')->nullable();
            $table->string('toxicityInformation')->nullable();
            $table->string('availability')->nullable();
            $table->string('associatedDiseases')->nullable();
            $table->text('description')->nullable(); // Description
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plants');
    }
};
