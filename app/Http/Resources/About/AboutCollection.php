<?php

namespace App\Http\Resources\About;

use Illuminate\Http\Resources\Json\Resource;

class AboutCollection extends Resource
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
            'img_head' => $this->img_head,
            'title' => $this->title,
            'content' => $this->content,
            // 'link_partner' => $this->images,
            'href' => [
                'link' => route('about-view', $this->id)
            ]
        ];
    }
}
