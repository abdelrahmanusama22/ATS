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
            $table->json('title');
            $table->json('description');
            $table->json('requirements')->nullable();
            $table->json('location')->nullable();
            $table->string('salary')->nullable();
            $table->string('type')->nullable(); // e.g. Full-time, Part-time
            $table->date('closing_date')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('careers');
    }
};
