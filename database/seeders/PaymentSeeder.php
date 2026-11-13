<?php

namespace Database\Seeders;

use App\Models\Payment;
use Illuminate\Database\Seeder;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $payments = [
            ['order_id' => 1, 'payment_method' => 'cash', 'amount' => 4, 'reference_no' => 'PAY-0001', 'paid_at' => '2026-09-10'],
            ['order_id' => 2, 'payment_method' => 'aba', 'amount' => 9, 'reference_no' => 'PAY-0002', 'paid_at' => '2026-09-10'],
            ['order_id' => 3, 'payment_method' => 'acleda', 'amount' => 4, 'reference_no' => 'PAY-0003', 'paid_at' => '2026-09-11'],
            ['order_id' => 4, 'payment_method' => 'cash', 'amount' => 4, 'reference_no' => 'PAY-0004', 'paid_at' => '2026-09-11'],
            ['order_id' => 5, 'payment_method' => 'wing', 'amount' => 6, 'reference_no' => 'PAY-0005', 'paid_at' => '2026-09-12'],
            ['order_id' => 6, 'payment_method' => 'cash', 'amount' => 15, 'reference_no' => 'PAY-0006', 'paid_at' => '2026-09-12'],
            ['order_id' => 7, 'payment_method' => 'aba', 'amount' => 2, 'reference_no' => 'PAY-0007', 'paid_at' => '2026-09-13'],
            ['order_id' => 8, 'payment_method' => 'acleda', 'amount' => 3, 'reference_no' => 'PAY-0008', 'paid_at' => '2026-09-13'],
            ['order_id' => 9, 'payment_method' => 'cash', 'amount' => 4, 'reference_no' => 'PAY-0009', 'paid_at' => '2026-09-14'],
            ['order_id' => 10, 'payment_method' => 'wing', 'amount' => 2, 'reference_no' => 'PAY-0010', 'paid_at' => '2026-09-14'],
        ];

        foreach ($payments as $payment) {
            Payment::create($payment);
        }
    }
}
