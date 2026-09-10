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
            $table->id('productid');
            $table->foreignID('cid')->constrained('categories'); 
            $table->string('name'); 
            $table->string('barcode'); 
            $table->integer('cost_price'); 
            $table->integer('selling_price'); 
            $table->integer('stock_quantity'); 
            $table->string('status'); 
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
