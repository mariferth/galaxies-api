<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\GalaxyController;
use App\Http\Controllers\PlanetController;
use App\Http\Controllers\SolarSystemController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('/register', [UserController::class, 'store']);
Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::apiResource('galaxies', GalaxyController::class);
    Route::apiResource('galaxies.solar-systems', SolarSystemController::class)->scoped();
    Route::apiResource('galaxies.solar-systems.planets', PlanetController::class)->scoped();
});
