<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CantonsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(QuestionCategoriesTableSeeder::class);
        $this->call(BadgesTableSeeder::class);
        $this->call(AvatarObjectCategoriesTableSeeder::class);
        $this->call(AvatarObjectsTableSeeder::class);
        $this->call(CitiesTableSeeder::class);
        $this->call(QuestionsTableSeeder::class);
        $this->call(RewardsTableSeeder::class);
    }
}
