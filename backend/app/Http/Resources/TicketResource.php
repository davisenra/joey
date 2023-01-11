<?php

namespace App\Http\Resources;

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
            'user' => $this->user_id,
            'assigned_agent' => $this->assigned_agent,
            'title' => $this->title,
            'description' => $this->description,
            'status' => $this->status,
            'priority' => $this->priority,
            'categories' => CategoryResource::collection($this->whenLoaded('categories')),
            'labels' => LabelResource::collection($this->whenLoaded('labels')),
            'created_at' => $this->created_at,
        ];
    }
}
