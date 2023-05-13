<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EventResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name'=>$this->name,
            'date'=>$this->date,
            'location'=>$this->location,
            'created_by'=>$this->user,
            'team_id'=>$this->teams,
            'ticket'=>$this->tickets,
        ];
    }
}
