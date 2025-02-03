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
        Schema::create('herbal_gardens', function (Blueprint $table) {
            $table->id();
            $table->string('gardenId')->unique();
            $table->string('gardenName');
            $table->string('gardenAddress');
            $table->string('gardenPhone');
            $table->string('gardenEmail')->unique();
            $table->text('gardenLocation');
            $table->time('gardenOpenTime');  // Changed from date to time
            $table->time('gardenCloseTime'); // Changed from date to time
            $table->string('gardenOpenDays');
            $table->decimal('latitude', 10, 7)->nullable();
            $table->decimal('longitude', 10, 7)->nullable();
            $table->decimal('localTicketPrice', 10, 2);
            $table->decimal('foreignTicketPrice', 10, 2);
            $table->text('gardenDescription'); // Changed to text for longer content

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('herbal_gardens');
    }
};
