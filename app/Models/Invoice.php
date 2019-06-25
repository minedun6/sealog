<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $table = 'invoices';
    protected $fillable = [
        'invoice_number', 'order_form', 'termes', 'client_notes', 'internal_notes', 'subtotal',
        'total_discount', 'invoice_total', 'payed_sum', 'total_in_chars', 'folder_id',
        'client_id', 'type_id', 'state_id', 'prefix'
    ];
    protected $dates = [
        'created_at', 'updated_at', 'invoice_date', 'deadline'
    ];

    public function client()
    {
        return $this->belongsTo('App\Models\Client', 'client_id');
    }

    public function folder()
    {
        return $this->belongsTo('App\Models\Folder', 'folder_id');
    }

    public function details()
    {
        return $this->hasMany('App\Models\InvoiceDetail', 'invoice_id');
    }

    public function type()
    {
        return $this->belongsTo('App\Models\InvoiceType', 'type_id');
    }

    public function state()
    {
        return $this->belongsTo('App\Models\InvoiceState', 'state_id');
    }

    public function payments()
    {
        return $this->hasMany('App\Models\InvoicePayment', 'invoice_id');
    }
}
