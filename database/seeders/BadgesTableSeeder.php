<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BadgesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('badges')->delete();
        DB::table('badges')->insert([
            'name' => 'Premier Duel',
            'description' => 'Vous avez joué votre premier en mode duel.',
            'image_url' => 'https://via.placeholder.com/200.png/09f/fff%20C/O%20https://placeholder.com/'
        ]);
        DB::table('badges')->insert([
            'name' => 'Première partie Solo',
            'description' => 'Vous avez joué votre première partie en mode solo.',
            'image_url' => 'https://via.placeholder.com/200.png/09f/fff%20C/O%20https://placeholder.com/'
        ]);
    }
}