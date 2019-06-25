<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InvoicePayment extends Model
{
    protected $table = 'invoice_payments';
    protected $fillable = [
        'amount', 'reference', 'payment_number', 'payment_id', 'invoice_id'
    ];
    protected $date = [
        'created_at', 'updated_at'
    ];

    public function type()
    {
        return $this->belongsTo('App\Models\PaymentType', 'payment_id');
    }

    public function invoice()
    {
        return $this->belongsTo('App\Models\Invoice', 'invoice_id');
    }
}
