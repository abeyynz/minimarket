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
            $table->char('code', 6)->primary(); // Primary key
            $table->foreignId('category_id')->constrained()->onDelete('cascade'); // Foreign key
            $table->string('name');
            $table->decimal('price', 10, 2);
            $table->char('unit', 10);
            $table->string('image_url')->nullable(); 
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
