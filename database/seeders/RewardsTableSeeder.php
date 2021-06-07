<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RewardsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rewards')->delete();
        DB::table('rewards')->insert([
            'date_start' => '2021-06-01 00:00:00',
            'date_end' => '2021-12-31 23:59:59',
            'good_answer_step' => 'https://via.placeholder.com/200.png/09f/fff%20C/O%20https://placeholder.com/',
            'title' => 'Rabais Musée Olympique',
            'text' => 'Obtenez 20% de rabais sur votre prochaine entrée au musée Olympique de Lausanne.',
            'image_url' => 'https://via.placeholder.com/200.png/09f/fff%20C/O%20https://placeholder.com/',
            'file_url' => 'file.txt',
            'validity_date' => '2022-06-30 24:59:59',
            'question_category_id' => '5',
            'city_id' => '2',
        ]);
        DB::table('rewards')->insert([
            'date_start' => '2021-06-01 00:00:00',
            'date_end' => '2021-12-31 23:59:59',
            'good_answer_step' => 'https://via.placeholder.com/200.png/09f/fff%20C/O%20https://placeholder.com/',
            'title' => 'Rabais d\'Histoire naturelle de Fribourg',
            'text' => 'Obtenez 20% de rabais sur votre prochaine entrée au musée d\'Histoire naturelle de Fribourg.',
            'image_url' => 'https://via.placeholder.com/200.png/09f/fff%20C/O%20https://placeholder.com/',
            'file_url' => 'file.txt',
            'validity_date' => '2022-06-30 24:59:59',
            'question_category_id' => '3',
            'city_id' => '5',
        ]);
    }
}