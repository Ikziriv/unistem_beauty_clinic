<?php

namespace App\Modules\SosialLink;

use Illuminate\Database\Eloquent\Model;

class SosialLink extends Model
{
    protected $fillable = [
        'name', 'link', 'icon',
    ];
}
