<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VisitsController;
use App\Http\Controllers\CalendarController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth/login');
});

Route::middleware(['auth'])->name('dashboard')->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    });


    Route::get('/addcar', [CarsController::class, 'create']);

    Route::post('/addcar', [CarsController::class, 'store']);

    Route::get('/addnewterm', [CalendarController::class, 'create']);

    Route::post('/addnewterm', [CalendarController::class, 'store']);


    Route::get('/cars', [CarsController::class, 'index']);

    Route::get('/cars/{visit_id}', [CarsController::class, 'addVisit']);


    Route::get('/calendar/cancel/{visit_id}', [CalendarController::class, 'cancel']);


    Route::middleware(['CheckCarOwner'])->group(function(){
        Route::get('/calendar/{visit_id}/{car_id}', [CalendarController::class, 'edit']);    
    });
    



    Route::get('/visits', [VisitsController::class, 'index']);

    Route::get('/visits/{car_id}', [VisitsController::class, 'addCar']);

});

require __DIR__.'/auth.php';
