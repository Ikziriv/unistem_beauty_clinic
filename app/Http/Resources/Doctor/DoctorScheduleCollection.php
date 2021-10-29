<?php

namespace App\Http\Resources\Doctor;

use Illuminate\Http\Resources\Json\Resource;

class DoctorScheduleCollection extends Resource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'city_name' => $this->city->name,
            'doctor_name' => $this->doctor->name,
            'day' => $this->day,
            'start_time' => $this->start_time,
            'end_time' => $this->end_time,
        ];
    }
}
