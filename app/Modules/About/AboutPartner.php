<?php

namespace App\Modules\About;

use Illuminate\Database\Eloquent\Model;

class AboutPartner extends Model
{
	protected $table = 'about_partners';

    protected $guarded = [];
    protected $fillable = [
        'img_path', 'link_path'
    ];

    // public function about()
    // {
    //     return $this->belongsTo('App\Modules\About\About');
    // }
}
