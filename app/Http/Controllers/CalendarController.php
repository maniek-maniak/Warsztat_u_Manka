<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Calendar;

use App\Repositories\CalendarRepository;

class CalendarController extends Controller
{
    public function create(){

        return view('layouts/calendar.create',["title" => "Dodawanie nowego terminu"]);
    }

    public function store(CalendarRepository $CalendarRepo, Request $request){
        
        $CalendarRepo->create([
            'date'=>$request->input('date'),
            'time'=>$request->input('time'),
            'user_id'=>0,
            'car_id'=>2,
            'comments'=> '...'
        ]);

    	 return redirect('visits');
    }


    public function edit($visit_id, $car_id, CalendarRepository $CalendarRepo){

        $zalogowany = Auth::user();
        $user_id = $zalogowany['id'];
        
        $CalendarRepo->update([
            "user_id" => $user_id,
            "car_id" => $car_id
        ], $visit_id);

    	 return redirect('visits');
    }

    public function cancel($visit_id, CalendarRepository $CalendarRepo){

     
        $CalendarRepo->update([
            "user_id" => '0',
            "car_id" => 2
        ], $visit_id);

    	 return redirect('visits');
    }
}
