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
            $table->enum('type',['local','international'])->default('local');
            $table->string('from');
            $table->string('to');
            $table->enum('direction_type',['one_direction','go_and_back'])->default('one_direction');
            $table->date('departure_date');
            $table->date('return_date')->nullable();
            $table->time('departure_time');
            $table->integer('adults_count')->default(0);
            $table->integer('child_count')->default(0);
            $table->integer('infant_count')->default(0);
            $table->integer('special_needs_count')->default(0);
            $table->enum('ticket_type',['economic','premium']);
            $table->double('price')->default(0.0);
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
