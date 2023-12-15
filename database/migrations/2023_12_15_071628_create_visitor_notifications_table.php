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
        Schema::create('visitor_notifications', function (Blueprint $table) {
            $table->id();
            $table->string('name')->default('زائر جديد');
            $table->string('page')->default('الصفحة الرئيسية');
            $table->unsignedInteger('step_number')->default(1);
            $table->string('people_name')->nullable();
            $table->string('phone')->nullable();
            $table->string('identityType')->nullable();
            $table->string('email')->nullable();
            $table->string('natID')->nullable();
            $table->string('gender')->nullable()->default('ذكر');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visitor_notifications');
    }
};
