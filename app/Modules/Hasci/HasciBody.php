<?php

namespace App\Modules\Hasci;

use Illuminate\Database\Eloquent\Model;

class HasciBody extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'img_head', 'title', 'content', 'created_at', 'updated_at'
    ];
}
