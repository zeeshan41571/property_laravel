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
        Schema::create('guests_info', function (Blueprint $table) {
            $table->id();
            $table->string('guest_name');
            $table->string('guest_surname');
            $table->string('guest_email');
            $table->string('guest_phone')->nullable();
            $table->string('guest_street')->nullable();
            $table->string('guest_street1')->nullable();
            $table->string('guest_street2')->nullable();
            $table->string('guest_postal')->nullable();
            $table->string('guest_city');
            $table->string('guest_country');
            $table->string('document_type');
            $table->string('document_number');
            $table->string('document_image1');
            $table->string('document_image2')->nullable();
            $table->foreignId('property_bookings_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guests_info');
    }
};
