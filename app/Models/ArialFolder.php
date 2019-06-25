<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArialFolder extends Model
{
    protected $table = 'arial_folders';
    protected $fillable = [
        'type', 'shipment_place', 'landing_place', 'flight_number', 'lta_number', 'folder_id'
    ];
    protected $dates = [
        'created_at', 'updated_at'
    ];
}
