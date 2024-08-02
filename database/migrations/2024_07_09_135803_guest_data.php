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
        Schema::create('guest_data', function (Blueprint $table) {
            $table->id();
            $table->json('guestData');
            $table->string('guestName');
            $table->string('guestSurName');
            $table->string('guestEmail');
            $table->string('guestPhone');
            $table->string('guestStreet');
            $table->string('guestStreet1')->nullable();
            $table->string('guestStreet2')->nullable();
            $table->string('guestPostal')->nullable();
            $table->string('guestCity');
            $table->string('guestCountry');
            $table->string('urlLink');
            $table->string('ownerUrlLink');
            $table->string('instrction1')->nullable();
            $table->string('instrction_input1')->nullable();
            $table->string('instrction2')->nullable();
            $table->string('instrction_input2')->nullable();
            $table->string('instrction3')->nullable();
            $table->string('instrction_input3')->nullable();
            $table->string('instrction4')->nullable();
            $table->string('instrction_input4')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guest_data');
    }
};
