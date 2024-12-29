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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('logo')->nullable(); // Logo file path
            $table->string('websiteName')->unique(); // Unique website name
            $table->string('email')->nullable(); // Unique email address
            $table->string('contactNo1', 15)->nullable();// Primary contact number
            $table->string('contactNo2', 15)->nullable(); // Secondary contact number (optional)
            $table->string('addressLine1')->nullable();// First address line
            $table->string('addressLine2')->nullable(); // Second address line (optional)
            $table->string('city')->nullable(); // City
            $table->string('whatsappLink')->nullable(); // WhatsApp link
            $table->string('instagramLink')->nullable(); // Instagram link
            $table->string('facebookLink')->nullable(); // Facebook link
            $table->string('linkedinLink')->nullable(); // LinkedIn link
            $table->string('twitterLink')->nullable(); // Twitter link
            $table->boolean('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
