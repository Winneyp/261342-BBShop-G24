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
        Schema::create('User_address', function (Blueprint $table) {
            $table->id('address_id'); // Primary key
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Foreign key to users table
            $table->string('address_line1'); // Address line 1
            $table->string('address_line2')->nullable(); // Address line 2
            $table->string('subdistrict'); // Subdistrict
            $table->string('district'); // District
            $table->string('province'); // Province
            $table->string('postalcode'); // Postal Code
            $table->timestamps(); // Created at and updated at timestamps
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('User_address');
    }
};
