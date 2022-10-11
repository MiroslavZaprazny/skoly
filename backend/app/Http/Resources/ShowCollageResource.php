<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ShowCollageResource extends JsonResource
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
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'founded_at' => $this->founded_at,
            'average_rating' => RatingsResource::collection($this->whenLoaded('ratings'))->avg('rating'),
            'rating_count' => RatingsResource::collection($this->whenLoaded('ratings'))->count(),
            'ratings' => RatingsResource::collection($this->whenLoaded('ratings'))
        ];
    }
}
