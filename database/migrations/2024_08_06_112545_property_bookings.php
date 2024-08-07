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
        Schema::create('property_bookings', function (Blueprint $table) {
            $table->id();
            $table->string('arrival_date');
            $table->string('arrival_time');
            $table->string('departure_date')->nullable();
            $table->string('departure_time')->nullable();
            $table->string('guest_edit_link')->nullable();
            $table->string('guest_edit_link_status')->nullable();
            $table->string('owner_edit_link')->nullable();
            $table->string('owner_edit_link_status')->nullable();
            $table->string('instructions')->nullable();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('property_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('property_bookings');
    }
};
