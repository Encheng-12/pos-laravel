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
        Schema::create('orders', function (Blueprint $table) {
            $table->id('oid');
            $table->foreignID('paymentid')->constrained('payments');
            $table->foreignID('cashierid')->constrained('users');
            $table->foreignID('customerid')->constrained('users');
            $table->integer('invoice_no');
            $table->integer('subtotal');
            $table->integer('tax');
            $table->integer('discount');
            $table->integer('statust')->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
