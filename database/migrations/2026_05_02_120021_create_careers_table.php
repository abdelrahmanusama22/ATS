<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('careers', function (Blueprint $table) {
            $table->id();
            $table->json('title')->nullable(); // Translatable
            $table->string('location');
            $table->string('type'); // full-time, part-time, contract, etc.
            $table->string('salary')->nullable();
            $table->json('description')->nullable(); // Translatable Rich Text
            $table->json('requirements')->nullable(); // JSON array
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('careers');
    }
};
