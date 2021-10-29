<?php

namespace App\Modules\OpenHour;

use Illuminate\Database\Eloquent\Model;

class OpenHour extends Model
{
    protected $fillable = [
        'days', 'time',
    ];
}
