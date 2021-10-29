<?php

namespace App\Modules\Promo\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Resources\Promo\PromoResource;
use App\ {
    Modules\Promo\Promo,
    Http\Controllers\Controller
};

class PromoController extends Controller
{
	// 
	public function index()
	{
        return Promo::all();
	}
    // 
    public function show(Promo $promo)
    {
        return new PromoResource($promo);
    }
}
