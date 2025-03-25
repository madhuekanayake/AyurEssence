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
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
    $table->unsignedBigInteger('product_id'); // Product added to the cart
    $table->integer('quantity')->default(1); // Quantity of the product
    $table->decimal('price', 8, 2); // Price of the product at the time of adding
    $table->string('image')->nullable(); // Image URL of the product
    $table->timestamps();

    // Foreign key
    $table->foreign('product_id')->references('id')->on('sale_plants')->onDelete('cascade');
        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};
