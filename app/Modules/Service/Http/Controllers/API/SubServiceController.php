<?php

namespace App\Modules\Service\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Resources\SubService\SubServiceResource;
use App\ {
    Modules\Service\SubService,
    Http\Controllers\Controller
};

class SubServiceController extends Controller
{
	// 
	public function index()
	{
        return SubService::all();
	}
    // 
    public function show(SubService $subservice)
    {
        return new SubServiceResource($subservice);
    }
}
