<?php

use Illuminate\Database\Seeder;
use App\Models\InvoiceState;

class InvoiceStatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $invoice_state = new InvoiceState();
        $invoice_state->code = 'created';
        $invoice_state->value = 'créée';
        $invoice_state->save();

        $invoice_state = new InvoiceState();
        $invoice_state->code = 'sent';
        $invoice_state->value = 'envoyée';
        $invoice_state->save();

        $invoice_state = new InvoiceState();
        $invoice_state->code = 'failed';
        $invoice_state->value = 'échouée';
        $invoice_state->save();

        $invoice_state = new InvoiceState();
        $invoice_state->code = 'in payment';
        $invoice_state->value = 'en paiement';
        $invoice_state->save();

        $invoice_state = new InvoiceState();
        $invoice_state->code = 'payed';
        $invoice_state->value = 'payée';
        $invoice_state->save();
    }
}
