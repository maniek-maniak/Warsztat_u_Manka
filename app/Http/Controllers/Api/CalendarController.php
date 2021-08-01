<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Visit;

use App\Repositories\CalendarRepository;

class CalendarController extends Controller
{
    public function index(CalendarRepository $calendarRepo){

        $calendar = $calendarRepo->getAll();

        return $calendar->toJson();
    }


    public function store(Request $request, CalendarRepository $calendarRepo){

        $data = $request->all();

        $calendarRepo->create([
            'date'=>$data['date'],
            'time'=>$data['time'],
            'user_id'=>$data['user_id'],
            'car_id'=>$data['car_id'],
            'comments' =>$data['comments'] 
        ]);
    }


    // move to repository
    public function destroy( Visit $visit){

        $visit->delete();
    }
}
