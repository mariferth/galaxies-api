<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SolarSystemResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'galaxy_id' => $this->galaxy_id,
            'name' => $this->name,
            'dimension' => $this->dimension,
            'number_of_planets' => $this->number_of_planets,
            'main_star' => $this->main_star,
            'planets' => PlanetResource::collection($this->whenLoaded('planets'))
        ];
    }
}
