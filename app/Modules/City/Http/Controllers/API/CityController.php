<?php

namespace App\Modules\City\Http\Controllers\API;

use Illuminate\Http\Request;
use App\ {
    Http\Resources\City\CityResource,
    Http\Controllers\Controller,
    Modules\City\City
};

class CityController extends Controller
{
	// 
	public function index()
	{
        return City::all();
	}
    // 
    public function show(City $city)
    {
        return new CityResource($city);
    }
}
