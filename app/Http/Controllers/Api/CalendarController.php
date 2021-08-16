<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Visit;
use App\Repositories\CalendarRepository;

class CalendarController extends Controller
{
    /****************nie bedę na chwilę obecną używał tej metody ***********************************/
    
    // public function index(Visit $Visit){

    //     return Visit::paginate(10);
    // }


    public function store(Request $request, Visit $Visit){

        Visit::create($request->all());

        return response()->json([
            'created' => true
        ],status:201);
    }


    public function destroy( Visit $visit){

        Visit::delete();
    }
}
