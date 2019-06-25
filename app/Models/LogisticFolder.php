<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LogisticFolder extends Model
{
    protected $table = 'logistic_folders';
    protected $fillable = [
        'area', 'folder_id'
    ];
    protected $dates = [
        'created_at', 'updated_at', 'entry_date', 'exit_date'
    ];
}
