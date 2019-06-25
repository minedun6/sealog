<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Charge extends Model
{
    protected $table = 'charges';
    protected $fillable = [
        'description', 'supplier_id', 'folder_id', 'payment_type_id',
        'amount', 'exchange_rate', 'amount_exchanged'
    ];
    protected $dates = ['created_at', 'updated_at'];

    public function paymentType()
    {
        return $this->belongsTo('App\Models\PaymentType', 'payment_type_id');
    }

    public function supplier()
    {
        return $this->belongsTo('App\Models\Supplier', 'supplier_id');
    }

    public function folder()
    {
        return $this->belongsTo('App\Models\Folder', 'folder_id');
    }
}
