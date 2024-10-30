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
        Schema::create('Product', function (Blueprint $table) {
            $table->id('product_id');
            $table->unsignedBigInteger('cat_id');
            $table->foreign('cat_id')->references('catagory_id')->on('Product_catagory')->onDelete('cascade');
            $table->string('price');
            $table->string('size');
            $table->string('color');
            $table->string('picture');
            $table->string('description');
            $table->integer('stock_quantity');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Product');
    }
};
