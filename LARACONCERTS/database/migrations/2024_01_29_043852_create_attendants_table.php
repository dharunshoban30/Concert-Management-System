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
        Schema::create('attendants', function (Blueprint $table) {
            $table->id();
            $table->string('concert_name');
            $table->string('full_name');
            $table->string('email')->unique(); // Assuming email should be unique
            $table->string('contact_no')->nullable(); // Allowing contact number to be nullable
            $table->text('address');
            $table->timestamps();

            // Define composite foreign key constraint
            // $table->foreign(['listing_id', 'concert_name'])->references(['id', 'title'])->on('listings')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendants');
    }
};