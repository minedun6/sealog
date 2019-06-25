<?php

use Illuminate\Database\Seeder;
use App\Models\InvoiceType;

class InvoiceTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*$invoice_type = new InvoiceType();
        $invoice_type->code = 'import';
        $invoice_type->value = 'Import';
        $invoice_type->save();

        $invoice_type = new InvoiceType();
        $invoice_type->code = 'export';
        $invoice_type->value = 'Export';
        $invoice_type->save();

        $invoice_type = new InvoiceType();
        $invoice_type->code = 'magasinage';
        $invoice_type->value = 'Magasinage';
        $invoice_type->save();

        $invoice_type = new InvoiceType();
        $invoice_type->code = 'transit';
        $invoice_type->value = 'Transit';
        $invoice_type->save();

        $invoice_type = new InvoiceType();
        $invoice_type->code = 'surestarie';
        $invoice_type->value = 'Surestarie';
        $invoice_type->save();*/

        $invoice_type = new InvoiceType();
        $invoice_type->code = 'logistic';
        $invoice_type->value = 'Logistique';
        $invoice_type->save();
    }
}
