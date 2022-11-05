<?php

namespace App\Http\Resources\Auth;

use Illuminate\Http\Resources\Json\JsonResource;

class LoginResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'user' => [
                'id' => $this->id,
                'username' => $this->username,
                'full_name' => $this->full_name,
                'email'=> $this->email,
                'phone_number' => $this->phone_number,
                'role' => $this->role,
            ],
            'token' => $this->createToken('userToken')->accessToken
        ];
    }
}
