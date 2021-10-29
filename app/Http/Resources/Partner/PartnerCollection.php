<?php

namespace App\Http\Resources\Partner;

use Illuminate\Http\Resources\Json\Resource;

class PartnerCollection extends Resource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'img_path' => $this->img_path,
            'link_path' => $this->link_path
        ];
    }
}
