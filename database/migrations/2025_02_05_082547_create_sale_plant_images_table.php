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
        Schema::create('sale_plant_images', function (Blueprint $table) {
            $table->id();
            $table->string('saleplantImageId')->unique();
            $table->string('salePlantId')->nullable();
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
        Schema::dropIfExists('sale_plant_images');
    }
};
