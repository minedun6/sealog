<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoadFolder extends Model
{
    protected $table = 'road_folders';
    protected $fillable = [
        'type', 'shipment_place', 'landing_place', 'truck', 'cma_number', 'folder_id'
    ];
    protected $dates = [
        'created_at', 'updated_at'
    ];
}
