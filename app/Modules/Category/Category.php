<?php

namespace App\Modules\Category;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'created_at', 'updated_at'
    ];

    public function post()
    {
        return $this->hasMany('App\Modules\Post\Post');
    }
}
