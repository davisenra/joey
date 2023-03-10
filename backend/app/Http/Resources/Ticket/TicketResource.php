<?php

namespace App\Http\Resources\Ticket;

use App\Http\Resources\CategoryResource;
use App\Http\Resources\LabelResource;
use App\Http\Resources\MessageResource;
use Illuminate\Http\Resources\Json\JsonResource;

class TicketResource extends JsonResource
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
            'assigned_agent' => $this->assigned_agent,
            'title' => $this->title,
            'description' => $this->description,
            'status' => $this->status,
            'priority' => $this->priority,
            'categories' => CategoryResource::collection($this->whenLoaded('categories')),
            'labels' => LabelResource::collection($this->whenLoaded('labels')),
            'messages' => MessageResource::collection($this->whenLoaded('messages')),
            'media' => TicketMediaResource::collection($this->whenLoaded('media')),
            'created_at' => $this->created_at,
        ];
    }
}
