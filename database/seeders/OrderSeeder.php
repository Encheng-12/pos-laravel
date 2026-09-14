<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Order;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $order = [
            [
                'cashier_id' => 1,
                'customer_id' => 3,
                'invoice_no' => 'INV-2026-0001',
                'subtotal' => 150000,
                'tax' => 15000,
                'discount' => 5000,
                'status' => 'completed',
                
            ],
            [
                'cashier_id' => 1,
                'customer_id' => 4,
                'invoice_no' => 'INV-2026-0002',
                'subtotal' => 250000,
                'tax' => 25000,
                'discount' => 0,
                'status' => 'completed',
                
            ],
            [
                'cashier_id' => 2,
                'customer_id' => 5,
                'invoice_no' => 'INV-2026-0003',
                'subtotal' => 95000,
                'tax' => 9500,
                'discount' => 2000,
                'status' => 'pending',
                
            ],
            [
                'cashier_id' => 1,
                'customer_id' => 6,
                'invoice_no' => 'INV-2026-0004',
                'subtotal' => 420000,
                'tax' => 42000,
                'discount' => 20000,
                'status' => 'completed',
                
            ],
            [
                'cashier_id' => 2,
                'customer_id' => 7,
                'invoice_no' => 'INV-2026-0005',
                'subtotal' => 180000,
                'tax' => 18000,
                'discount' => 10000,
                'status' => 'pending',
                
            ],
            [
                'cashier_id' => 1,
                'customer_id' => 8,
                'invoice_no' => 'INV-2026-0006',
                'subtotal' => 310000,
                'tax' => 31000,
                'discount' => 15000,
                'status' => 'completed',
                
            ],
            [
                'cashier_id' => 2,
                'customer_id' => 9,
                'invoice_no' => 'INV-2026-0007',
                'subtotal' => 75000,
                'tax' => 7500,
                'discount' => 0,
                'status' => 'cancelled',
                
            ],
            [
                'cashier_id' => 1,
                'customer_id' => 10,
                'invoice_no' => 'INV-2026-0008',
                'subtotal' => 540000,
                'tax' => 54000,
                'discount' => 30000,
                'status' => 'completed',
                
            ],
            [
                'cashier_id' => 2,
                'customer_id' => 3,
                'invoice_no' => 'INV-2026-0009',
                'subtotal' => 125000,
                'tax' => 12500,
                'discount' => 5000,
                'status' => 'pending',
                
            ],
            [
                'cashier_id' => 1,
                'customer_id' => 5,
                'invoice_no' => 'INV-2026-0010',
                'subtotal' => 210000,
                'tax' => 21000,
                'discount' => 10000,
                'status' => 'completed',
                
            ],
        ];
        foreach ($orders as $order){
            Order::create($order);
        }
    }

}
