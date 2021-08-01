<?php

namespace App\Repositories;

use App\Models\Visit;

 class CalendarRepository extends BaseRepository{

 	public function __construct(Visit $model){

 		$this->model = $model;
 	}

	 public function cancel($data, $visit_id){
		return $this->model->where("id",'=',$visit_id)->update($data);
	}

}