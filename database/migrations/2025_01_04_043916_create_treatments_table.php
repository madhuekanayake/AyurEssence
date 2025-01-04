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
        Schema::create('treatments', function (Blueprint $table) {
            $table->id();
            $table->string('treatmentId')->unique(); // Unique treatment identifier
            $table->string('name'); // Name of the treatment (e.g., "Panchakarma")
            $table->string('description')->nullable(); // Detailed description of the treatment
            $table->string('content')->nullable(); // Content of the treatment
            $table->string('ingredients')->nullable(); // List of ingredients used
            $table->string('benefits')->nullable(); // List of benefits
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('treatments');
    }
};
