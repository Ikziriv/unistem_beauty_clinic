<?php

namespace App\Http\Resources\Promo;

use Illuminate\Http\Resources\Json\Resource;

class PromoResource extends Resource
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
            'promo_date' => $this->promo_date,
            'img_path' => $this->img_promo,
        ];
    }
}
