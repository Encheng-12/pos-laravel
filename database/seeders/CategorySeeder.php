<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Category;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [[
            'name' => 'Beverages',
            'description' => 'Cold drinks, juices, coffees, teas, and soft beverages.',
        ],
        [
            'name' => 'Snacks & Confectionery',
            'description' => 'Chips, candies, chocolates, nuts, and packaged snacks.',
        ],
        [
            'name' => 'Bakery & Pastries',
            'description' => 'Freshly baked bread, cakes, pastries, and savory baked items.',
        ],
        [
            'name' => 'Dairy & Eggs',
            'description' => 'Fresh milk, cheese, butter, yogurt, and farm-fresh eggs.',
        ],
        [
            'name' => 'Fresh Produce',
            'description' => 'Organically grown fresh fruits, vegetables, and leafy greens.',
        ],
        [
            'name' => 'Frozen Foods',
            'description' => 'Ready-to-eat frozen meals, ice creams, meats, and vegetables.',
        ],
        [
            'name' => 'Pantry Staples',
            'description' => 'Cooking oils, spices, grains, pasta, sauces, and canned goods.',
        ],
        [
            'name' => 'Personal Care',
            'description' => 'Soaps, shampoos, skincare products, and oral hygiene items.',
        ],
        [
            'name' => 'Household Essentials',
            'description' => 'Cleaning supplies, detergents, paper towels, and trash bags.',
        ],
        [
            'name' => 'Prepared Meals',
            'description' => 'Hot or packaged ready-to-eat meals, sandwiches, and salads.',
        ],
        ];

        foreach($categories as $category){
            Category::create($category);
        }
    }
}
