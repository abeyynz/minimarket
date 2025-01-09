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
            $table->char('code', 8);
            $table->unsignedBigInteger('category_id');
            $table->string('name', 50);
            $table->string('unit',5);
            $table->integer('stock');
            $table->decimal('price', 10, 2);
            $table->string('image_url')->nullable();
            $table->timestamps();
            $table->unsignedBigInteger('store_id');

            $table->foreign('store_id')->references('id')->on('stores')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onUpdate('cascade')->onDelete('cascade');
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
