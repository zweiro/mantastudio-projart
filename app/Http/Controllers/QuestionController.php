<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Game;
use App\Models\Question;
use App\Models\QuestionAnswer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuestionController extends Controller
{
    /**
     * return the answer of a given question
     * @param questionID question id
     */
    public function getAnswer($questionId){
        $user =  Auth::user();
        $games = $user->games()->wherePivot('user_id', '=', $user->id)->get();
        foreach ($games as $game) {
            if($game->questions()->find($questionId) !== null ) {
                $answer = Question::where('id',$questionId)->first()->questionAnswers()->where('correct',1)->first('id');
                return $answer->toJson();
            }
        }
        abort(403);
    }
    
    /**
     * Define the user's answer for an answer
     * @param Request Laravel Request's object containing the user's inputs
     */
    public function setUserAnswer(Request $request) {
        DB::table('game_question_question_answer_user')->insert([
            'game_id' => $request->game_id,
            'question_id' => $request->question_id,
            'question_answer_id' => $request->answer_id,
            'user_id' => $request->user_id,
            'time' => $request->time,
            'points' => $request->points
        ]);
    }
}
