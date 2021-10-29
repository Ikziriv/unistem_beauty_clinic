<?php

namespace App\Modules\Service;

use Illuminate\Database\Eloquent\Model;

class SubService extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'dept_id', 'title', 'img_head', 'content', 'created_at', 'updated_at'
    ];
}
