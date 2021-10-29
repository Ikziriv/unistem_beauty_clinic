<?php

namespace App\Modules\City;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'tlp', 'lat', 'long', 'address', 'created_at', 'updated_at'
    ];

    public function schedule()
    {
        return $this->hasMany('App\Modules\Doctor\DoctorSchedule');
    }
}
