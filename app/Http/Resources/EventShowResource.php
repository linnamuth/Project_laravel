<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EventShowResource extends JsonResource
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
            'dateStart'=>$this->dateStart,
            'dateEnd'=>$this->dateEnd,
            'location'=>$this->location,
            'created_by'=>$this->user,
            'team'=>$this->teams,
            'ticket'=>$this->tickets,
        ];
    }
}
