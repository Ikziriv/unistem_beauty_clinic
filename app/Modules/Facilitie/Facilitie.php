<?php

namespace App\Modules\Facilitie;

use Illuminate\Database\Eloquent\Model;

class Facilitie extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'date_upload', 'path_img', 'created_at', 'updated_at'
    ];
}
