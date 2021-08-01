<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use App\Models\User;

 class UserRepository extends BaseRepository{

 	public function __construct(User $model){

 		$this->model = $model;
 	}


}