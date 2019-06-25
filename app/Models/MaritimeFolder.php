<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MaritimeFolder extends Model
{
    protected $table = 'martime_folders';
    protected $fillable = [
        'type', 'shipment_place', 'landing_place', 'ship', 'bl_number', 'folder_id', 'volume'
    ];
    protected $dates = [
        'created_at', 'updated_at'
    ];
}
