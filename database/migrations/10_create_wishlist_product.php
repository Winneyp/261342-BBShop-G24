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
        Schema::create('wishlist_product', function (Blueprint $table) {
            $table->id('wishlist_product_id');
            $table->unsignedBigInteger('wishlist_id');
            $table->foreign('wishlist_id')->references('wishlist_id')->on('Wishlist');
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('product_id')->on('Product');
            $table->timestamps();
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wishlist_product');
    }
};
