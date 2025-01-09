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
        Schema::create('conservation_awarenesses', function (Blueprint $table) {
            $table->id();
            $table->string('conservationAwarenessesId')->unique();
            $table->string('endangeredStatus')->nullable();
            $table->string('sustainableHarvesting')->nullable();
            $table->string('reforestationProjects')->nullable();
            $table->string('biodiversityImportance')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('conservation_awarenesses');
    }
};
