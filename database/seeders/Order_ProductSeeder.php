<?php

namespace Database\Seeders;

use App\Models\Order_Product;
use Illuminate\Database\Seeder;

class Order_ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $orderProducts = [
            ['order_id' => 1, 'product_id' => 1, 'quantity' => 2, 'unit_price' => 2, 'discount' => 0, 'amount' => 4],
            ['order_id' => 2, 'product_id' => 3, 'quantity' => 3, 'unit_price' => 3, 'discount' => 0, 'amount' => 9],
            ['order_id' => 3, 'product_id' => 5, 'quantity' => 1, 'unit_price' => 4, 'discount' => 0, 'amount' => 4],
            ['order_id' => 4, 'product_id' => 9, 'quantity' => 2, 'unit_price' => 2, 'discount' => 0, 'amount' => 4],
            ['order_id' => 5, 'product_id' => 2, 'quantity' => 2, 'unit_price' => 3, 'discount' => 0, 'amount' => 6],
            ['order_id' => 6, 'product_id' => 10, 'quantity' => 3, 'unit_price' => 5, 'discount' => 0, 'amount' => 15],
            ['order_id' => 7, 'product_id' => 4, 'quantity' => 1, 'unit_price' => 2, 'discount' => 0, 'amount' => 2],
            ['order_id' => 8, 'product_id' => 3, 'quantity' => 1, 'unit_price' => 3, 'discount' => 0, 'amount' => 3],
            ['order_id' => 9, 'product_id' => 7, 'quantity' => 2, 'unit_price' => 2, 'discount' => 0, 'amount' => 4],
            ['order_id' => 10, 'product_id' => 1, 'quantity' => 1, 'unit_price' => 2, 'discount' => 0, 'amount' => 2],
        ];

        foreach ($orderProducts as $orderProduct) {
            Order_Product::create($orderProduct);
        }
    }
}
