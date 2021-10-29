<?php

namespace App\Modules\Doctor\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Resources\Doctor\DoctorSubResource;
use App\ {
    Modules\Doctor\DoctorSub,
    Http\Controllers\Controller
};

class SubDoctorController extends Controller
{
	// 
	public function index()
	{
        return DoctorSub::all();
	}
    // 
    public function show(DoctorSub $subdoctor)
    {
        return new DoctorSubResource($subdoctor);
    }
}
