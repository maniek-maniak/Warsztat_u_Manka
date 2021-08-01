<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Car;

use App\Repositories\CarsRepository;

class CarsController extends Controller
{
    public function index(CarsRepository $CarsRepo){

        $cars = $CarsRepo->getAll();

        return $cars->toJson();
    }


    public function store(Request $request, CarsRepository $CarsRepo){

        $data = $request->all();

        $CarsRepo->create([
            'carPlateNumber'=>$data['carPlateNumber'],
            'brand'=>$data['brand'],
            'modell'=>$data['modell'],
            'yearOfProduction'=>$data['yearOfProduction'],
            'created_by' =>$data['created_by']
        ]);
    }


    // move to repository
    public function update(Request $request, Car $car){

        $data = $request->all();

        // add some validation
        $car->update([
            'carPlateNumber'=>$data['carPlateNumber'],
            'brand'=>$data['brand'],
            'modell'=>$data['modell'],
            'yearOfProduction'=>$data['yearOfProduction'],
            'created_by' =>$data['created_by']
        ]);

        $car->Save();
    }

    // move to repository
    public function destroy( Car $Car){

        $Car->delete();
    }


}