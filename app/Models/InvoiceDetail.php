<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InvoiceDetail extends Model
{
    protected $table = 'invoice_details';
    protected $fillable = [
        'description', 'price', 'quantity', 'tva', 'discount', 'total', 'invoice_id', 'total_ttc'
    ];
    protected $dates = [
        'created_at', 'updated_at'
    ];

    public function Invoice()
    {
        return $this->belongsTo('App\Models\Invoice', 'invoice_id');
    }
}
