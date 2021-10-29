<?php

namespace App\Http\Resources\Doctor;

use Illuminate\Http\Resources\Json\Resource;

class DoctorSubResource extends Resource
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
            'img_path' => $this->img_head,
            'name' => $this->name,
            'sub_title' => $this->sub_title,
            'quote' => $this->quote,
            'content' => $this->content,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
