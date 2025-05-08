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
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description')->nullable();

            $table->decimal('price', 10, 2);
            $table->decimal('discount_price', 10, 2)->nullable();

            $table->integer('stock')->default(0);
            $table->string('sku')->unique()->nullable();

            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('brand_id')->nullable();

            $table->string('image')->nullable(); // main product image
            $table->json('gallery_images')->nullable(); // additional images

            $table->json('attributes')->nullable(); // size, color, etc.
            $table->string('tags')->nullable(); // comma-separated tags

            $table->decimal('weight', 8, 2)->nullable();
            $table->string('dimensions')->nullable(); // optional dimension info

            $table->boolean('featured')->default(false);
            $table->boolean('status')->default(true); // active/inactive

            $table->unsignedBigInteger('vendor_id')->nullable(); // for multi-vendor apps

            $table->integer('view_count')->default(0);

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
