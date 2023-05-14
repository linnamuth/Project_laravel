<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'name'=>$this->name,
            'age'=>$this->age,
            'gender'=>$this->gender,
            'phone_number'=>$this->phone_number,
            'event'=>$this->events,
            'team'=>$this->teams,
            'ticket'=>$this->tickets,
              
        ];
    }
}
