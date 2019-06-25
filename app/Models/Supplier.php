<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $table = 'suppliers';
    protected $fillable = [
        'name', 'email', 'address', 'matricule_fiscale', 'phone', 'fax',
        'contact_name', 'notes', 'parameter_id', 'payment_condition'
    ];
    protected $dates = [
        'created_at', 'updated_at'
    ];

    public function parameter()
    {
        return $this->belongsTo('App\Models\Parameter', 'parameter_id');
    }

    public function charges()
    {
        return $this->hasMany('App\Models\Charge', 'supplier_id');
    }
}
