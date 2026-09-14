<?php

namespace Database\Seeders;

use App\Models\Payment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
         $payments = [
            [
                'order_id' => 1,
                'payment_method' => 'cash',
                'amount' => 89.99,
                'reference_no' => 'PAY-0001',
                'paid_at' => '2026-09-10',
            ],
            [
                'order_id' => 2,
                'payment_method' => 'aba',
                'amount' => 49.99,
                'reference_no' => 'PAY-0002',
                'paid_at' => '2026-09-10',
            ],
            [
                'order_id' => 3,
                'payment_method' => 'acleda',
                'amount' => 449.99,
                'reference_no' => 'PAY-0003',
                'paid_at' => '2026-09-11',
            ],
            [
                'order_id' => 4,
                'payment_method' => 'cash',
                'amount' => 29.99,
                'reference_no' => 'PAY-0004',
                'paid_at' => '2026-09-11',
            ],
            [
                'order_id' => 5,
                'payment_method' => 'wing',
                'amount' => 24.99,
                'reference_no' => 'PAY-0005',
                'paid_at' => '2026-09-12',
            ],
            [
                'order_id' => 6,
                'payment_method' => 'cash',
                'amount' => 79.99,
                'reference_no' => 'PAY-0006',
                'paid_at' => '2026-09-12',
            ],
            [
                'order_id' => 7,
                'payment_method' => 'aba',
                'amount' => 39.99,
                'reference_no' => 'PAY-0007',
                'paid_at' => '2026-09-13',
            ],
            [
                'order_id' => 8,
                'payment_method' => 'acleda',
                'amount' => 34.99,
                'reference_no' => 'PAY-0008',
                'paid_at' => '2026-09-13',
            ],
            [
                'order_id' => 9,
                'payment_method' => 'cash',
                'amount' => 129.99,
                'reference_no' => 'PAY-0009',
                'paid_at' => '2026-09-14',
            ],
            [
                'order_id' => 10,
                'payment_method' => 'wing',
                'amount' => 59.99,
                'reference_no' => 'PAY-0010',
                'paid_at' => '2026-09-14',
            ],
        ];
        foreach ($payments as $payment) {
            Payment::create($payment); 
        }
    }
}
