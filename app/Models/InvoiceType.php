<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InvoiceType extends Model
{
    protected $table = 'invoice_types';
    protected $fillable = [
        'code', 'value'
    ];
    protected $dates = [
        'created_at', 'updated_at'
    ];

    public function invoices()
    {
        return $this->hasMany('App\Models\Invoice', 'type_id');
    }

}
