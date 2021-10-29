<?php

namespace App\Modules\Hasci;

use Illuminate\Database\Eloquent\Model;

class HasciLink extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'img_head', 'title', 'link', 'created_at', 'updated_at'
    ];
}
