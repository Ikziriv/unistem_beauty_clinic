<?php

namespace App\Modules\Staff;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $fillable = [
        'img_head', 'name', 'phone', 'address',
    ];
}
