<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Car;

use App\Repositories\CarsRepository;

class CarsController extends Controller
{
    public function index(){
        return Car::all();
    }


    public function store(Request $request, Car $Car){

        Car::create($request->all());

        return response()->json([
            'created' => true
        ],status:201);
    }


    public function update(Request $request, Car $car){

        // add some validation
        Car::update($request->all());

        return response()->json([
            'updated' => true
        ],status:200);
    }


    public function destroy( Car $Car){

        Car::delete();
    }

}
