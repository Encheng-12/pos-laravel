<?php

namespace Database\Seeders;

use App\Models\Stockmovement;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StockMovementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $stockMovements = [
            [
                'product_id' => 1,
                'type' => 'in',
                'quantity' => 100,
                'reference' => 'PUR-0001',
                'notes' => 'Initial stock purchase',
            ],
            [
                'product_id' => 2,
                'type' => 'in',
                'quantity' => 80,
                'reference' => 'PUR-0002',
                'notes' => 'New mouse stock received',
            ],
            [
                'product_id' => 3,
                'type' => 'in',
                'quantity' => 20,
                'reference' => 'PUR-0003',
                'notes' => 'Monitor stock received from supplier',
            ],
            [
                'product_id' => 4,
                'type' => 'in',
                'quantity' => 150,
                'reference' => 'PUR-0004',
                'notes' => 'USB-C hub stock received',
            ],
            [
                'product_id' => 5,
                'type' => 'in',
                'quantity' => 100,
                'reference' => 'PUR-0005',
                'notes' => 'Water bottle stock received',
            ],
            [
                'product_id' => 6,
                'type' => 'in',
                'quantity' => 50,
                'reference' => 'PUR-0006',
                'notes' => 'Camping backpack stock received',
            ],
            [
                'product_id' => 7,
                'type' => 'in',
                'quantity' => 70,
                'reference' => 'PUR-0007',
                'notes' => 'Desk lamp stock received',
            ],
            [
                'product_id' => 8,
                'type' => 'in',
                'quantity' => 30,
                'reference' => 'PUR-0008',
                'notes' => 'Seat cushion stock received',
            ],
            [
                'product_id' => 9,
                'type' => 'in',
                'quantity' => 40,
                'reference' => 'PUR-0009',
                'notes' => 'Headphones stock received',
            ],
            [
                'product_id' => 10,
                'type' => 'in',
                'quantity' => 100,
                'reference' => 'PUR-0010',
                'notes' => 'Power bank stock received',
            ],

            // Stock going out
            [
                'product_id' => 1,
                'type' => 'out',
                'quantity' => 5,
                'reference' => 'ORD-0001',
                'notes' => 'Sold to customer',
            ],
            [
                'product_id' => 2,
                'type' => 'out',
                'quantity' => 3,
                'reference' => 'ORD-0002',
                'notes' => 'Sold to customer',
            ],
            [
                'product_id' => 3,
                'type' => 'out',
                'quantity' => 2,
                'reference' => 'ORD-0003',
                'notes' => 'Sold to customer',
            ],
            [
                'product_id' => 4,
                'type' => 'out',
                'quantity' => 10,
                'reference' => 'ORD-0004',
                'notes' => 'Sold to customer',
            ],
            [
                'product_id' => 5,
                'type' => 'out',
                'quantity' => 8,
                'reference' => 'ORD-0005',
                'notes' => 'Sold to customer',
            ],
        ];

        foreach ($stockMovements as $stockMovement) {
            Stockmovement::create($stockMovement);
        }
    }
}
