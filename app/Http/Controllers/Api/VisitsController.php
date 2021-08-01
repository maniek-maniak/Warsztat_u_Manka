<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Visit;

use App\Repositories\VisitsRepository;

class VisitsController extends Controller
{
    public function index(VisitsRepository $visitsRepo){

        $visits = $visitsRepo->getAll();

        return $visits->toJson();
    }


    // move to repository
    public function update(Request $request, visit $visit){

        $data = $request->all();

        // add some validation
        $visit->update([
            'user_id'=>$data['user_id'],
            'car_id'=>$data['car_id'],
            'comments'=>$data['comments']
        ]);

        $visit->Save();
    }
}
