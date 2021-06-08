<?php

namespace Database\Seeders;
use bfinlay\SpreadsheetSeeder\SpreadsheetSeeder;

class QuestionsTableSeeder extends SpreadsheetSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->file = '/database/seeders/questions.xlsx';
        $this->worksheetTableMapping = ['Questions' => 'questions', 'Answers' => 'question_answers'];
        
        parent::run();
    }
}