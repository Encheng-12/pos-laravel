<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $orders = [
            ['cashier_id' => 1, 'customer_id' => 3, 'invoice_no' => 'INV-2026-0001', 'subtotal' => 4, 'tax' => 0, 'discount' => 0, 'status' => 'completed'],
            ['cashier_id' => 1, 'customer_id' => 4, 'invoice_no' => 'INV-2026-0002', 'subtotal' => 9, 'tax' => 0, 'discount' => 0, 'status' => 'completed'],
            ['cashier_id' => 2, 'customer_id' => 5, 'invoice_no' => 'INV-2026-0003', 'subtotal' => 4, 'tax' => 0, 'discount' => 0, 'status' => 'pending'],
            ['cashier_id' => 1, 'customer_id' => 6, 'invoice_no' => 'INV-2026-0004', 'subtotal' => 4, 'tax' => 0, 'discount' => 0, 'status' => 'completed'],
            ['cashier_id' => 2, 'customer_id' => 7, 'invoice_no' => 'INV-2026-0005', 'subtotal' => 6, 'tax' => 0, 'discount' => 0, 'status' => 'pending'],
            ['cashier_id' => 1, 'customer_id' => 8, 'invoice_no' => 'INV-2026-0006', 'subtotal' => 15, 'tax' => 0, 'discount' => 0, 'status' => 'completed'],
            ['cashier_id' => 2, 'customer_id' => 9, 'invoice_no' => 'INV-2026-0007', 'subtotal' => 2, 'tax' => 0, 'discount' => 0, 'status' => 'cancelled'],
            ['cashier_id' => 1, 'customer_id' => 10, 'invoice_no' => 'INV-2026-0008', 'subtotal' => 3, 'tax' => 0, 'discount' => 0, 'status' => 'completed'],
            ['cashier_id' => 2, 'customer_id' => 3, 'invoice_no' => 'INV-2026-0009', 'subtotal' => 4, 'tax' => 0, 'discount' => 0, 'status' => 'pending'],
            ['cashier_id' => 1, 'customer_id' => 5, 'invoice_no' => 'INV-2026-0010', 'subtotal' => 2, 'tax' => 0, 'discount' => 0, 'status' => 'completed'],
        ];

        foreach ($orders as $order) {
            Order::create($order);
        }
    }
}
