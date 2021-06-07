<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('question_categories')->delete();
        DB::table('question_categories')->insert(['name' => 'Gastronomie', 'image_url' => 'https://via.placeholder.com/300.png/09f/fff%20C/O%20https://placeholder.com/']);
        DB::table('question_categories')->insert(['name' => 'Arts et Cultures', 'image_url' => 'https://via.placeholder.com/300.png/09f/fff%20C/O%20https://placeholder.com/']);
        DB::table('question_categories')->insert(['name' => 'Histoire', 'image_url' => 'https://via.placeholder.com/300.png/09f/fff%20C/O%20https://placeholder.com/']);
        DB::table('question_categories')->insert(['name' => 'Architecture', 'image_url' => 'https://via.placeholder.com/300.png/09f/fff%20C/O%20https://placeholder.com/']);
        DB::table('question_categories')->insert(['name' => 'Sports', 'image_url' => 'https://via.placeholder.com/300.png/09f/fff%20C/O%20https://placeholder.com/']);
        DB::table('question_categories')->insert(['name' => 'Personnalité Publique', 'image_url' => 'https://via.placeholder.com/300.png/09f/fff%20C/O%20https://placeholder.com/']);
    }
}
