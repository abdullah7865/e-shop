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
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->string('brand')->nullable();
            $table->decimal('weight', 8, 2)->nullable();
            $table->enum('gender', ['Men', 'Women', 'Other'])->nullable();
            $table->json('sizes')->nullable();
            $table->json('colors')->nullable();
            $table->text('description')->nullable();
            $table->string('tag_number')->nullable();
            $table->integer('stock')->nullable();
            $table->json('tag')->nullable();
            $table->decimal('price', 10, 2)->nullable();
            $table->decimal('discount', 5, 2)->nullable();
            $table->decimal('tax', 5, 2)->nullable();
            $table->json('images')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
