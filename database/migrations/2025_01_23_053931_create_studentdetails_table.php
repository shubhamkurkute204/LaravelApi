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
        Schema::create('studentdetails', function (Blueprint $table) {
            $table->id();
            $table->string('first_name', 255);
            $table->string('middle_name', 255); // Nullable if middle name isn't mandatory
            $table->string('last_name', 255);
            $table->string('mobile_number', 15);
            $table->string('email', 255);
            $table->string('city', 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('studentdetails');
    }
};
