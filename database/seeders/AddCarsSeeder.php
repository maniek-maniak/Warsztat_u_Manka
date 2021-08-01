<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddCarsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cars')->insert([
            'carPlateNumber'=>'niedostępny',
            'brand'=>'',
            'modell'=>'',
            'yearOfProduction'=>0,
            'created_by'=>'1'
        ]);
        DB::table('cars')->insert([
            'carPlateNumber'=>'dostępny',
            'brand'=>'',
            'modell'=>'',
            'yearOfProduction'=>0,
            'created_by'=>'1'
        ]);
        DB::table('cars')->insert([
            'carPlateNumber'=>'EOP 1234',
            'brand'=>'Opel',
            'modell'=>'Astra',
            'yearOfProduction'=>1998,
            'created_by'=>'2'
        ]);


    }
}
