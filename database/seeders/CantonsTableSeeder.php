<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CantonsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cantons')->delete();
        DB::table('cantons')->insert(['name' => 'Vaud']);
        DB::table('cantons')->insert(['name' => 'Genève']);
        DB::table('cantons')->insert(['name' => 'Jura']);
        DB::table('cantons')->insert(['name' => 'Valais']);
        DB::table('cantons')->insert(['name' => 'Fribourg']);
        DB::table('cantons')->insert(['name' => 'Neuchâtel']);

    }
}
