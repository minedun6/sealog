<?php

use Illuminate\Database\Seeder;
use App\Models\PaymentType;

class PaymentTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $paymentType = new PaymentType();
        $paymentType->name = "Virement Bancaire";
        $paymentType->code = "transfer";
        $paymentType->save();

        $paymentType = new PaymentType();
        $paymentType->name = "Espèces";
        $paymentType->code = "cash";
        $paymentType->save();
    }
}
