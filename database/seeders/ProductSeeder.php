<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $product =[
            [
                'cid' => 1,
                'name' => 'Wireless Mechanical Keyboard',
                'barcode' => '8901234567011',
                'cost_price' => 45.00,
                'selling_price' => 89.99,
                'stock_quantity' => 120,
                'status' => 'active',
                
            ],
            [
                'cid' => 1,
                'name' => 'Ergonomic Vertical Mouse',
                'barcode' => '8901234567028',
                'cost_price' => 22.50,
                'selling_price' => 49.99,
                'stock_quantity' => 85,
                'status' => 'active',
                
            ],
            [
                'cid' => 2,
                'name' => 'Ultra-Wide 34-inch Monitor',
                'barcode' => '8901234567035',
                'cost_price' => 280.00,
                'selling_price' => 449.99,
                'stock_quantity' => 15,
                'status' => 'active',
                
            ],
            [
                'cid' => 2,
                'name' => 'USB-C Hub Multiport Adapter',
                'barcode' => '8901234567042',
                'cost_price' => 12.00,
                'selling_price' => 29.99,
                'stock_quantity' => 200,
                'status' => 'active',
                
            ],
            [
                'cid' => 3,
                'name' => 'Stainless Steel Water Bottle',
                'barcode' => '8901234567059',
                'cost_price' => 8.00,
                'selling_price' => 24.99,
                'stock_quantity' => 150,
                'status' => 'active',
                
            ],
            [
                'cid' => 3,
                'name' => 'Durable Camping Backpack',
                'barcode' => '8901234567066',
                'cost_price' => 35.00,
                'selling_price' => 79.99,
                'stock_quantity' => 40,
                'status' => 'pending',
                
            ],
            [
                'cid' => 4,
                'name' => 'LED Desk Lamp with Wireless Charger',
                'barcode' => '8901234567073',
                'cost_price' => 18.00,
                'selling_price' => 39.99,
                'stock_quantity' => 60,
                'status' => 'active',
                
            ],
            [
                'cid' => 4,
                'name' => 'Memory Foam Seat Cushion',
                'barcode' => '8901234567080',
                'cost_price' => 15.00,
                'selling_price' => 34.99,
                'stock_quantity' => 0,
                'status' => 'pending',
                
            ],
            [
                'cid' => 5,
                'name' => 'Noise-Canceling Bluetooth Headphones',
                'barcode' => '8901234567097',
                'cost_price' => 60.00,
                'selling_price' => 129.99,
                'stock_quantity' => 30,
                'status' => 'active',
                
            ],
            [
                'cid' => 5,
                'name' => 'Portable Power Bank 20000mAh',
                'barcode' => '8901234567103',
                'cost_price' => 25.00,
                'selling_price' => 59.99,
                'stock_quantity' => 95,
                'status' => 'active',
                
            ]
        ];
        
        foreach ($product as $product){
            Product::create($product);
        }
    }
}
