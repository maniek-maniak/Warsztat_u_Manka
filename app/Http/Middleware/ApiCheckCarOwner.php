<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

class ApiCheckCarOwner
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
        $visit_id = $request->route()->visit_id;      
        $visit_car_id = DB::table('visits')->where('id',$visit_id)->value('car_id');
        if ($visit_car_id <> '2'){
            return response()->json([
                'visit enable' => false
            ],status:404); // popraw kod błędu
        }
        
        $zalogowany = Auth::user();
        $listCars = $zalogowany['cars'];
        $my_car = false;
        $car_id = $request->route()->car_id;
        foreach ($listCars as $car){
            if ($car['id'] == $car_id){
                $my_car = true;
            }
        }

        if (!$my_car){
            return response()->json([
                'your car' => false
            ],status:404); // popraw kod błędu
        }
        return $next($request);
    }
}
