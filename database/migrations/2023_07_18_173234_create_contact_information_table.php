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
        Schema::create('contact_information', function (Blueprint $table) {
            $table->id();
            $table->foreignId('directory_listing_id')->nullable()->constrained()->cascadeOnDelete();
            $table->boolean('hide_contact')->default(false);
            $table->string('zip_code',10)->nullable();
            $table->longText('fax')->nullable();
            $table->string('email')->nullable();
            $table->string('website')->nullable();
            $table->text('excerpt')->nullable();
            $table->longText('content')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_information');
    }
};
