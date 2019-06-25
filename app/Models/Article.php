<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'articles';
    protected $fillable = [
        'container_number', 'container_mark', 'packages_number', 'designation', 'gross_weight', 'folder_id'
    ];
    protected $dates = ['created_at', 'updated_at'];
}
