<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $table = 'files';
    protected $fillable = [
        'folder_id', 'google_drive_id'
    ];
    protected $dates = [
        'created_at', 'updated_at'
    ];

}
