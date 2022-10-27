<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PlanetResource extends JsonResource
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
            'solar_system_id' => $this->solar_system_id,
            'name' => $this->name,
            'dimension' => $this->dimension,
            'number_of_moons' => $this->number_of_moons,
            'light_years_from_the_main_star' => $this->light_years_from_the_main_star
        ];
    }
}
