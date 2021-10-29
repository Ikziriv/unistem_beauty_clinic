<?php

namespace App\Modules\Department;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = [
        'img_path', 'name', 'description', 'slug', 'created_at', 'updated_at'
    ];
}
