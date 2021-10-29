<?php

namespace App\Modules\About\Http\Controllers\API;

use Illuminate\Http\Request;
use App\ {
    Http\Resources\About\AboutCollection,
    Http\Resources\About\AboutResource,
    Http\Resources\Partner\PartnerCollection,
    Http\Controllers\Controller,
    Modules\About\AboutPartner,
    Modules\About\About
};

class AboutController extends Controller
{
	// 
	public function index()
	{
        return AboutCollection::collection(About::all());
	}
    // 
    public function show(About $about)
    {
        return new AboutResource($about);
    }
    // 
    public function index_partner()
    {
        return PartnerCollection::collection(AboutPartner::all());
    }
}
