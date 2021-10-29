<?php

namespace App\Modules\Hasci;

use Illuminate\Database\Eloquent\Model;

class HasciMetode extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'kriteria', 'konvensional', 'stemcell', 'created_at', 'updated_at'
    ];
}
