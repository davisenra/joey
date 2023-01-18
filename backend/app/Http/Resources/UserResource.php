<?php

namespace App\Http\Resources;

use App\Http\Resources\Ticket\TicketResource;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'uuid' => $this->uuid,
            'name' => $this->name.' '.$this->surname,
            'email' => $this->email,
            'role' => $this->role,
            'tickets' => TicketResource::collection($this->whenLoaded('tickets')),
            'registered_since' => $this->created_at,
        ];
    }
}
