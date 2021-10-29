<?php

namespace App\Http\Resources\Doctor;

use Illuminate\Http\Resources\Json\Resource;

class DoctorScheduleResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'city_name' => $this->city,
            'doctor_name' => $this->doctor,
            'day' => $this->day,
            'start_time' => $this->start_time,
            'end_time' => $this->end_time,
        ];
    }
}
