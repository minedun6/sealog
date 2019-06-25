<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentType extends Model
{
    protected $table = "payment_types";
    protected $fillable = ['code', 'name'];
    protected $dates = ['created_at', 'updated_at'];
}
