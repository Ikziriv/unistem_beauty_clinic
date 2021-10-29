<?php

namespace App\Modules\Doctor;

use Illuminate\Database\Eloquent\Model;

class DoctorSub extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'img_head', 'name', 'sub_title', 'quote', 'content', 'created_at', 'updated_at'
    ];

    public function schedule()
    {
        return $this->hasMany('App\Modules\Doctor\DoctorSchedule');
    }

    public function appointment()
    {
        return $this->hasMany('App\Modules\Appointment\Appointment');
    }
}
