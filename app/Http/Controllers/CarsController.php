<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Car;

use App\Repositories\ListCarsRepository;

class CarsController extends Controller
{
    public function index(ListCarsRepository $ListcarsRepo){

        $zalogowany = Auth::user();
        $owner_name = $zalogowany['name'];
        $listCars = $zalogowany['cars'];

        return view('layouts/cars.list', ["listCars" => $listCars]);
    }

    public function create(){

        return view('layouts/cars.create',["title" => "Dodawanie auta"]);
    }

    public function store(ListcarsRepository $ListcarsRepo, Request $request){
        $zalogowany = Auth::user();
        $ListcarsRepo->create([
            'carPlateNumber'=>$request->input('carPlateNumber'),
            'brand'=>$request->input('brand'),
            'modell'=>$request->input('modell'),
            'yearOfProduction'=>$request->input('yearOfProduction'),
            'created_by' =>$zalogowany['id']
        ]);

    	 return redirect('cars');
    }

    public function AddVisit($visit_id, ListCarsRepository $ListcarsRepo){

        $zalogowany = Auth::user();
        $owner_name = $zalogowany['name'];
        $listCars = $zalogowany['cars'];

        return view('layouts/calendar.addcar', ["listCars" => $listCars,
                                                "visit_id" => $visit_id]);
    }
}
