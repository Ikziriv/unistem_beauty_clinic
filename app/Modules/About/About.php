<?php

namespace App\Modules\About;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'img_head', 'content', 'img_partner', 'created_at', 'updated_at'
    ];

    // public function images()
    // {
    //     return $this->hasMany('App\Modules\About\AboutPartner');
    // }
}
