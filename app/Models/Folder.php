<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Folder extends Model
{
    protected $table = 'folders';
    protected $fillable = [
        'folder_number', 'escale_number',
        'rubric_number', 'client_id', 'type'
    ];
    protected $dates = [
        'created_at', 'updated_at', 'folder_date'
    ];

    public function client()
    {
        return $this->belongsTo('App\Models\Client', 'client_id');
    }

    public function maritimeFolder()
    {
        return $this->hasOne('App\Models\MaritimeFolder', 'folder_id');
    }

    public function logisticFolder()
    {
        return $this->hasOne('App\Models\LogisticFolder', 'folder_id');
    }

    public function transitFolder()
    {
        return $this->hasOne('App\Models\TransitFolder', 'folder_id');
    }

    public function roadFolder()
    {
        return $this->hasOne('App\Models\RoadFolder', 'folder_id');
    }

    public function arialFolder()
    {
        return $this->hasOne('App\Models\ArialFolder', 'folder_id');
    }

    public function articles()
    {
        return $this->hasMany('App\Models\Article', 'folder_id');
    }

    public function files()
    {
        return $this->hasMany('App\Models\File', 'folder_id');
    }

    public function invoices()
    {
        return $this->hasMany('App\Models\Invoice', 'folder_id');
    }

    public function charges()
    {
        return $this->hasMany('App\Models\Charge', 'folder_id');
    }
}
