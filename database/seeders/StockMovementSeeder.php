<?php

namespace Database\Seeders;

use App\Models\StockMovement;
use Illuminate\Database\Seeder;

class StockMovementSeeder extends Seeder
{
    /**
     * Run the application's database seeds.
     */
    public function run(): void
    {
        $stockMovements = [
            ['product_id' => 1, 'type' => 'in', 'quantity' => 100, 'reference' => 'PUR-0001', 'notes' => 'Initial bottled water stock'],
            ['product_id' => 2, 'type' => 'in', 'quantity' => 80, 'reference' => 'PUR-0002', 'notes' => 'Orange juice stock received'],
            ['product_id' => 3, 'type' => 'in', 'quantity' => 90, 'reference' => 'PUR-0003', 'notes' => 'Potato chips stock received'],
            ['product_id' => 4, 'type' => 'in', 'quantity' => 100, 'reference' => 'PUR-0004', 'notes' => 'Chocolate bar stock received'],
            ['product_id' => 5, 'type' => 'in', 'quantity' => 60, 'reference' => 'PUR-0005', 'notes' => 'Sandwich bread stock received'],
            ['product_id' => 6, 'type' => 'in', 'quantity' => 70, 'reference' => 'PUR-0006', 'notes' => 'Whole milk stock received'],
            ['product_id' => 7, 'type' => 'in', 'quantity' => 120, 'reference' => 'PUR-0007', 'notes' => 'Fresh apples stock received'],
            ['product_id' => 8, 'type' => 'in', 'quantity' => 30, 'reference' => 'PUR-0008', 'notes' => 'Frozen pizza stock received'],
            ['product_id' => 9, 'type' => 'in', 'quantity' => 40, 'reference' => 'PUR-0009', 'notes' => 'Pasta stock received'],
            ['product_id' => 10, 'type' => 'in', 'quantity' => 50, 'reference' => 'PUR-0010', 'notes' => 'Shampoo stock received'],
            ['product_id' => 11, 'type' => 'in', 'quantity' => 40, 'reference' => 'PUR-0011', 'notes' => 'Laundry detergent stock received'],
            ['product_id' => 12, 'type' => 'in', 'quantity' => 30, 'reference' => 'PUR-0012', 'notes' => 'Chicken salad stock received'],
            ['product_id' => 1, 'type' => 'out', 'quantity' => 3, 'reference' => 'ORD-0001', 'notes' => 'Bottled water sold'],
            ['product_id' => 2, 'type' => 'out', 'quantity' => 2, 'reference' => 'ORD-0002', 'notes' => 'Orange juice sold'],
            ['product_id' => 3, 'type' => 'out', 'quantity' => 4, 'reference' => 'ORD-0003', 'notes' => 'Potato chips sold'],
            ['product_id' => 4, 'type' => 'out', 'quantity' => 1, 'reference' => 'ORD-0004', 'notes' => 'Chocolate bar sold'],
            ['product_id' => 5, 'type' => 'out', 'quantity' => 1, 'reference' => 'ORD-0005', 'notes' => 'Sandwich bread sold'],
            ['product_id' => 7, 'type' => 'out', 'quantity' => 2, 'reference' => 'ORD-0006', 'notes' => 'Fresh apples sold'],
            ['product_id' => 9, 'type' => 'out', 'quantity' => 2, 'reference' => 'ORD-0007', 'notes' => 'Pasta sold'],
            ['product_id' => 10, 'type' => 'out', 'quantity' => 3, 'reference' => 'ORD-0008', 'notes' => 'Shampoo sold'],
        ];

        foreach ($stockMovements as $stockMovement) {
            StockMovement::create($stockMovement);
        }
    }
}
