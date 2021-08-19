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
        $car_id = $request->route()->car_id;
        $visit_id = $request->route()->visit_id;
        $zalogowany = Auth::user();
        $listCars = $zalogowany['cars'];
        $my_car = false;
        foreach ($listCars as $car){
            if ($car['id'] == $car_id){
                $my_car = true;
            }
        }

        if (!$my_car){
            return redirect('/cars/'.$visit_id);
        }
        return $next($request);
    }
}
