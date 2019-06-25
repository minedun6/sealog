<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = 'clients';

    protected $fillable = [
        'name', 'email', 'address', 'matricule_fiscale', 'phone', 'fax',
        'contact_name', 'notes', 'parameter_id', 'payment_condition'
    ];

    protected $date = ['created_at', 'updated_at'];

    public function parameter()
    {
        return $this->belongsTo('App\Models\Parameter', 'parameter_id');
    }

    public function folders()
    {
        return $this->hasMany('App\Models\Folder', 'client_id');
    }

    public function invoices()
    {
        return $this->hasMany('App\Models\Invoice', 'client_id');
    }
}
