<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGameQuestionQuestionAnswerUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('game_question_question_answer_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('game_id')->constrained();
            $table->foreignId('question_id')->constrained();
            $table->foreignId('question_answer_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->integer('time');
            $table->integer('points');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (DB::getDriverName() !== 'sqlite') {
            Schema::table('game_question_question_answer_user', function (Blueprint $table) {
                $table->dropForeign(['game_id']);
                $table->dropForeign(['question_id']);
                $table->dropForeign(['question_answer_id']);
                $table->dropForeign(['user_id']);
            });
        }
        Schema::dropIfExists('game_question_question_answer_user');
    }
}
