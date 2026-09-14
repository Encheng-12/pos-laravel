<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Order_Product;


class Order_ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $order_products=[
            [
                'order_id' => 1,
                'product_id' => 1,
                'quantity' => 2,
                'unit_price' => '89.99',
                'discount' => 5000,
                'amount' => 174.98,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'order_id' => 2,
                'product_id' => 3,
                'quantity' => 1,
                'unit_price' => '449.99',
                'discount' => 0,
                'amount' => 449.99,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'order_id' => 3,
                'product_id' => 5,
                'quantity' => 3,
                'unit_price' => '24.99',
                'discount' => 2000,
                'amount' => 72.97,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'order_id' => 4,
                'product_id' => 9,
                'quantity' => 2,
                'unit_price' => '129.99',
                'discount' => 10000,
                'amount' => 249.98,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'order_id' => 5,
                'product_id' => 2,
                'quantity' => 2,
                'unit_price' => '49.99',
                'discount' => 5000,
                'amount' => 94.98,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'order_id' => 6,
                'product_id' => 10,
                'quantity' => 3,
                'unit_price' => '59.99',
                'discount' => 15000,
                'amount' => 164.97,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'order_id' => 7,
                'product_id' => 4,
                'quantity' => 1,
                'unit_price' => '29.99',
                'discount' => 0,
                'amount' => 29.99,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'order_id' => 8,
                'product_id' => 3,
                'quantity' => 1,
                'unit_price' => '449.99',
                'discount' => 20000,
                'amount' => 429.99,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'order_id' => 9,
                'product_id' => 7,
                'quantity' => 2,
                'unit_price' => '39.99',
                'discount' => 5000,
                'amount' => 74.98,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'order_id' => 10,
                'product_id' => 1,
                'quantity' => 1,
                'unit_price' => '89.99',
                'discount' => 10000,
                'amount' => 79.99,
                'created_at' => now(),
                'updated_at' => now(),
            ],];
            foreach ($order_products as $order_product){
            Order_Product::create($order_product);
        }
    }
}
