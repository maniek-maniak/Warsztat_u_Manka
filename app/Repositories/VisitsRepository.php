<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use App\Models\Visit;

 class VisitsRepository extends BaseRepository{

 	public function __construct(Visit $model){

 		$this->model = $model;
 	}

	 public function getEnabled(){
		return $this->model->where('car_id','=','2')->get();
	}

	public function getMy($user_id){
		return $this->model->where('user_id','=',$user_id)->get();
	}

}