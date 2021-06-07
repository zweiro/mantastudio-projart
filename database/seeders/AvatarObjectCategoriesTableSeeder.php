<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AvatarObjectCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('avatar_object_categories')->delete();
        DB::table('avatar_object_categories')->insert(['name' => 'Chapeau/Coiffure']);
        DB::table('avatar_object_categories')->insert(['name' => 'Haut/T-shirt']);
        DB::table('avatar_object_categories')->insert(['name' => 'Lunettes']);
    }
}
