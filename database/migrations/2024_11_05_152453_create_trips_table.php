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
        Schema::create('trips', function (Blueprint $table) {
            $table->id();
            $table->json('origin');
            $table->json('destination');
            $table->decimal('price');
            $table->enum('status', ['waiting', 'on_going', 'completed']);
            $table->unsignedBigInteger('rider_id');
            $table->unsignedBigInteger('driver_id');
            $table->foreign('rider_id')->references('id')->on('users');
            $table->foreign('driver_id')->references('id')->on('users');
            $table->timestamp('duration');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trips');
    }
};
