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
        Schema::create('plant_diseases', function (Blueprint $table) {
            $table->id();
            $table->string('diseasesId')->unique();
            $table->string('diseasesName')->nullable();
            $table->string('symptoms')->nullable();
            $table->string('impact')->nullable();
            $table->string('cause')->nullable();
            $table->string('treatment')->nullable();
            $table->string('plantsAffected')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plant_diseases');
    }
};
