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
        Schema::create('directory_listings', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('slug')->unique()->nullable();
            $table->longText('content')->nullable();
            $table->boolean('is_card_view_featured')->default(false);
            $table->string('card')->nullable()->comment('Card Image');
            $table->boolean('is_local_support_view_featured')->default(false);
            $table->string('local_support_image')->nullable();
            $table->text('excerpt')->nullable();
            $table->longText('address')->nullable();
            $table->string('video_url')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('directory_listings');
    }
};
