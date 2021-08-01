<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'=>'Administrator',
            'type'=>'Admin',
            'email'=>'admin@admin.pl',
            'password'=>bcrypt('admin@admin')
        ]);

        DB::table('users')->insert([
            'name'=>'Maniek',
            'type'=>'User',
            'email'=>'maniek@maniek.pl',
            'password'=>bcrypt('maniekmaniek')
        ]);
    }
}
