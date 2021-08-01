<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Visit;

use App\Repositories\VisitsRepository;

class VisitsController extends Controller
{
    public function index(VisitsRepository $VisitsRepo){

        $visits = $VisitsRepo->getEnabled();
        $add_new_term = false;

        $zalogowany = Auth::user();
        $user_id = $zalogowany->id;
        if ($zalogowany->type == 'Admin') {
            $add_new_term = true;
        }

        $myVisits = $VisitsRepo->getMy($user_id);
     
        return view('layouts/calendar.list', [
            "visits" => $visits,
            "myVisits" => $myVisits,
            "add_new_term" => $add_new_term
        ]);
    }

    public function create(){

        return view('layouts/calendar.create',["title" => "Dodawanie nowego terminu"]);
    }


    public function addCar($car_id, VisitsRepository $VisitsRepo){

        $visits = $VisitsRepo->getEnabled();

        return view('layouts/cars.addvisit', ["visits" => $visits,
                                              "car_id" => $car_id]);
    }
}
