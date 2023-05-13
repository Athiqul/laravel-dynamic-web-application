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
        Schema::create('footers', function (Blueprint $table) {
            $table->id();
            $table->string('contact_number')->nullable();
            $table->string('street_address')->nullable();
            $table->string('region')->nullable();
            $table->string('contact_email')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('youtube')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('tiktok')->nullable();
            $table->string('instagram')->nullable();
            $table->text('contact_us')->nullable();
            $table->text('social_connect')->nullable();
            $table->string('copyright')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('footers');
    }
};
