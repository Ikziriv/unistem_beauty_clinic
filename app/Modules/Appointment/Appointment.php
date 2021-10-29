<?php

namespace App\Modules\Appointment;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{ 
	 protected $dates  = [
	    'scheduled_time' => 'datetime:d/m/Y',
	    'created_at' => 'datetime:d/m/Y', // Change your format
	    'updated_at' => 'datetime:d/m/Y',
	];
    protected $fillable = [
        'doctor_id', 'name', 'email', 'message', 'scheduled_time', 'is_booked', 'is_cancelled', 'created_at', 'updated_at'
    ];

	public function doctor() {
	    return $this->belongsTo('App\Modules\Doctor\DoctorSub', 'doctor_id');
	}
}
