<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cities')->delete();
        DB::table('cities')->insert([
            'name' => 'Genève',
            'canton_id'=> 2
        ]);
        DB::table('cities')->insert([
            'name' => 'Lausanne',
            'canton_id'=> 1
        ]);
        DB::table('cities')->insert([
            'name' => 'Delémont',
            'canton_id'=> 3
        ]);
        DB::table('cities')->insert([
            'name' => 'Neuchâtel',
            'canton_id'=> 6
        ]);
        DB::table('cities')->insert([
            'name' => 'Fribourg',
            'canton_id'=> 5
        ]);
        DB::table('cities')->insert([
            'name' => 'Sion',
            'canton_id'=> 4
        ]);
    }
}
