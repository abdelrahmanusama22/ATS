<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->json('title')->nullable(); // Translatable
            $table->json('description')->nullable(); // Translatable Rich Text
            $table->json('seo_title')->nullable(); // Translatable
            $table->json('seo_description')->nullable(); // Translatable
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
