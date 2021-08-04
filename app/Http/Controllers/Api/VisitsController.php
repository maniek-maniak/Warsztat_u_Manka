<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Visit;

use App\Repositories\VisitsRepository;

class VisitsController extends Controller
{
    public function index(){
        return Visit::all();
    }


    public function update(Request $request, Visit $visit){

        // add some validation
        $visit->update($request->all());

        return response()->json([
            'updated' => true
        ],status:200);
    }
}
