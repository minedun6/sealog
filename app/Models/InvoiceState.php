<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InvoiceState extends Model
{
    protected $table = 'invoice_states';
    protected $fillable = [
        'code', 'value'
    ];
    protected $dates = [
        'created_at', 'updated_at'
    ];

    
}
