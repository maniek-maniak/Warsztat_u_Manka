<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\VisitsController;
use App\Http\Controllers\Api\CalendarController;
use App\Http\Controllers\Api\CarsController;
use Illuminate\Support\Facades\Auth;

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

Route::middleware('auth:api')->get('me', [AuthController::class, 'me']);  

Route::post('register', [AuthController::class, 'register']);

Route::post('login', [AuthController::class, 'login']);

Route::post('logout', [AuthController::class, 'logout']);


Route::apiResource('calendar', CalendarController::class);

Route::apiResource('cars', CarsController::class);

Route::middleware(['ApiCheckCarOwner'])->group(function(){
    Route::apiResource('visits', VisitsController::class);
});
