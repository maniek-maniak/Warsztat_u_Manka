<?php

namespace App\Repositories;

use App\Models\Car;

 class CarsRepository extends BaseRepository{

 	public function __construct(Car $model){

 		$this->model = $model;
 	}

}