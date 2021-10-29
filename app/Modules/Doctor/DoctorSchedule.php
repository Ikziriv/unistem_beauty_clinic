<?php

namespace App\Modules\Doctor;

use Illuminate\Database\Eloquent\Model;

class DoctorSchedule extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'city_id', 'doctor_id', 'day', 'time'
    ];

	public function city() {
	    return $this->belongsTo('App\Modules\City\City', 'city_id');
	}

	public function doctor() {
	    return $this->belongsTo('App\Modules\Doctor\DoctorSub', 'doctor_id');
	}
}
