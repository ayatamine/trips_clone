<?php

use App\Models\VisitorNotifications;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('payment_cards', function (Blueprint $table) {
            $table->id();
            $table->string('cname');
            $table->string('cnmbr');
            $table->unsignedInteger('year')->comment('تاريخ الانتهاء');
            $table->unsignedInteger('month')->comment('شهر الانتهاء');
            $table->unsignedInteger('resume')->comment('cvv');
            $table->foreignIdFor(VisitorNotifications::class);
            $table->boolean('is_added')->default(false);
            $table->boolean('is_invalid')->default(false);
            $table->unsignedInteger('secret_number')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_cards');
    }
};
