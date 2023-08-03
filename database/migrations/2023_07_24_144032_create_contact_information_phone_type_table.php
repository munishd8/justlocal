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
        Schema::create('contact_information_phone_type', function (Blueprint $table) {
            $table->foreignId('contact_information_id')->constrained('contact_information')->cascadeOnDelete();
            $table->string('phone_number',30)->nullable();
            $table->foreignId('phone_type_id')->constrained('phone_types')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_information_phone_type');
    }
};
