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
        DB::table('cantons')->insert([
            'name' => 'Vaud',
            'abbreviation' => 'VD'
            ]);
        DB::table('cantons')->insert([
            'name' => 'Genève',
            'abbreviation' => 'GE'
            ]);
        DB::table('cantons')->insert([
            'name' => 'Jura',
            'abbreviation' => 'JU'
            ]);
        DB::table('cantons')->insert([
            'name' => 'Valais',
            'abbreviation' => 'VS'
            ]);
        DB::table('cantons')->insert([
            'name' => 'Fribourg',
            'abbreviation' => 'FR'
            ]);
        DB::table('cantons')->insert([
            'name' => 'Neuchâtel',
            'abbreviation' => 'NE'
            ]);

    }
}
