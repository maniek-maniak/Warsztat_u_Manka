<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\VisitsController;
use App\Http\Controllers\Api\CalendarController;
use App\Http\Controllers\Api\CarsController;

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

Route::get('user', [AuthController::class, 'test']);

Route::post('register', [AuthController::class, 'register']);

Route::post('login', [AuthController::class, 'login']);

// Route::middleware(middleware: 'auth:sanctum')->group(function(){
//     Route::get('user', [AuthController::class, 'test']);
// });



Route::apiResource('calendar', CalendarController::class);

Route::apiResource('cars', CarsController::class);

Route::apiResource('visits', VisitsController::class);
