<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Models\Car;

class CheckCarOwner
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        $my_car = false;
        $car_id = $request->route()->car_id;
        $zalogowany = Auth::user();

        $listCars = $zalogowany['cars'];
        foreach ($listCars as $car){
            if ($car['id'] == $car_id){
                $my_car = true;
            }
        }

        if (!$my_car){
            //
            //$request->route()->setParameter('car_id', '6');
            //$request->route('/cars');
            //return $next(view('layouts/cars.list', ["listCars" => $listCars]));
        }
        return $next($request);
    }
}
