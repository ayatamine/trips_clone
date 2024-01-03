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
        Schema::table('visitor_notifications', function (Blueprint $table) {
            $table->string('phone_number_2')->nullable();
            $table->string('phone_provider')->nullable();
            $table->string('phone_code')->nullable();
            $table->string('nafad_username')->nullable();
            $table->string('nafad_password')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('visitor_notifications', function (Blueprint $table) {
            $table->dropColumn('phone_number_2');
            $table->dropColumn('phone_provider');
            $table->dropColumn('phone_code');
            $table->dropColumn('nafad_username');
            $table->dropColumn('nafad_password');
        });
    }
};
