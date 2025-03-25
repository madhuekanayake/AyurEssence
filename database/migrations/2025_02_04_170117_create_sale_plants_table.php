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
        Schema::create('sale_plants', function (Blueprint $table) {
            $table->id();
            $table->string('salePlantId')->unique();
            $table->string('plantname')->nullable();
            $table->string('plantCategoryId')->nullable();
            $table->string('scientificName')->nullable();
            $table->decimal('price')->nullable();
            $table->integer('stockQuantity')->nullable();
            $table->decimal('discount')->nullable();
            $table->decimal('finalPrice')->nullable();
            $table->string('plantingRequirements')->nullable();
            $table->string('maintenanceLevel')->nullable();
            $table->text('description')->nullable(); // Description
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sale_plants');
    }
};
