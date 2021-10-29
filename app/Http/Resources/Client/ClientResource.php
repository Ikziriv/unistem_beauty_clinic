<?php

namespace App\Http\Resources\Client;

use Illuminate\Http\Resources\Json\Resource;

class ClientResource extends Resource
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
            'bg_member' => $this->bg_member,
            'name' => $this->name,
            'gender' => $this->gender,
            'email' => $this->email,
            'password' => $this->password,
            'img_path' => $this->profile_picture,
            'phone_number' => $this->phone_number,
            'address' => $this->address,
            'birth_date' => $this->birth_date,
            'created_at' => $this->created_at,
        ];
    }
}
