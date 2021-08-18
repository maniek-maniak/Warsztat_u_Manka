<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

use App\Models\Car;
use App\Repositories\CarsRepository;

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
        //$car = $CarsRepo->getCar($car_id);
    
        $user_id = auth()->user()->id;

        if ($user_id =='1'){
        //if ($request->route()->car_id == '3') {
            $request->route()->setParameter('car_id', '6');
        }
        return $next($request);
    }
}
