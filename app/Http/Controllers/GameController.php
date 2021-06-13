<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\User;
use App\Models\Question;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class GameController extends Controller
{
    /**
     *  Initialize a new game with requested question type and players
     *  @param Request Laravel Request's object containing the user's inputs
     */
    public function init(Request $request) {
        $game = new Game();
        $game->save();
        $players_id = array(Auth::user()->id);
        if(isset($request->opponent_id)) {
            array_push($players_id, $request->opponent_id);
        }
        $players = User::find($players_id);
        if(isset($request->city_id)) {
            $questions = Question::where('city_id', $request->city_id)->get()->random(10);
        } else {
            $questions = Question::where('question_category_id', $request->question_category_id)->get()->random(10);
        }
        $game->questions()->attach($questions);
        $game->players()->attach($players);
        return Inertia::render('Welcome');
    }
}
