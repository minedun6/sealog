<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Parameter extends Model
{
    protected $table = "parameters";
    protected $fillable = ['payment_type_id', 'currency_id'];
    protected $dates = ['created_at', 'updated_at'];

    public function currency()
    {
        return $this->belongsTo('App\Models\Currency', 'currency_id');
    }

    public function paymentType()
    {
        return $this->belongsTo('App\Models\PaymentType', 'payment_type_id');
    }
}
