<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddTheExemplaryTermSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('visits')->insert([
            'date'=>'2121-06-15',
            'time'=>'10:15',
            'user_id'=>'0',
            'car_id'=>'2',
            'comments'=>''
        ]);
    }
}
