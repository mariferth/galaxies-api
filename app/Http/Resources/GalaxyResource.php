<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class GalaxyResource extends JsonResource
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
            'user_id' => $this->user_id,
            'name' => $this->name,
            'dimension' => $this->dimension,
            'number_of_solar_systems' => $this->number_of_solar_systems,
            'solar_systems' => SolarSystemResource::collection($this->whenLoaded('solarSystems'))
        ];
    }
}
