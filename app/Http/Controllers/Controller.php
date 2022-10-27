<?php

namespace App\Http\Controllers;

use App\Models\Galaxy;
use App\Models\Planet;
use App\Models\SolarSystem;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function galaxyBelongsToUser(Galaxy $galaxy, User $user)
    {
        if ($galaxy->user_id !== $user->getKey()) {
            return abort(Response::HTTP_NOT_FOUND);
        }
    }

    protected function solarSystemBelongsToUser(SolarSystem $solarSystem, User $user)
    {
        if ($solarSystem->galaxy->user_id !== $user->getKey()) {
            return abort(Response::HTTP_NOT_FOUND);
        }
    }

    protected function planetBelongsToUser(Planet $planet, User $user)
    {
        if ($planet->solarSystem->galaxy->user_id !== $user->getKey()) {
            return abort(Response::HTTP_NOT_FOUND);
        }
    }
}
