<?php

use Illuminate\Database\Seeder;

class PaymentReasonTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $payment_reasons =
        [
            [
                'code'        => 'MES',
                'description' => 'MENSALIDADE'
            ]
        ];
    
        foreach ($payment_reasons as $payment_reason)
        {
            \SisConPat\PaymentReason::create($payment_reason);
        }
    }
}

