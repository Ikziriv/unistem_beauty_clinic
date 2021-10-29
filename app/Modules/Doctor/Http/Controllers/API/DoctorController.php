<?php

namespace App\Modules\Doctor\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Resources\Doctor\DoctorResource;
use App\ {
    Modules\Doctor\Doctor,
    Http\Controllers\Controller
};

class DoctorController extends Controller
{
	// 
	public function index()
	{
        return Doctor::all();
	}
    // 
    public function show(Doctor $doctor)
    {
        return new DoctorResource($doctor);
    }
}
