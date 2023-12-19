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
        Schema::create('bus_rents', function (Blueprint $table) {
            $table->id();
            $table->enum('category',['peoples','company'])->default('peoples');
            $table->string('busType');
            $table->string('offec')->nullable()->comment('مكتب الخدمة');
            $table->unsignedInteger('perosns')->default(1);
            $table->date('serviceDate');
            $table->time('servicedeparture_time');
            $table->string('from');
            $table->string('to');
            $table->string('city');
            $table->string('email')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bus_rents');
    }
};
