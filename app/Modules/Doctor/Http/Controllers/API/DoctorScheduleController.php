<?php

namespace App\Modules\Doctor\Http\Controllers\API;

use Illuminate\Http\Request;
use App\ {
    Http\Resources\Doctor\DoctorScheduleCollection,
    Http\Resources\Doctor\DoctorScheduleResource,
    Http\Controllers\Controller,
    Modules\Doctor\DoctorSchedule
};

class DoctorScheduleController extends Controller
{
	// 
	public function index()
	{
        return DoctorScheduleCollection::collection(DoctorSchedule::all());
	}
    // 
    public function show(DoctorSchedule $doctor_schedule)
    {
        return new DoctorScheduleResource($doctor_schedule);
    }
}
