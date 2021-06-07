<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AvatarObjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('avatar_objects')->delete();
        DB::table('avatar_objects')->insert([
            'name' => 'tshirtLausanne',
            'image_url' => 'https://via.placeholder.com/200.png/09f/fff%20C/O%20https://placeholder.com/',
            'avatar_object_category_id' => '2'
            //'city_id' => '2',
        ]);
        DB::table('avatar_objects')->insert([
            'name' => 'chapeauBandana',
            'image_url' => 'https://via.placeholder.com/200.png/09f/fff%20C/O%20https://placeholder.com/',
            'avatar_object_category_id' => '1',
        ]);
        DB::table('avatar_objects')->insert([
            'name' => 'lunettesRondes',
            'image_url' => 'https://via.placeholder.com/200.png/09f/fff%20C/O%20https://placeholder.com/',
            'avatar_object_category_id' => '3',
        ]);
    }
}
