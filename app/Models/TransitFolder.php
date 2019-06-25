<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransitFolder extends Model
{
    protected $table = 'transit_folders';
    protected $fillable = [
        'shipment_place', 'landing_place', 'folder_id'
    ];
    protected $dates = [
        'created_at', 'updated_at'
    ];
}
