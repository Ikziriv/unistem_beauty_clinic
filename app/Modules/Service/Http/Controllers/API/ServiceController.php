<?php

namespace App\Modules\Service\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Resources\Service\ServiceResource;
use App\ {
    Modules\Service\Service,
    Http\Controllers\Controller
};

class ServiceController extends Controller
{
	// 
	public function index()
	{
        return Service::all();
	}
    // 
    public function show(Service $service)
    {
        return new ServiceResource($service);
    }
}
