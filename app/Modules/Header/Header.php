<?php

namespace App\Modules\Header;

use Illuminate\Database\Eloquent\Model;

class Header extends Model
{
    protected $fillable = [
        'title', 'subtitle', 'phone', 'created_at', 'updated_at'
    ];
}
