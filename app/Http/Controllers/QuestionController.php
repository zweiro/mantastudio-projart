<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Question;

use Illuminate\Http\Request;

class QuestionController extends Controller
{
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
}
