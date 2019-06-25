<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';
    protected $fillable = [
        'code', 'value'
    ];
    protected $dates = [
        'updated_at', 'created_at'
    ];
}
