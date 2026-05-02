<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('menu_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('menu_id')->constrained()->cascadeOnDelete();
            $table->json('title')->nullable(); // Translatable
            $table->string('url')->nullable();
            $table->foreignId('page_id')->nullable()->constrained()->nullOnDelete();
            $table->text('icon_svg')->nullable(); // Raw SVG code
            $table->integer('order')->default(0);
            $table->string('target')->default('_self');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('menu_items');
    }
};
