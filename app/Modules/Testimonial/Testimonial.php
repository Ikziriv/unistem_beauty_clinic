<?php

namespace App\Modules\Testimonial;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $fillable = [
        'name', 'message',
    ];
}
