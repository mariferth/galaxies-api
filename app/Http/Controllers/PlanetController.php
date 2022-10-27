<?php

namespace App\Http\Controllers;

use App\Http\Requests\PlanetStoreOrUpdateRequest;
use App\Http\Resources\PlanetResource;
use App\Models\Galaxy;
use App\Models\Planet;
use App\Models\SolarSystem;
use Illuminate\Support\Facades\Auth;

class PlanetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(Galaxy $galaxy, SolarSystem $solarSystem)
    {
        $this->solarSystemBelongsToUser($solarSystem, Auth::user());

        return PlanetResource::collection($solarSystem->planets()->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return PlanetResource
     */
    public function store(PlanetStoreOrUpdateRequest $request, Galaxy $galaxy, SolarSystem $solarSystem)
    {
        $this->solarSystemBelongsToUser($solarSystem, Auth::user());

        return PlanetResource::make($solarSystem->planets()->create(
            $request->validated()
        ));
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Galaxy $galaxy
     * @return PlanetResource
     */
    public function show(Galaxy $galaxy, SolarSystem $solarSystem, Planet $planet)
    {
        $this->planetBelongsToUser($planet, Auth::user());

        return PlanetResource::make($planet);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Galaxy $galaxy
     * @return PlanetResource
     */
    public function update(PlanetStoreOrUpdateRequest $request, Galaxy $galaxy, SolarSystem $solarSystem, Planet $planet)
    {
        $this->planetBelongsToUser($planet, Auth::user());

        $planet->update($request->validated());

        return PlanetResource::make($planet);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Galaxy $galaxy
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Galaxy $galaxy, SolarSystem $solarSystem, Planet $planet)
    {
        $this->planetBelongsToUser($planet, Auth::user());

        $planet->delete();

        return response()->json(['status' => 'Planeta excluído com sucesso!']);
    }
}
