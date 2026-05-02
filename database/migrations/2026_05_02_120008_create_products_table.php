<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained()->cascadeOnDelete();
            $table->string('sku')->unique();
            $table->json('name')->nullable(); // Translatable
            $table->json('description')->nullable(); // Translatable Rich Text
            $table->decimal('price', 10, 2);
            $table->decimal('sale_price', 10, 2)->nullable();
            $table->string('brand')->nullable();
            $table->integer('stock')->default(0);
            $table->json('stock_status')->nullable(); // JSON
            $table->json('features_list')->nullable(); // JSON array
            $table->json('specifications')->nullable(); // JSON key-value
            $table->json('seo_title')->nullable(); // Translatable
            $table->json('seo_description')->nullable(); // Translatable
            $table->unsignedInteger('views_count')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
