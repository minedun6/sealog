<?php

use Illuminate\Database\Seeder;
use App\Models\Currency;

class CurrenciesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $currency = New Currency();
        $currency->name = 'Euro';
        $currency->code = 'euro';
        $currency->save();

        $currency = New Currency();
        $currency->name = 'Dollar';
        $currency->code = 'dollar';
        $currency->save();

        $currency = New Currency();
        $currency->name = 'Dinar';
        $currency->code = 'dinar';
        $currency->save();
    }
}
