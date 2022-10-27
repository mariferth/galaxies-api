<?php

namespace App\Http\Controllers;

use App\Http\Requests\GalaxyStoreOrUpdateRequest;
use App\Http\Resources\GalaxyResource;
use App\Models\Galaxy;
use Illuminate\Support\Facades\Auth;

class GalaxyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return GalaxyResource::collection(
            Auth::user()->galaxies()->with('solarSystems')->get()
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return GalaxyResource
     */
    public function store(GalaxyStoreOrUpdateRequest $request)
    {
        return GalaxyResource::make(Auth::user()->galaxies()->create(
            $request->validated()
        ));
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Galaxy $galaxy
     * @return GalaxyResource
     */
    public function show(Galaxy $galaxy)
    {
        $this->galaxyBelongsToUser($galaxy, Auth::user());

        return GalaxyResource::make($galaxy->load('solarSystems'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Galaxy $galaxy
     * @return GalaxyResource
     */
    public function update(GalaxyStoreOrUpdateRequest $request, Galaxy $galaxy)
    {
        $this->galaxyBelongsToUser($galaxy, Auth::user());

        $galaxy->update($request->validated());

        return GalaxyResource::make($galaxy->load('solarSystems'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Galaxy $galaxy
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Galaxy $galaxy)
    {
        $this->galaxyBelongsToUser($galaxy, Auth::user());

        $galaxy->delete();

        return response()->json(['status' => 'Galáxia excluída com sucesso!']);
    }
}
