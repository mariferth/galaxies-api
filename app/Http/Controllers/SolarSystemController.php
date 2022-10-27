<?php

namespace App\Http\Controllers;

use App\Http\Requests\SolarSystemStoreOrUpdateRequest;
use App\Http\Resources\SolarSystemResource;
use App\Models\Galaxy;
use App\Models\SolarSystem;
use Illuminate\Support\Facades\Auth;

class SolarSystemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(Galaxy $galaxy)
    {
        $this->galaxyBelongsToUser($galaxy, Auth::user());

        return SolarSystemResource::collection(
            $galaxy->solarSystems()->with('planets')->get()
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return SolarSystemResource
     */
    public function store(SolarSystemStoreOrUpdateRequest $request, Galaxy $galaxy)
    {
        $this->galaxyBelongsToUser($galaxy, Auth::user());

        return SolarSystemResource::make($galaxy->solarSystems()->create(
            $request->validated()
        ));
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Galaxy $galaxy
     * @return SolarSystemResource
     */
    public function show(Galaxy $galaxy, SolarSystem $solarSystem)
    {
        $this->solarSystemBelongsToUser($solarSystem, Auth::user());

        return SolarSystemResource::make($solarSystem->load('planets'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Galaxy $galaxy
     * @return SolarSystemResource
     */
    public function update(SolarSystemStoreOrUpdateRequest $request, Galaxy $galaxy, SolarSystem $solarSystem)
    {
        $this->solarSystemBelongsToUser($solarSystem, Auth::user());

        $solarSystem->update($request->validated());

        return SolarSystemResource::make($solarSystem->load('planets'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Galaxy $galaxy
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Galaxy $galaxy, SolarSystem $solarSystem)
    {
        $this->solarSystemBelongsToUser($solarSystem, Auth::user());

        $solarSystem->delete();

        return response()->json(['status' => 'Sistema Solar excluído com sucesso!']);
    }
}
