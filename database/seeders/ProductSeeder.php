<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categoryIds = Category::query()
            ->whereIn('name', [
                'Beverages',
                'Snacks & Confectionery',
                'Bakery & Pastries',
                'Dairy & Eggs',
                'Fresh Produce',
                'Frozen Foods',
                'Pantry Staples',
                'Personal Care',
                'Household Essentials',
                'Prepared Meals',
            ])
            ->pluck('id', 'name');

        $products = [
            ['category' => 'Beverages', 'name' => 'Bottled Water', 'barcode' => '8901234567011', 'cost_price' => 1, 'selling_price' => 2, 'stock_quantity' => 97],
            ['category' => 'Beverages', 'name' => 'Orange Juice', 'barcode' => '8901234567028', 'cost_price' => 2, 'selling_price' => 3, 'stock_quantity' => 78],
            ['category' => 'Snacks & Confectionery', 'name' => 'Potato Chips', 'barcode' => '8901234567035', 'cost_price' => 2, 'selling_price' => 3, 'stock_quantity' => 86],
            ['category' => 'Snacks & Confectionery', 'name' => 'Chocolate Bar', 'barcode' => '8901234567042', 'cost_price' => 1, 'selling_price' => 2, 'stock_quantity' => 99],
            ['category' => 'Bakery & Pastries', 'name' => 'Sandwich Bread', 'barcode' => '8901234567059', 'cost_price' => 2, 'selling_price' => 4, 'stock_quantity' => 59],
            ['category' => 'Dairy & Eggs', 'name' => 'Whole Milk', 'barcode' => '8901234567066', 'cost_price' => 2, 'selling_price' => 5, 'stock_quantity' => 70],
            ['category' => 'Fresh Produce', 'name' => 'Fresh Apples', 'barcode' => '8901234567073', 'cost_price' => 1, 'selling_price' => 2, 'stock_quantity' => 118],
            ['category' => 'Frozen Foods', 'name' => 'Frozen Pizza', 'barcode' => '8901234567080', 'cost_price' => 4, 'selling_price' => 7, 'stock_quantity' => 30],
            ['category' => 'Pantry Staples', 'name' => 'Pasta', 'barcode' => '8901234567097', 'cost_price' => 1, 'selling_price' => 2, 'stock_quantity' => 38],
            ['category' => 'Personal Care', 'name' => 'Shampoo', 'barcode' => '8901234567103', 'cost_price' => 3, 'selling_price' => 5, 'stock_quantity' => 47],
            ['category' => 'Household Essentials', 'name' => 'Laundry Detergent', 'barcode' => '8901234567110', 'cost_price' => 5, 'selling_price' => 9, 'stock_quantity' => 40],
            ['category' => 'Prepared Meals', 'name' => 'Chicken Salad', 'barcode' => '8901234567127', 'cost_price' => 4, 'selling_price' => 7, 'stock_quantity' => 30],
        ];

        foreach ($products as $product) {
            $categoryName = $product['category'];
            unset($product['category']);

            Product::create([
                ...$product,
                'cid' => $categoryIds->get($categoryName)
                    ?? Category::where('name', $categoryName)->firstOrFail()->id,
                'status' => 'active',
            ]);
        }
    }
}
