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
            $table->string('category')->nullable();
            $table->string('brand')->nullable();
            $table->text('description')->nullable();

            $table->decimal('price', 10, 2);
            $table->decimal('discount_price', 10, 2)->nullable();

            $table->integer('stock')->default(0);


            $table->string('storage')->nullable(); // main product image
            $table->string('ram')->nullable(); // main product image
            $table->string('screen_size')->nullable(); // main product image
            $table->string('cpu')->nullable(); // main product image
            $table->string('os')->nullable(); // main product image
            $table->string('image')->nullable(); // main product image
            $table->string('img1')->nullable(); // main product image
            $table->string('img2')->nullable(); // main product image
            $table->string('img3')->nullable(); // main product image
            $table->string('tags')->nullable(); // comma-separated tags
            $table->boolean('featured')->default(false);
            $table->boolean('status')->default(true); // active/inactive

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
